<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PatternClassRepository")
 */
class PatternClass
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $code;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pattern", inversedBy="patternClasses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pattern;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ProgramLanguage", inversedBy="patternClasses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $programLanguage;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getPattern(): ?Pattern
    {
        return $this->pattern;
    }

    public function setPattern(?Pattern $pattern): self
    {
        $this->pattern = $pattern;

        return $this;
    }

    public function getProgramLanguage(): ?ProgramLanguage
    {
        return $this->programLanguage;
    }

    public function setProgramLanguage(?ProgramLanguage $programLanguage): self
    {
        $this->programLanguage = $programLanguage;

        return $this;
    }
}
