<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TagLocalizacaoRepository")
 */
class TagLocalizacao
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
    public $descricao;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public $assinaturaBoletim;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public $assinaturaRSS;

    /**
     * @ORM\Column(type="integer")
     */
    public $id_api;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TipoTag", inversedBy="tipo_tag")
     */
    public $tipo_tag;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Deputado", mappedBy="tag_localizacao")
     */
    public $deputados;

    public function getId(): ?int
    {
        return $this->id;
    }
}
