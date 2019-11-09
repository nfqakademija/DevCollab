<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectdetailsRepository")
 */
class Projectdetails
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $projectfk;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $repository;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deadline;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $sprint1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sprint1points;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $sprint2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sprint2points;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $sprint3;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sprint3points;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjectfk(): ?int
    {
        return $this->projectfk;
    }

    public function setProjectfk(int $projectfk): self
    {
        $this->projectfk = $projectfk;

        return $this;
    }

    public function getRepository(): ?string
    {
        return $this->repository;
    }

    public function setRepository(string $repository): self
    {
        $this->repository = $repository;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getDeadline(): ?\DateTimeInterface
    {
        return $this->deadline;
    }

    public function setDeadline(?\DateTimeInterface $deadline): self
    {
        $this->deadline = $deadline;

        return $this;
    }

    public function getSprint1(): ?\DateTimeInterface
    {
        return $this->sprint1;
    }

    public function setSprint1(?\DateTimeInterface $sprint1): self
    {
        $this->sprint1 = $sprint1;

        return $this;
    }

    public function getSprint1points(): ?int
    {
        return $this->sprint1points;
    }

    public function setSprint1points(?int $sprint1points): self
    {
        $this->sprint1points = $sprint1points;

        return $this;
    }

    public function getSprint2(): ?\DateTimeInterface
    {
        return $this->sprint2;
    }

    public function setSprint2(?\DateTimeInterface $sprint2): self
    {
        $this->sprint2 = $sprint2;

        return $this;
    }

    public function getSprint2points(): ?int
    {
        return $this->sprint2points;
    }

    public function setSprint2points(?int $sprint2points): self
    {
        $this->sprint2points = $sprint2points;

        return $this;
    }

    public function getSprint3(): ?\DateTimeInterface
    {
        return $this->sprint3;
    }

    public function setSprint3(?\DateTimeInterface $sprint3): self
    {
        $this->sprint3 = $sprint3;

        return $this;
    }

    public function getSprint3points(): ?int
    {
        return $this->sprint3points;
    }

    public function setSprint3points(?int $sprint3points): self
    {
        $this->sprint3points = $sprint3points;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }
}
