<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Journal;
use App\Entity\Conference;

class AjoutEventController extends AbstractController
{
    /**
     * @Route("/ajout", name="ajout_event")
     */
    public function index(Request $request)
    {
        $form = $this->createFormBuilder()
                    ->add("type", ChoiceType::class, ['choices' => ['Journal' => 'journal', "Conference" => "conference"]])
                    ->add('titre', TextType::class)
                    ->add('acronyme', TextType::class, ['required' => false, 'empty_data' => 'Non renseigné'])
                    ->add('portee', TextType::class, ['required' => false, 'empty_data' => 'Non renseigné'])
                    ->add('periodicite', TextType::class, ['required' => false, 'empty_data' => 'Non renseigné'])
                    ->add('attentes', TextType::class, ['required' => false, 'empty_data' => 'Non renseigné'])
                    ->add('topics', TextType::class, ['required' => false, 'empty_data' => 'Non renseigné'])
                    ->add('commentaire', TextType::class, ['required' => false, 'empty_data' => 'Non renseigné'])
                    ->add('ajouter', SubmitType::class)
                    ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->creationObjet($form->getData());
            echo '<script type="text/javascript">window.alert("Votre évenement a bien été ajouté !");</script>';
            return $this->render('accueil/accueil.html.twig', [
                'formRecherche' => $this->createFormBuilder()
                ->add('recherche', SearchType::class)
                ->add('Rechercher', SubmitType::class)
                ->getForm()->createView()
            ]);
        }

        return $this->render('ajout_event/ajout.html.twig', [
            'controller_name' => 'AjoutEventController',
            'form' => $form->createView(),
        ]);
    }

    private function creationObjet($formData){
        $manager = $this->getDoctrine()->getManager();
        // Ajouter un message de confirmation pour l'utilisateur
        if($formData["type"] == "journal"){
            $journal = new Journal();
            $journal->setTitreJourn($formData["titre"]); // Obligatoire (l'indiquer comme tel)
            $journal->setAcroJourn($formData["acronyme"]);
            $journal->setPorteeJourn($formData["portee"]); // Obligatoire (l'indiquer comme tel)
            $journal->setAttentesJourn($formData["attentes"]); 
            $journal->setTopicJourn($formData["topics"]);
            $journal->setCommJourn($formData["commentaire"]);

            $manager->persist($journal);
            $manager->flush();
        }
        else if($formData["type"] == "conference")
        {
            $conference = new Conference();
            $conference->setTitreConf($formData["titre"]);
            $conference->setAcroConf($formData["acronyme"]);
            $conference->setPorteeConf($formData["portee"]);
            $conference->setPerioConf($formData["periodicite"]);
            $conference->setAttentesConf($formData["attentes"]);
            $conference->setTopicConf($formData["topics"]);
            $conference->setCommConf($formData["commentaire"]);

            $manager->persist($conference);
            $manager->flush();
        }
    }
}
