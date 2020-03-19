<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TaskRepository")
 */
class Task
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pattern", inversedBy="tasks")
     */
    private $pattern;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkToTaskFiles;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkToSolutionFiles;

    /**
     * @ORM\Column(type="text")
     */
    private $help;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLinkToTaskFiles(): ?string
    {
        return $this->linkToTaskFiles;
    }

    public function setLinkToTaskFiles(string $linkToTaskFiles): self
    {
        $this->linkToTaskFiles = $linkToTaskFiles;

        return $this;
    }

    public function getLinkToSolutionFiles(): ?string
    {
        return $this->linkToSolutionFiles;
    }

    public function setLinkToSolutionFiles(string $linkToSolutionFiles): self
    {
        $this->linkToSolutionFiles = $linkToSolutionFiles;

        return $this;
    }

    public function getHelp(): ?string
    {
        return $this->help;
    }

    public function setHelp(string $help): self
    {
        $this->help = $help;

        return $this;
    }
}
