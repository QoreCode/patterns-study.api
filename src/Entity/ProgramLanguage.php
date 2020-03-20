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
     * @ORM\OneToMany(targetEntity="App\Entity\PatternClass", mappedBy="programLanguage", orphanRemoval=true)
     */
    private $patternClasses;

    public function __construct()
    {
        $this->patternClasses = new ArrayCollection();
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
     * @return Collection|PatternClass[]
     */
    public function getPatternClasses(): Collection
    {
        return $this->patternClasses;
    }

    public function addPatternClass(PatternClass $patternClass): self
    {
        if (!$this->patternClasses->contains($patternClass)) {
            $this->patternClasses[] = $patternClass;
            $patternClass->setProgramLanguage($this);
        }

        return $this;
    }

    public function removePatternClass(PatternClass $patternClass): self
    {
        if ($this->patternClasses->contains($patternClass)) {
            $this->patternClasses->removeElement($patternClass);
            // set the owning side to null (unless already changed)
            if ($patternClass->getProgramLanguage() === $this) {
                $patternClass->setProgramLanguage(null);
            }
        }

        return $this;
    }
}
