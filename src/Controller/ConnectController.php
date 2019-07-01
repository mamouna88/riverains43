<?php

namespace App\Controller;


use App\Form\RoleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


use Symfony\Component\Routing\Annotation\Route;

class ConnectController extends AbstractController
{
    /**
     * @Route("/connect", name="connect")
     */
    public function index()
    {
        $form = $this->createForm(RoleType::class);


        return $this->render('connect/index.html.twig', [
            'controller_name' => 'ConnectController',
            'contactForm'    => $form->createView()
        ]);
    }

}
