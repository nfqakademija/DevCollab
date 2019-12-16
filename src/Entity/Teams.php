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
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="team")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TeamPoints", mappedBy="team")
     */
    private $teamPoints;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TeamTasks", mappedBy="team")
     */
    private $teamTasks;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Projects", mappedBy="team", cascade={"persist", "remove"})
     */
    private $projects;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->teamPoints = new ArrayCollection();
        $this->teamTasks = new ArrayCollection();
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
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setTeam($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
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

    /**
     * @return Collection|TeamPoints[]
     */
    public function getTeamPoints(): Collection
    {
        return $this->teamPoints;
    }

    public function addTeamPoint(TeamPoints $teamPoint): self
    {
        if (!$this->teamPoints->contains($teamPoint)) {
            $this->teamPoints[] = $teamPoint;
            $teamPoint->setTeam($this);
        }

        return $this;
    }

    public function removeTeamPoint(TeamPoints $teamPoint): self
    {
        if ($this->teamPoints->contains($teamPoint)) {
            $this->teamPoints->removeElement($teamPoint);
            // set the owning side to null (unless already changed)
            if ($teamPoint->getTeam() === $this) {
                $teamPoint->setTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TeamTasks[]
     */
    public function getTeamTasks(): Collection
    {
        return $this->teamTasks;
    }

    public function addTeamTask(TeamTasks $teamTask): self
    {
        if (!$this->teamTasks->contains($teamTask)) {
            $this->teamTasks[] = $teamTask;
            $teamTask->setTeam($this);
        }

        return $this;
    }

    public function removeTeamTask(TeamTasks $teamTask): self
    {
        if ($this->teamTasks->contains($teamTask)) {
            $this->teamTasks->removeElement($teamTask);
            // set the owning side to null (unless already changed)
            if ($teamTask->getTeam() === $this) {
                $teamTask->setTeam(null);
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

        // set (or unset) the owning side of the relation if necessary
        $newTeam = $projects === null ? null : $this;
        if ($newTeam !== $projects->getTeam()) {
            $projects->setTeam($newTeam);
        }

        return $this;
    }
}
