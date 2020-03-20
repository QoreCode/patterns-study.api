<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Pattern
 *
 * @ORM\Table(name="pattern", indexes={@ORM\Index(name="IDX_A3BCFC8E12469DE2", columns={"category_id"})})
 * @ORM\Entity
 * @ApiResource
 */
class Pattern
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var PatternCategory
     *
     * @ORM\ManyToOne(targetEntity="PatternCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Test", mappedBy="pattern")
     */
    private $test;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Task", mappedBy="pattern")
     */
    private $tasks;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $icon;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PatternClass", mappedBy="pattern", orphanRemoval=true)
     */
    private $patternClasses;

    /**
     * @ORM\Column(type="text")
     */
    private $problem;

    /**
     * @ORM\Column(type="text")
     */
    private $solution;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->test = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tasks = new ArrayCollection();
        $this->patternClasses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): PatternCategory
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
    public function getTest(): Collection
    {
        return $this->test;
    }

    public function addTest(Test $test): self
    {
        if (!$this->test->contains($test)) {
            $this->test[] = $test;
            $test->addPattern($this);
        }

        return $this;
    }

    public function removeTest(Test $test): self
    {
        if ($this->test->contains($test)) {
            $this->test->removeElement($test);
            $test->removePattern($this);
        }

        return $this;
    }

    /**
     * @return Collection|Task[]
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    public function addTask(Task $task): self
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks[] = $task;
            $task->setPattern($this);
        }

        return $this;
    }

    public function removeTask(Task $task): self
    {
        if ($this->tasks->contains($task)) {
            $this->tasks->removeElement($task);
            // set the owning side to null (unless already changed)
            if ($task->getPattern() === $this) {
                $task->setPattern(null);
            }
        }

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
            $patternClass->setPattern($this);
        }

        return $this;
    }

    public function removePatternClass(PatternClass $patternClass): self
    {
        if ($this->patternClasses->contains($patternClass)) {
            $this->patternClasses->removeElement($patternClass);
            // set the owning side to null (unless already changed)
            if ($patternClass->getPattern() === $this) {
                $patternClass->setPattern(null);
            }
        }

        return $this;
    }

    public function getProblem(): ?string
    {
        return $this->problem;
    }

    public function setProblem(string $problem): self
    {
        $this->problem = $problem;

        return $this;
    }

    public function getSolution(): ?string
    {
        return $this->solution;
    }

    public function setSolution(string $solution): self
    {
        $this->solution = $solution;

        return $this;
    }

}
