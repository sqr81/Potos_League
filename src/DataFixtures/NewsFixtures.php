<?php

namespace App\DataFixtures;

use App\Entity\News;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NewsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $news1 = new News();
        $news1->setSubject("transfert");
        $news1->setArticle("Loren Ipsum...");
        $news1->setCreatedAt(new \DateTime("2019-12-03"));
        $news1->setUserGroup($this->getReference("userGroup-potos"));
        $news1->setUser($this->getReference("user-alex"));
        $news1->setPicture("http://placehold.it/350x150");
        $manager->persist($news1);
        $this->setReference("news-transfert", $news1);

        $news2 = new News();
        $news2->setSubject("blessure");
        $news2->setArticle("Loren Ipsum...");
        $news2->setCreatedAt(new \DateTime("2019-12-03"));
        $news2->setUserGroup($this->getReference("userGroup-potos"));
        $news2->setUser($this->getReference("user-brian"));
        $news2->setPicture("http://placehold.it/350x150");
        $manager->persist($news2);
        $this->setReference("news-transfert", $news2);

        $manager->flush();
    }
    /**
     * @return
     */
    public function getDependencies()
    {
        return [
            UserGroupFixtures::class,
            UserFixtures::class
        ];
    }
}
