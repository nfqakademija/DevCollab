<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeamsRepository")
 */
class Teams
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $github_repo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TeamPoints", mappedBy="team")
     */
    private $team_points;

    public function __construct()
    {
        $this->team_points = new ArrayCollection();
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

    public function getGithubRepo(): ?string
    {
        return $this->github_repo;
    }

    public function setGithubRepo(?string $github_repo): self
    {
        $this->github_repo = $github_repo;

        return $this;
    }

    /**
     * @return Collection|TeamPoints[]
     */
    public function getTeamPoints(): Collection
    {
        return $this->team_points;
    }

    public function addTeamPoint(TeamPoints $teamPoint): self
    {
        if (!$this->team_points->contains($teamPoint)) {
            $this->team_points[] = $teamPoint;
            $teamPoint->setTeam($this);
        }

        return $this;
    }

    public function removeTeamPoint(TeamPoints $teamPoint): self
    {
        if ($this->team_points->contains($teamPoint)) {
            $this->team_points->removeElement($teamPoint);
            // set the owning side to null (unless already changed)
            if ($teamPoint->getTeam() === $this) {
                $teamPoint->setTeam(null);
            }
        }

        return $this;
    }
}
