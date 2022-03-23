<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('defaultcontroller/index.html.twig', name: 'index')]
    public function index(): Response
    {
        return $this->render('defaultcontroller/index.html.twig', [

        ]);
    }

}
