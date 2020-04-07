<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Journal;
use App\Entity\Conference;
use App\Entity\Note;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Doctrine\ORM\EntityManagerInterface;

class ListeController extends AbstractController
{
    /**
     * @Route("/liste", name="liste")
     */
    public function index()
    {
        $journaux = $this->getDoctrine()->getRepository(Journal::class)->findAll();
        $conferences = $this->getDoctrine()->getRepository(Conference::class)->findAll();
        $notes = $this->getDoctrine()->getRepository(Note::Class)->findAll();

        return $this->render('liste/liste.html.twig', [
            'journaux' => $journaux,
            'conferences' => $conferences,
            'notes' => $notes
        ]);
    }
}
