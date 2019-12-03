<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $article1 = new Article();
        $article1->setSubject("Titan au top");
        $article1->setContent("loren ipsum...");
        $article1->setCreatedAt(new \DateTime("2019-12-03"));
        $article1->setCategory($this->getReference("category-actu"));
        $manager->persist($article1);
        $this->setReference("article-titan au top", $article1);

        $manager->flush();
    }
    /**
     * @return
     */
    public function getDependencies()
    {
        return [
            CategoryFixtures::class
        ];
    }
}
