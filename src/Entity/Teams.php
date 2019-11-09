<?php

namespace App\Entity;

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
    private $githubRepo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $teampoints;

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

    public function getTeampoints(): ?int
    {
        return $this->teampoints;
    }

    public function setTeampoints(?int $teampoints): self
    {
        $this->teampoints = $teampoints;

        return $this;
    }
}
