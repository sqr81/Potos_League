<?php
// src/Controller/AccueilController.php

namespace App\Controller;

use App\Entity\News;
use Doctrine\ORM\Mapping\Id;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MemberController extends AbstractController

{
    /**
     * @Route("/member", name="member")
     */
    public function member()
    {
        
        return $this->render("/member.html.twig");
    }
}