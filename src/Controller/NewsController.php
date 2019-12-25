<?php
// src/Controller/AccueilController.php

namespace App\Controller;

use App\Entity\News;
use Doctrine\ORM\Mapping\Id;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("/news/_showNews", name="_showNews")
     */
    public function news()
    {
        $news = $this->getDoctrine()->getRepository(News::class)->findLastNews();
        return $this->render("news/_cardNews.html.twig",[
            "new" => $news
        ]);
    }
    
    public function showNews()
    {
        $news = $this->getDoctrine()->getRepository(News::class)->showNews();
        return $this->render("/news/_showNews.html.twig",[          
            "new" => $news,           
        ]);
    }

    

}

