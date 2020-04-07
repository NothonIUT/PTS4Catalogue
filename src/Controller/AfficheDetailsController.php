<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Journal;
use App\Entity\Conference;
use App\Entity\Note;

class AfficheDetailsController extends AbstractController
{
    /**
     * @Route("/affiche/{type}/{id}", name="affiche_details")
     */
    public function index($type, $id)
    {
        $evenement = [];
        if ($type == "journal"){
            $evenement = $this->getDoctrine()->getRepository(Journal::class)->find($id);
            $notes = $this->getDoctrine()->getRepository(Note::class)->findBy(["idJourn" => $id]);
        }else{
            $evenement = $this->getDoctrine()->getRepository(Conference::class)->find($id); 
            $notes = $this->getDoctrine()->getRepository(Note::class)->findBy(["idConf" => $id]);
        }
        return $this->render('affiche_details/details.html.twig', [
            'event' => $evenement,
            'notes' => $notes,
            'type' => $type
        ]);
    }
}
