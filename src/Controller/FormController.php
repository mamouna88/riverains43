<?php

namespace App\Controller;

use App\Entity\Adherent;
use App\Form\AdherentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/register", name="register")

     */
    public function index()
    {
        $form = new Adherent(); $form = $this->createForm(AdherentType::class, $form);
        return $this->render('form/index.html.twig', [
            'controller_name' => 'FormController',
            'createForm'    => $form->createView()
        ]);
    }
}
