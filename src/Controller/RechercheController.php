<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RechercheController extends AbstractController
{
    /**
     * @Route("/recherche", name="recherche")
     */
    public function index()
    {
        return $this->render('recherche/recherche.html.twig', [
            'controller_name' => 'RechercheController',
        ]);
    }
}
