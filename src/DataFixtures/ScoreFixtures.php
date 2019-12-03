<?php

namespace App\DataFixtures;

use App\Entity\Score;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ScoreFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $score1 = new Score();
        $score1->setWeek(1);
        $score1->setScore1(123);
        $score1->setScore2(112);
        $score1->setHome($this->getReference("member-alex"));
        $score1->setAway($this->getReference("member-brian"));
        $score1->setSeason($this->getReference("season-2019"));
        $manager->persist($score1);
        $this->setReference("score-week1", $score1);

        $score2 = new Score();
        $score2->setWeek(1);
        $score2->setScore1(123);
        $score2->setScore2(112);
        $score2->setHome($this->getReference("member-alex"));
        $score2->setAway($this->getReference("member-brian"));
        $score2->setSeason($this->getReference("season-2019"));
        $manager->persist($score1);
        $this->setReference("score-week1", $score1);

        $manager->flush();
    }
        /**
     * @return
     */
    public function getDependencies()
    {
        return [
            SeasonFixtures::class,
            MemberFixtures::class
        ];
    }
}
