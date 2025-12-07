<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TipoDespesaRepository")
 */
class TipoDespesa
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
     * @ORM\OneToMany(targetEntity="App\Entity\VerbasIndenizatorias", mappedBy="tipo_despesa")
     */
    public $verbas_indenizatorias;

    public function getId(): ?int
    {
        return $this->id;
    }
}
