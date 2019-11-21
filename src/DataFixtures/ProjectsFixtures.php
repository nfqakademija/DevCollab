<?php

namespace App\DataFixtures;

use App\Entity\Projects;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ProjectsFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROJECT_REFERENCE = 'admin-project';

    public function load (ObjectManager $manager){
        for ($i = 1; $i < 2; $i++) {
            $projects = new Projects();
            $projects->setTitle('Project Name'.$i);
            $projects->setTeam($this->getReference(TeamsFixtures::TEAM_REFERENCE));
            $manager->persist($projects);
        }
        $manager->flush();
        $this->addReference(self::PROJECT_REFERENCE,$projects);
    }
    public function getDependencies()
    {
        return array (
            TeamsFixtures::class,
        );
    }
}