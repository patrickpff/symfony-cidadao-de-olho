<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VerbasIndenizatoriasRepository")
 */
class VerbasIndenizatorias
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public $nome_emitente;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $desc_documento;

    /**
     * @ORM\Column(type="float")
     */
    public $valor_despesa;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public $cpf_cnpj;

    /**
     * @ORM\Column(type="float")
     */
    public $valor_reembolsado;

    /**
     * @ORM\Column(type="date")
     */
    public $data_referencia;

    /**
     * @ORM\Column(type="date")
     */
    public $data_emissao;

    /**
     * @ORM\Column(type="integer")
     */
    public $id_api;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Deputado", inversedBy="verbas_indenizatorias")
     */
    public $deputado;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TipoDespesa", inversedBy="verbas_indenizatorias")
     */
    public $tipo_despesa;

    public function getId(): ?int
    {
        return $this->id;
    }
}
