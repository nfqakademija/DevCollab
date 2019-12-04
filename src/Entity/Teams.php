<?php

declare(strict_types=1);
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
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
    private $githubRepo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Users", mappedBy="team")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TeamTasks", mappedBy="team")
     */
    private $teamTasks;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TeamPoints", mappedBy="team")
     */
    private $teamPoints;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Projects", mappedBy="team")
     */
    private $projects;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->teamTasks = new ArrayCollection();
        $this->teamPoints = new ArrayCollection();
        $this->projects = new ArrayCollection();
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
        return $this->githubRepo;
    }

    public function setGithubRepo(?string $githubRepo): self
    {
        $this->githubRepo = $githubRepo;

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
     * @return Collection|Projects[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Projects $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setTeam($this);
        }

        return $this;
    }

    public function removeProject(Projects $project): self
    {
        if ($this->projects->contains($project)) {
            $this->projects->removeElement($project);
            // set the owning side to null (unless already changed)
            if ($project->getTeam() === $this) {
                $project->setTeam(null);
            }
        }

        return $this;
    }
}
