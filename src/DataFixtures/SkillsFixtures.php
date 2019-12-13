<?php

namespace App\DataFixtures;

use App\Entity\Skills;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SkillsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 150; $i++) {
            $skills = new Skills();
            $skills->setSkill('amazing skill-' . $i);
            $manager->persist($skills);
        }
        $manager->flush();
    }
}