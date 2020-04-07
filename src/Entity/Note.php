<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="note", indexes={@ORM\Index(name="FK_Note_NoteJourn", columns={"id_journ"}), @ORM\Index(name="FK_Note_NoteConf", columns={"id_conf"})})
 * @ORM\Entity
 */
class Note
{
    /**
     * @var bool
     *
     * @ORM\Column(name="id_note", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNote;

    /**
     * @var string
     *
     * @ORM\Column(name="org_note", type="string", length=150, nullable=false)
     */
    private $orgNote;

    /**
     * @var string
     *
     * @ORM\Column(name="val_note", type="string", length=100, nullable=false)
     */
    private $valNote;

    /**
     * @var string
     *
     * @ORM\Column(name="type_note", type="string", length=50, nullable=false)
     */
    private $typeNote;

    /**
     * @var string
     *
     * @ORM\Column(name="ref_note", type="string", length=150, nullable=false)
     */
    private $refNote;

    /**
     * @var \Conference
     *
     * @ORM\ManyToOne(targetEntity="Conference")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_conf", referencedColumnName="id_conf")
     * })
     */
    private $idConf;

    /**
     * @var \Journal
     *
     * @ORM\ManyToOne(targetEntity="Journal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_journ", referencedColumnName="id_journ")
     * })
     */
    private $idJourn;

    public function getIdNote(): ?bool
    {
        return $this->idNote;
    }

    public function getOrgNote(): ?string
    {
        return $this->orgNote;
    }

    public function setOrgNote(string $orgNote): self
    {
        $this->orgNote = $orgNote;

        return $this;
    }

    public function getValNote(): ?string
    {
        return $this->valNote;
    }

    public function setValNote(string $valNote): self
    {
        $this->valNote = $valNote;

        return $this;
    }

    public function getTypeNote(): ?string
    {
        return $this->typeNote;
    }

    public function setTypeNote(string $typeNote): self
    {
        $this->typeNote = $typeNote;

        return $this;
    }

    public function getRefNote(): ?string
    {
        return $this->refNote;
    }

    public function setRefNote(string $refNote): self
    {
        $this->refNote = $refNote;

        return $this;
    }

    public function getIdConf(): ?Conference
    {
        return $this->idConf;
    }

    public function setIdConf(?Conference $idConf): self
    {
        $this->idConf = $idConf;

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
