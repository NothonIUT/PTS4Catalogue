<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Journalarticle
 *
 * @ORM\Table(name="journalarticle", indexes={@ORM\Index(name="IDX_2051FB007D59C304", columns={"id_journ"})})
 * @ORM\Entity
 */
class Journalarticle
{
    /**
     * @var bool
     *
     * @ORM\Column(name="id_article", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idArticle;

    /**
     * @var bool
     *
     * @ORM\Column(name="num_type", type="integer", nullable=false)
     */
    private $numType;

    /**
     * @var \Journal
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Journal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_journ", referencedColumnName="id_journ")
     * })
     */
    private $idJourn;

    public function getIdArticle(): ?bool
    {
        return $this->idArticle;
    }

    public function getNumType(): ?bool
    {
        return $this->numType;
    }

    public function setNumType(bool $numType): self
    {
        $this->numType = $numType;

        return $this;
    }

    public function getIdJourn(): ?Journal
    {
        return $this->idJourn;
    }

    public function setIdJourn(?Journal $idJourn): self
    {
        $this->idJourn = $idJourn;

        return $this;
    }


}
