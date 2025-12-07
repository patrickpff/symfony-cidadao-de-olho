<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Deputado;
use App\Entity\TagLocalizacao;
use App\Entity\TipoDespesa;
use App\Entity\TipoTag;
use App\Entity\VerbasIndenizatorias;

class HomeController extends AbstractController
{
	function __construct(){
		ini_set('max_execution_time', 10000);
		set_time_limit(10000);
	}

    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        $mais_gastaram = $this->getDoctrine()->getManager()->createQuery(
            'SELECT deputado, verbas_indenizatorias
            FROM App\Entity\Deputado deputado
            INNER JOIN deputado.verbas_indenizatorias verbas_indenizatorias'
        )->getResult();

        dd($mais_gastaram);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/sync", name="sync")
     */
    public function sync(){
    	// Pega as tag_localizacao atraves da API
    	$array_tag_localizacao = json_decode(
    		file_get_contents('http://dadosabertos.almg.gov.br/ws/indexacao/tags/pesquisa?formato=json', true)
    	);

    	// Salva a tag_localizacao

    	foreach ($array_tag_localizacao->list as $item) {

    		// Salvar o tipo_tag
    		$manager = $this->getDoctrine()->getManager();
    		$repo = $this->getDoctrine()->getRepository(TipoTag::class);
    		
    		$tipo_tag = $repo->findOneBy(['id_api' => $item->tipo->id]);
    		
    		if(empty($tipo_tag)){
    			$tipo_tag = new TipoTag();
    		}

    		$tipo_tag->nome = $item->tipo->nome;
    		$tipo_tag->id_api = $item->tipo->id;

    		$manager->persist($tipo_tag);
    		$manager->flush();

    		// Salvar a localização
    		$manager = $this->getDoctrine()->getManager();
    		$repo = $this->getDoctrine()->getRepository(TagLocalizacao::class);
    		
    		$tag_localizacao = $repo->findOneBy(['id_api' => $item->id]);

    		if (empty($tag_localizacao)){
    			$tag_localizacao = new TagLocalizacao();
    		}

    		$tag_localizacao->descricao = $item->descricao;
			$tag_localizacao->assinaturaBoletim = $item->assinaturaBoletim;
			$tag_localizacao->assinaturaRSS = $item->assinaturaRss;
			$tag_localizacao->id_api = $item->id;
			$tag_localizacao->tipo_tag = $tipo_tag;

			$manager->persist($tag_localizacao);
			$manager->flush();
    	}

    	// Pega a lista de deputados através da API
    	$array_deputados = json_decode(
    		file_get_contents('http://dadosabertos.almg.gov.br/ws/deputados/em_exercicio?formato=json?mostraTags=true', true)
    	);

   //  	// Salva a lista de deputados
    	$repo = $this->getDoctrine()->getRepository(Deputado::class);
    	$manager = $this->getDoctrine()->getManager();

    	foreach($array_deputados->list as $item){

    		$deputado = $repo->findOneBy(['id_api' => $item->id]);

    		if(empty($deputado)){
    			$deputado = new Deputado();
    		}

    		$deputado->nome = $item->nome;
    		$deputado->partido = $item->partido;
    		$deputado->id_api = $item->id;

    		$repo_location = $this->getDoctrine()->getRepository(TagLocalizacao::class);
    		$tag_localizacao = $repo_location->findOneBy(['id_api' => $item->tagLocalizacao]);
    		$deputado->tag_localizacao = $tag_localizacao;

    		$manager->persist($deputado);
    	}
    	$manager->flush();

    	$deputados = $repo->findAll();
    	
    	foreach($deputados as $deputado){
    		$array_data_verbas = json_decode(
	    		file_get_contents('http://dadosabertos.almg.gov.br/ws/prestacao_contas/verbas_indenizatorias/legislatura_atual/deputados/'. $deputado->id_api .'/datas?formato=json', true)
	    	);
	    	foreach($array_data_verbas->list as $data_verba_item){
	    		foreach($data_verba_item->dataReferencia as $key => $value){
    					if($value != 'sql-timestamp'){
    						
    						$date = date_create($value);
    						
    						$array_data_verbas = json_decode(
					    		file_get_contents('http://dadosabertos.almg.gov.br/ws/prestacao_contas/verbas_indenizatorias/legislatura_atual/deputados/'. $deputado->id_api .'/'. $date->format('Y') .'/'.$date->format('m').'?formato=json', true)
					    	);


    						foreach($array_data_verbas->list as $tipo_despesa_value){
	    						$repo = $this->getDoctrine()->getRepository(TipoDespesa::class);
	    						$manager = $this->getDoctrine()->getManager();
    							$tipo_despesa = $repo->findOneBy(['id_api' => $tipo_despesa_value->codTipoDespesa]);

    							if(empty($tipo_despesa)){
    								$tipo_despesa = new TipoDespesa();
    							}

    							$tipo_despesa->nome = $tipo_despesa_value->descTipoDespesa;
    							$tipo_despesa->id_api = $tipo_despesa_value->codTipoDespesa;

    							$manager->persist($tipo_despesa);
    							$manager->flush();

    							foreach($tipo_despesa_value->listaDetalheVerba as $detalhe){
    								$repo = $this->getDoctrine()->getRepository(VerbasIndenizatorias::class);
    								$manager = $this->getDoctrine()->getManager();
    								
    								$verba_indenizatoria = $repo->findOneBy(['id_api' => $detalhe->id, 'deputado' => $deputado->getId()]);

    								if(empty($verba_indenizatoria)){
    									$verba_indenizatoria = new VerbasIndenizatorias();
    								}

    								$verba_indenizatoria->nome_emitente = $detalhe->nomeEmitente;
    								if (isset($detalhe->descDocumento)){
    									$verba_indenizatoria->desc_documento = $detalhe->descDocumento;
    								}
    								$verba_indenizatoria->valor_despesa = $detalhe->valorDespesa;
    								$verba_indenizatoria->cpf_cnpj = $detalhe->cpfCnpj;
    								$verba_indenizatoria->valor_reembolsado = $detalhe->valorReembolsado;

				    				foreach($detalhe->dataReferencia as $key => $value){
				    					if($value != 'sql-timestamp'){
				    						$verba_indenizatoria->data_referencia = date_create($value);
				    					}
				    				}

				    				foreach($detalhe->dataEmissao as $key => $value){
				    					if($value != 'sql-timestamp'){
				    						$verba_indenizatoria->data_emissao = date_create($value);
				    					}
				    				}

    								$verba_indenizatoria->id_api = $detalhe->id;
    								$verba_indenizatoria->deputado = $deputado;
    								$verba_indenizatoria->tipo_despesa = $tipo_despesa;

    								$manager->persist($verba_indenizatoria);
    								$manager->flush();
    							}

    						}
    					}
	    			}
	    	}
    	}
    	
    	return $this->redirectToRoute('index');
    }
}
