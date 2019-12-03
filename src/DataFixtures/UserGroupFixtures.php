<?php

namespace App\DataFixtures;

use App\Entity\UserGroup;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UserGroupFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userGroup1 = new UserGroup();
        $userGroup1->setName("Poto's League");    
        $userGroup1->setUser($this->getReference("user-alex"));
        $manager->persist($userGroup1);
        $this->setReference("userGroup-potos", $userGroup1);
      

        $manager->flush();
    }
    /**
     * @return
     */
    public function getDependencies()
    {
        return [
            UserFixtures::class
        ];
    }
}
