<?php declare(strict_types=1);

namespace App\Factory;

use App\Entity\Teams;

class TeamsFactory
{
    /**
     * @param string $name
     * @param string $githubRepo
     * @return Teams
     */
    public static function create(string $name, string $githubRepo): Teams
    {
        $teams = new Teams();
        $teams->setName($name);
        $teams->setGithubRepo($githubRepo);

        return $teams;
    }
}
