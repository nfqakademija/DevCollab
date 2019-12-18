<?php


namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Teams;

class TeamsFixtures extends Fixture
{
    public const TEAM_REFERENCE = 'admin-teams';
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 10; $i++) {
            $teams = new Teams();
            $teams->setName('teamName-'.$i);
            $teams->setGithubRepo('githurepository-'.$i);
            $manager->persist($teams);
        }
        $manager->flush();
        // other fixtures can get this object using the TeamFixtures::TEAM_REFERENCE constant
        $this->addReference(self::TEAM_REFERENCE, $teams);
    }
}
