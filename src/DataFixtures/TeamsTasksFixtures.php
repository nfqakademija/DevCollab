<?php


namespace App\DataFixtures;

use App\Entity\TeamTasks;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TeamsTasksFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 10; $i++) {
            $teamTasks = new TeamTasks();
            $teamTasks->setTask('task-'.$i);
            $teamTasks->setCreatedBy(null);
            $teamTasks->setStatus(mt_rand(0, 1));
            $teamTasks->setTeam($this->getReference(TeamsFixtures::TEAM_REFERENCE));
            $manager->persist($teamTasks);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            TeamsFixtures::class,
        );
    }
}
