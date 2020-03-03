<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PatternRepository")
 */
class Pattern
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $difficult;

    /**
     * @ORM\Column(type="integer")
     */
    private $popularity;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Progress", mappedBy="pattern")
     */
    private $progresses;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PatternCategory", inversedBy="pattern")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Test", mappedBy="category")
     */
    private $tests;

    public function __construct()
    {
        $this->progresses = new ArrayCollection();
        $this->tests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDifficult(): ?int
    {
        return $this->difficult;
    }

    public function setDifficult(int $difficult): self
    {
        $this->difficult = $difficult;

        return $this;
    }

    public function getPopularity(): ?int
    {
        return $this->popularity;
    }

    public function setPopularity(int $popularity): self
    {
        $this->popularity = $popularity;

        return $this;
    }

    /**
     * @return Collection|Progress[]
     */
    public function getProgresses(): Collection
    {
        return $this->progresses;
    }

    public function addProgress(Progress $progress): self
    {
        if (!$this->progresses->contains($progress)) {
            $this->progresses[] = $progress;
            $progress->setPattern($this);
        }

        return $this;
    }

    public function getCategory(): ?PatternCategory
    {
        return $this->category;
    }

    public function setCategory(?PatternCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Test[]
     */
    public function getTests(): Collection
    {
        return $this->tests;
    }

    public function addTest(Test $test): self
    {
        if (!$this->tests->contains($test)) {
            $this->tests[] = $test;
            $test->addCategory($this);
        }

        return $this;
    }

    public function removeTest(Test $test): self
    {
        if ($this->tests->contains($test)) {
            $this->tests->removeElement($test);
            $test->removeCategory($this);
        }

        return $this;
    }
}
