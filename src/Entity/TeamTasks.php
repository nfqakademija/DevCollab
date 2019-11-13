<?php declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeamTasksRepository")
 */
class TeamTasks
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
    private $teamfk;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $task;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $createBy;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeamfk(): ?int
    {
        return $this->teamfk;
    }

    public function setTeamfk(int $teamfk): self
    {
        $this->teamfk = $teamfk;

        return $this;
    }

    public function getTask(): ?string
    {
        return $this->task;
    }

    public function setTask(string $task): self
    {
        $this->task = $task;

        return $this;
    }

    public function getCreateBy(): ?int
    {
        return $this->createBy;
    }

    public function setCreateBy(?int $createBy): self
    {
        $this->createBy = $createBy;

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
