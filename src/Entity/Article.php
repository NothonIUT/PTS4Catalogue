<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity
 */
class Article
{
    /**
     * @var bool
     *
     * @ORM\Column(name="id_article", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="type_article", type="string", length=150, nullable=false)
     */
    private $typeArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="taille_article", type="string", length=100, nullable=false)
     */
    private $tailleArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="comm_article", type="string", length=2000, nullable=false)
     */
    private $commArticle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Conference", mappedBy="idArticle")
     */
    private $idConf;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idConf = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdArticle(): ?bool
    {
        return $this->idArticle;
    }

    public function getTypeArticle(): ?string
    {
        return $this->typeArticle;
    }

    public function setTypeArticle(string $typeArticle): self
    {
        $this->typeArticle = $typeArticle;

        return $this;
    }

    public function getTailleArticle(): ?string
    {
        return $this->tailleArticle;
    }

    public function setTailleArticle(string $tailleArticle): self
    {
        $this->tailleArticle = $tailleArticle;

        return $this;
    }

    public function getCommArticle(): ?string
    {
        return $this->commArticle;
    }

    public function setCommArticle(string $commArticle): self
    {
        $this->commArticle = $commArticle;

        return $this;
    }

    /**
     * @return Collection|Conference[]
     */
    public function getIdConf(): Collection
    {
        return $this->idConf;
    }

    public function addIdConf(Conference $idConf): self
    {
        if (!$this->idConf->contains($idConf)) {
            $this->idConf[] = $idConf;
            $idConf->addIdArticle($this);
        }

        return $this;
    }

    public function removeIdConf(Conference $idConf): self
    {
        if ($this->idConf->contains($idConf)) {
            $this->idConf->removeElement($idConf);
            $idConf->removeIdArticle($this);
        }

        return $this;
    }

}
