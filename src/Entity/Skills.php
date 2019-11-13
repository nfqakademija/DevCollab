<?php declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkillsRepository")
 */
class Skills
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
    private $userfk;

    /**
     * @ORM\Column(type="integer")
     */
    private $skillfk;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserfk(): ?int
    {
        return $this->userfk;
    }

    public function setUserfk(int $userfk): self
    {
        $this->userfk = $userfk;

        return $this;
    }

    public function getSkillfk(): ?int
    {
        return $this->skillfk;
    }

    public function setSkillfk(int $skillfk): self
    {
        $this->skillfk = $skillfk;

        return $this;
    }
}
