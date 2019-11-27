<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ProjectDetailsRepository")
 */
class ProjectDetails
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
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
     * @ORM\OneToMany(targetEntity="App\Entity\Sprints", mappedBy="projects")
     */
    private $sprints;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Projects", inversedBy="project_details")
     */
    private $projects;

    public function __construct()
    {
        $this->sprints = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRepository(): ?string
    {
        return $this->repository;
    }

    public function setRepository(?string $repository): self
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

    /**
     * @return Collection|Sprints[]
     */
    public function getSprints(): Collection
    {
        return $this->sprints;
    }

    public function addSprint(Sprints $sprint): self
    {
        if (!$this->sprints->contains($sprint)) {
            $this->sprints[] = $sprint;
            $sprint->setProjects($this);
        }

        return $this;
    }

    public function removeSprint(Sprints $sprint): self
    {
        if ($this->sprints->contains($sprint)) {
            $this->sprints->removeElement($sprint);
            // set the owning side to null (unless already changed)
            if ($sprint->getProjects() === $this) {
                $sprint->setProjects(null);
            }
        }

        return $this;
    }

    public function getProjects(): ?Projects
    {
        return $this->projects;
    }

    public function setProjects(?Projects $projects): self
    {
        $this->projects = $projects;

        return $this;
    }
}
