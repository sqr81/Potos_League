<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SeasonFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $season1 = new Season();
        $season1->setStartYear(2019);
        $season1->setEndYear(2020);
        $manager->persist($season1);
        $this->setReference("season-2019", $season1);

        $manager->flush();
    }
}
