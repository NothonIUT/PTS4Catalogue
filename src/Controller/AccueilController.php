<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Journal;
use App\Entity\Conference;
use App\Entity\Note;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request)
    {
        $resultatsConf = ['succes' => 'init'];
        $resultatsJourn  = ['succes' => 'init'];
        $form = $this->createFormBuilder()
                    ->add('recherche', SearchType::class)
                    ->add('Rechercher', SubmitType::class)
                    ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $resultatsConf = $this->rechercheConf($form->getData()["recherche"]);
            $resultatsJourn = $this->rechercheJourn($form->getData()["recherche"]);
            $notes = $this->getDoctrine()->getRepository(Note::class)->findAll();
            return $this->render('recherche/recherche.html.twig', [
                'formRecherche' => $form->createView(),
                'resultatsConf' => $resultatsConf,
                'resultatsJourn' => $resultatsJourn,
                'notes' => $notes
        ]);
        }

        return $this->render('accueil/accueil.html.twig', [
            'controller_name' => 'AccueilController',
            'formRecherche' => $form->createView()
        ]);
    }

    public function rechercheConf($formInfo){
        $dbm = $this->getDoctrine()->getRepository(Conference::class);
        $conferences = $dbm->findAll();

        
        $query =

        $resultats = [];
        if ($formInfo == "conference") {
            $resultats = $conferences;
        }else {
            for ($cpt = 0; $cpt < sizeof($conferences); $cpt++){
                if (stristr($conferences[$cpt]->getTitreConf(), $formInfo) != false or stristr($conferences[$cpt]->getAcroConf(), $formInfo) != false 
                    or stristr($conferences[$cpt]->getTopicConf(), $formInfo) or stristr($conferences[$cpt]->getPorteeConf(), $formInfo) 
                    or stristr($conferences[$cpt]->getPerioConf(), $formInfo)){
                    $resultats[$cpt] = $conferences[$cpt];
                }
            }
        }        
        if (sizeof($resultats) > 0){
            $resultats["succes"] = "oui";
        }else{
            $resultats["succes"] = "non";
        }
        return $resultats;
    }

    // Recherche sur le plus de critères possibles (recherche avancées par exemple)
    // Document : ne pas détailler l'installation des logiciels en eux mêmes mais simplement lesquels utilisés
    // Le code doit être documenté
    // Date de rendu : 15 Avril ou avant
    public function rechercheJourn($formInfo){
        $dbm = $this->getDoctrine()->getRepository(Journal::class);
        $journaux = $dbm->findAll();
        $resultats = [];
        if ($formInfo == "newspaper" or $formInfo == "journaux") {
            $resultats = $journaux;
        }else {
            for ($cpt = 0; $cpt < sizeof($journaux); $cpt++){
                if (stristr($journaux[$cpt]->getTitreJourn(), $formInfo) != false or stristr($journaux[$cpt]->getAcroJourn(), $formInfo) != false
                    or stristr($journaux[$cpt]->getTopicJourn(), $formInfo) or stristr($journaux[$cpt]->getPorteeJourn(), $formInfo)){
                    $resultats[$cpt] = $journaux[$cpt];
                }
            }
        }
        if (sizeof($resultats) > 0){
            $resultats["succes"] = "oui";
        }else{
            $resultats["succes"] = "non";
        }
        return $resultats;
    }
}
