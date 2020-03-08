<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Progress
 *
 * @ORM\Table(name="progress", indexes={@ORM\Index(name="IDX_2201F246A76ED395", columns={"user_id"}), @ORM\Index(name="IDX_2201F246F734A20F", columns={"pattern_id"})})
 * @ORM\Entity
 * @ApiResource
 */
class Progress
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
     * @var int|null
     *
     * @ORM\Column(name="percent", type="integer", nullable=true)
     */
    private $percent;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Pattern
     *
     * @ORM\ManyToOne(targetEntity="Pattern")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pattern_id", referencedColumnName="id")
     * })
     */
    private $pattern;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPercent(): ?int
    {
        return $this->percent;
    }

    public function setPercent(?int $percent): self
    {
        $this->percent = $percent;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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


}
