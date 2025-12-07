<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TipoTagRepository")
 */
class TipoTag
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
     * @ORM\Column(type="integer")
     */
    public $id_api;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TagLocalizacao", mappedBy="tipo_tag")
     */
    public $tag_localizacao;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setNome(string $nome): self {
        $this->nome = $nome;

        return $this;
    }
}
