<?php
// src/Controller/AccueilController.php

namespace App\Controller;

use App\Entity\News;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShowNewsController extends AbstractController
{
    /**
     * @Route("/_showNews", name="_showNews")
     */
    public function index()
    {
        return $this->render('_showNews.html.twig', [
            'controller_name' => 'ShowNewsController',
        ]);
    }

    
}

