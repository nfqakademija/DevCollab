<?php


namespace App\Request;


class TeamsRequest
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $githubRepo;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return TeamsRequest
     */
    public function setName(?string $name): TeamsRequest
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGithubRepo(): ?string
    {
        return $this->githubRepo;
    }

    /**
     * @param string|null $githubRepo
     * @return TeamsRequest
     */
    public function setGithubRepo(?string $githubRepo): TeamsRequest
    {
        $this->githubRepo = $githubRepo;

        return $this;
    }
}
