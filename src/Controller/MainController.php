<?php
// src/Controller/AccueilController.php

namespace App\Controller;

use App\Entity\News;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index()
    {
        return $this->render('main.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    public function news()
    {
        $news = $this->getDoctrine()->getRepository(News::class)->findLastNews();
        return $this->render("news/_news.html.twig",[
            "new" => $news 
        ]);
    }
}

