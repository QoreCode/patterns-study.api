<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ProgramLanguageRepository")
 */
class ProgramLanguage
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $icon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PatternDiagramm", mappedBy="programLanguage", orphanRemoval=true)
     */
    private $patternDiagramms;

    public function __construct()
    {
        $this->patternDiagramms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection|PatternDiagramm[]
     */
    public function getPatternDiagramms(): Collection
    {
        return $this->patternDiagramms;
    }

    public function addPatternDiagramm(PatternDiagramm $patternDiagramm): self
    {
        if (!$this->patternDiagramms->contains($patternDiagramm)) {
            $this->patternDiagramms[] = $patternDiagramm;
            $patternDiagramm->setProgramLanguage($this);
        }

        return $this;
    }

    public function removePatternDiagramm(PatternDiagramm $patternDiagramm): self
    {
        if ($this->patternDiagramms->contains($patternDiagramm)) {
            $this->patternDiagramms->removeElement($patternDiagramm);
            // set the owning side to null (unless already changed)
            if ($patternDiagramm->getProgramLanguage() === $this) {
                $patternDiagramm->setProgramLanguage(null);
            }
        }

        return $this;
    }
}
