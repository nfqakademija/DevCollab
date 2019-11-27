<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ProjectsRepository")
 */
class Projects
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
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProjectDetails", mappedBy="projects")
     */
    private $project_details;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Teams", inversedBy="projects", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $team;

    public function __construct()
    {
        $this->project_details = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|ProjectDetails[]
     */
    public function getProjectDetails(): Collection
    {
        return $this->project_details;
    }

    public function addProjectDetail(ProjectDetails $projectDetail): self
    {
        if (!$this->project_details->contains($projectDetail)) {
            $this->project_details[] = $projectDetail;
            $projectDetail->setProjects($this);
        }

        return $this;
    }

    public function removeProjectDetail(ProjectDetails $projectDetail): self
    {
        if ($this->project_details->contains($projectDetail)) {
            $this->project_details->removeElement($projectDetail);
            // set the owning side to null (unless already changed)
            if ($projectDetail->getProjects() === $this) {
                $projectDetail->setProjects(null);
            }
        }

        return $this;
    }

    public function getTeam(): ?Teams
    {
        return $this->team;
    }

    public function setTeam(Teams $team): self
    {
        $this->team = $team;

        return $this;
    }
}
