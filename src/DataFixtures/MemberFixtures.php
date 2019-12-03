<?php

namespace App\DataFixtures;

use App\Entity\Member;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MemberFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $member1 = new Member();
        $member1->setFirstName("Alex");
        $member1->setTeam("Bucs");
        $member1->setMail("alex@free.fr");
        $member1->setLocation("Nice");
        $member1->setNflTeam($this->getReference("nflTeam-bucs"));
        $member1->setUserGroup($this->getReference("userGroup-potos"));
        $manager->persist($member1);
        $this->setReference("member-alex", $member1);

        $member2 = new Member();
        $member2->setFirstName("Brian");
        $member2->setTeam("Seahawks");
        $member2->setMail("brian@free.fr");
        $member2->setLocation("Denver");
        $member2->setNflTeam($this->getReference("nflTeam-seahawks"));
        $member2->setUserGroup($this->getReference("userGroup-potos"));
        $manager->persist($member2);
        $this->setReference("member-brian", $member2);

        $manager->flush();

    }
    /**
     * @return
     */
    public function getDependencies()
    {
        return [
            NflTeamFixtures::class,
            UserGroupFixtures::class,
        ];
    }
}
