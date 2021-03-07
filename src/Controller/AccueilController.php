<?php

namespace App\Controller;

use App\Entity\Chambre;
use App\Entity\Lit;
use App\Entity\Patient;
use App\Entity\Sejour;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index(): Response
    {
        // Requete nombre de chambres
        $repo = $this->getDoctrine()->getRepository(Chambre::class);
        $chambre = $repo->findAll();

        // Requete nombre de lits
        $repo = $this->getDoctrine()->getRepository(Lit::class);
        $lit= $repo->findAll();

        // Requete nombre de patients
        $repo = $this->getDoctrine()->getRepository(Patient::class);
        $patient= $repo->findAll();

        // Requete sur les fiches des patients
        $repo = $this->getDoctrine()->getRepository(Sejour::class);
        $sejour= $repo->findAll();

        return $this->render('accueil/index.html.twig', [
            'chambres' => $chambre,
            'lits' => $lit,
            'patients' => $patient,
            'sejours' => $sejour,
            'user' => $this->getUser()
        ]);
    }
}
