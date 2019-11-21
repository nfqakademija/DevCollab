<?php


namespace App\DataFixtures;

use App\Entity\ProjectDetails;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ProjectDetailsFixtures extends Fixture implements DependentFixtureInterface
{
    public function randomDate(\DateTime $start, \DateTime $end)
    {
        $randomTimestamp = mt_rand($start->getTimestamp(), $end->getTimestamp());
        $randomDate = new \DateTime();
        $randomDate->setTimestamp($randomTimestamp);
        return $randomDate;
    }

    public function load(ObjectManager $manager)
    {
        $date_start = new \DateTime('2019-10-11');
        $date_end = new \DateTime('2019-12-19');

        for ($i = 1; $i < 10; $i++) {
            $projectDetails = new ProjectDetails();
            $projectDetails->setRepository('Repository-' . $this->getReference(TeamsFixtures::TEAM_REFERENCE));
            $projectDetails->setCreated($this->randomDate($date_start, $date_end));
            $projectDetails->setDeadline($this->randomDate($date_start, $date_end));
        }
    }

    public function getDependencies()
    {
        return array(
            TeamsFixtures::class,
        );
    }
}
