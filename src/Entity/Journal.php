<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Journal
 *
 * @ORM\Table(name="journal")
 * @ORM\Entity
 */
class Journal
{
    /**
     * @var bool
     *
     * @ORM\Column(name="id_journ", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idJourn;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_journ", type="string", length=100, nullable=false)
     */
    private $titreJourn;

    /**
     * @var string
     *
     * @ORM\Column(name="acro_journ", type="string", length=15, nullable=false)
     */
    private $acroJourn;

    /**
     * @var string
     *
     * @ORM\Column(name="topic_journ", type="string", length=500, nullable=false)
     */
    private $topicJourn;

    /**
     * @var string
     *
     * @ORM\Column(name="portee_journ", type="string", length=100, nullable=false)
     */
    private $porteeJourn;

    /**
     * @var string
     *
     * @ORM\Column(name="attentes_journ", type="string", length=300, nullable=false)
     */
    private $attentesJourn;

    /**
     * @var string
     *
     * @ORM\Column(name="comm_journ", type="string", length=2000, nullable=false)
     */
    private $commJourn;

    public function getIdJourn(): ?int
    {
        return $this->idJourn;
    }

    public function getTitreJourn(): ?string
    {
        return $this->titreJourn;
    }

    public function setTitreJourn(string $titreJourn): self
    {
        $this->titreJourn = $titreJourn;

        return $this;
    }

    public function getAcroJourn(): ?string
    {
        return $this->acroJourn;
    }

    public function setAcroJourn(string $acroJourn): self
    {
        $this->acroJourn = $acroJourn;

        return $this;
    }

    public function getTopicJourn(): ?string
    {
        return $this->topicJourn;
    }

    public function setTopicJourn(string $topicJourn): self
    {
        $this->topicJourn = $topicJourn;

        return $this;
    }

    public function getPorteeJourn(): ?string
    {
        return $this->porteeJourn;
    }

    public function setPorteeJourn(string $porteeJourn): self
    {
        $this->porteeJourn = $porteeJourn;

        return $this;
    }

    public function getAttentesJourn(): ?string
    {
        return $this->attentesJourn;
    }

    public function setAttentesJourn(string $attentesJourn): self
    {
        $this->attentesJourn = $attentesJourn;

        return $this;
    }

    public function getCommJourn(): ?string
    {
        return $this->commJourn;
    }

    public function setCommJourn(string $commJourn): self
    {
        $this->commJourn = $commJourn;

        return $this;
    }


}
