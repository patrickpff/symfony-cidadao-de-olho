<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DeputadoRepository")
 */
class Deputado
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
    public $nome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public $partido;

    /**
     * @ORM\Column(type="integer")
     */
    public $id_api;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TagLocalizacao", inversedBy="deputados")
     */
    public $tag_localizacao;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\VerbasIndenizatorias", mappedBy="deputado")
     */
    public $verbas_indenizatorias;

    public function getId(): ?int
    {
        return $this->id;
    }
}
