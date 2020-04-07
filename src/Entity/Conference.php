<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Conference
 *
 * @ORM\Table(name="conference")
 * @ORM\Entity
 */
class Conference
{
    /**
     * @var bool
     *
     * @ORM\Column(name="id_conf", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idConf;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_conf", type="string", length=100, nullable=false)
     */
    private $titreConf;

    /**
     * @var string
     *
     * @ORM\Column(name="acro_conf", type="string", length=150, nullable=false)
     */
    private $acroConf;

    /**
     * @var string
     *
     * @ORM\Column(name="topic_conf", type="string", length=250, nullable=false)
     */
    private $topicConf;

    /**
     * @var string
     *
     * @ORM\Column(name="perio_conf", type="string", length=100, nullable=false)
     */
    private $perioConf;

    /**
     * @var string
     *
     * @ORM\Column(name="portee_conf", type="string", length=100, nullable=false)
     */
    private $porteeConf;

    /**
     * @var string
     *
     * @ORM\Column(name="attentes_conf", type="string", length=300, nullable=false)
     */
    private $attentesConf;

    /**
     * @var string
     *
     * @ORM\Column(name="comm_conf", type="string", length=2000, nullable=false)
     */
    private $commConf;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Article", inversedBy="idConf")
     * @ORM\JoinTable(name="conferencearticle",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_conf", referencedColumnName="id_conf")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_article", referencedColumnName="id_article")
     *   }
     * )
     */
    private $idArticle;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idArticle = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdConf(): ?int
    {
        return $this->idConf;
    }

    public function getTitreConf(): ?string
    {
        return $this->titreConf;
    }

    public function setTitreConf(string $titreConf): self
    {
        $this->titreConf = $titreConf;

        return $this;
    }

    public function getAcroConf(): ?string
    {
        return $this->acroConf;
    }

    public function setAcroConf(string $acroConf): self
    {
        $this->acroConf = $acroConf;

        return $this;
    }

    public function getTopicConf(): ?string
    {
        return $this->topicConf;
    }

    public function setTopicConf(string $topicConf): self
    {
        $this->topicConf = $topicConf;

        return $this;
    }

    public function getPerioConf(): ?string
    {
        return $this->perioConf;
    }

    public function setPerioConf(string $perioConf): self
    {
        $this->perioConf = $perioConf;

        return $this;
    }

    public function getPorteeConf(): ?string
    {
        return $this->porteeConf;
    }

    public function setPorteeConf(string $porteeConf): self
    {
        $this->porteeConf = $porteeConf;

        return $this;
    }

    public function getAttentesConf(): ?string
    {
        return $this->attentesConf;
    }

    public function setAttentesConf(string $attentesConf): self
    {
        $this->attentesConf = $attentesConf;

        return $this;
    }

    public function getCommConf(): ?string
    {
        return $this->commConf;
    }

    public function setCommConf(string $commConf): self
    {
        $this->commConf = $commConf;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getIdArticle(): Collection
    {
        return $this->idArticle;
    }

    public function addIdArticle(Article $idArticle): self
    {
        if (!$this->idArticle->contains($idArticle)) {
            $this->idArticle[] = $idArticle;
        }

        return $this;
    }

    public function removeIdArticle(Article $idArticle): self
    {
        if ($this->idArticle->contains($idArticle)) {
            $this->idArticle->removeElement($idArticle);
        }

        return $this;
    }

}
