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

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Sprints", mappedBy="team", cascade={"persist", "remove"})
     */
    private $sprints;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Users", mappedBy="team")
     */
    private $users;

    public function __construct()
    {
        $this->team_points = new ArrayCollection();
        $this->users = new ArrayCollection();
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

    public function getSprints(): ?Sprints
    {
        return $this->sprints;
    }

    public function setSprints(Sprints $sprints): self
    {
        $this->sprints = $sprints;

        // set the owning side of the relation if necessary
        if ($this !== $sprints->getTeam()) {
            $sprints->setTeam($this);
        }

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(Users $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setTeam($this);
        }

        return $this;
    }

    public function removeUser(Users $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getTeam() === $this) {
                $user->setTeam(null);
            }
        }

        return $this;
    }
}
