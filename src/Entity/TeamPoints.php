<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeamPointsRepository")
 */
class TeamPoints
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
    private $team_fk;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $points;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeamFk(): ?int
    {
        return $this->team_fk;
    }

    public function setTeamFk(int $team_fk): self
    {
        $this->team_fk = $team_fk;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(?int $points): self
    {
        $this->points = $points;

        return $this;
    }
}
