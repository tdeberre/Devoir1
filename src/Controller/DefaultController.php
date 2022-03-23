<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\FormActuType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Actu;

class DefaultController extends AbstractController
{
    #[Route('defaultcontroller/index.html.twig', name: 'index')]
    public function index(): Response
    {
        return $this->render('defaultcontroller/index.html.twig', [

        ]);
    }

    #[Route('defaultcontroller/actu.html.twig', name: 'actu')]
    public function actu(Request $request): Response
    {
        $actu = new Actu();
        $form = $this->createForm(FormActuType::class, $actu);
        return $this->render('defaultcontroller/actu.html.twig', [
            'form' => $form->createView()
        ]);

        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($actu);
                $em->flush();
                $this->addFlash('notice','Message envoyé');
                return $this->redirectToRoute('contact');
            }   
        }
        
    }
}
