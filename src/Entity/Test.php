<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="test")
 * @ORM\Entity
 * @ApiResource
 */
class Test
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="question", type="text", length=0, nullable=false)
     */
    private $question;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Pattern", inversedBy="test")
     * @ORM\JoinTable(name="test_pattern",
     *   joinColumns={
     *     @ORM\JoinColumn(name="test_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="pattern_id", referencedColumnName="id")
     *   }
     * )
     */
    private $pattern;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pattern = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

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
        }

        return $this;
    }

    public function removePattern(Pattern $pattern): self
    {
        if ($this->pattern->contains($pattern)) {
            $this->pattern->removeElement($pattern);
        }

        return $this;
    }

}
