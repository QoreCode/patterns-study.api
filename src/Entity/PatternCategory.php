<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PatternCategoryRepository")
 */
class PatternCategory
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
     * @ORM\OneToMany(targetEntity="App\Entity\Pattern", mappedBy="category", orphanRemoval=true)
     */
    private $pattern;

    public function __construct()
    {
        $this->pattern = new ArrayCollection();
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

    /**
     * @return Collection|Pattern[]
     */
    public function getPattern(): Collection
    {
        return $this->pattern;
    }

    public function addPattern(Pattern $pattern): self
    {
        if (!$this->pattern->contains($pattern)) {
            $this->pattern[] = $pattern;
            $pattern->setCategory($this);
        }

        return $this;
    }

    public function removePattern(Pattern $pattern): self
    {
        if ($this->pattern->contains($pattern)) {
            $this->pattern->removeElement($pattern);
            // set the owning side to null (unless already changed)
            if ($pattern->getCategory() === $this) {
                $pattern->setCategory(null);
            }
        }

        return $this;
    }
}
