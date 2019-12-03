<?php

namespace App\DataFixtures;

use App\Entity\NflTeam;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class NflTeamFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $NflTeam1 =new NflTeam();
        $NflTeam1 ->setName("Bucs");
        $NflTeam1->setLogo("logoBucs");
        $NflTeam1->setLogoBanner("logoBannerBucs");
        $manager->persist($NflTeam1);
        $this->setReference("nflTeam-bucs", $NflTeam1);

        $NflTeam2 =new NflTeam();
        $NflTeam2 ->setName("Seahawks");
        $NflTeam2->setLogo("logoSeahawks");
        $NflTeam2->setLogoBanner("logoBannerSeahawks");
        $manager->persist($NflTeam2);
        $this->setReference("nflTeam-seahawks", $NflTeam2);

        $manager->flush();
    }
}

