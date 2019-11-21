<?php


namespace App\DataFixtures;

use App\Entity\TeamPoints;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TeamPointsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager){
        for ($i = 1; $i < 10; $i++) {
            $teamPoints = new TeamPoints();
            $teamPoints->setPoints(mt_rand(0,100));
            $teamPoints->setTeam($this->getReference(TeamsFixtures::TEAM_REFERENCE));
            $manager->persist($teamPoints);
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