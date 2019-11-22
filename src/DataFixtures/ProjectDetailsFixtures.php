<?php

namespace App\DataFixtures;

use App\Entity\ProjectDetails;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ProjectDetailsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $date_start_created = new \DateTime('2019-10-11');
        $date_end_created = new \DateTime('2019-12-19');
        $date_start_deadline = new \DateTime('2019-12-19');
        $date_end_deadline = new \DateTime('2020-01-08');

        for ($i = 1; $i < 10; $i++) {
            $projectDetails = new ProjectDetails();
            $projectDetails->setRepository('Repository-'.$i);
            $projectDetails->setCreated($this->randomDate($date_start_created, $date_end_created));
            $projectDetails->setDeadline($this->randomDate($date_start_deadline, $date_end_deadline));
            $projectDetails->setProjects($this->getReference(ProjectsFixtures::PROJECT_REFERENCE));
            $manager->persist($projectDetails);
        }
        $manager->flush();
    }

    public function randomDate(\DateTime $start, \DateTime $end)
    {
        $randomTimestamp = mt_rand($start->getTimestamp(), $end->getTimestamp());
        $randomDate = new \DateTime();
        $randomDate->setTimestamp($randomTimestamp);
        return $randomDate;
    }

    public function getDependencies()
    {
        return array(
            TeamsFixtures::class,
            ProjectsFixtures::class,
        );
    }
}
