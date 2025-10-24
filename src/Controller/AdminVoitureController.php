<?php

namespace App\Controller;

use App\Entity\Voiture;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\VoitureType;
use Doctrine\ORM\EntityManagerInterface;
use Dom\Entity;

#[Route('/admin/voiture', name: 'app_admin_voiture_')]
final class AdminVoitureController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('admin_voiture/index.html.twig', [
            'controller_name' => 'AdminVoitureController',
        ]);
    }

    #[Route('/new', name: 'new')]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {

        $voiture = new Voiture();
        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($voiture);
            $manager->flush();
            return $this->redirectToRoute('app_index');
           
        }

        return $this->render('admin_voiture/new.html.twig', [
            'controller_name' => 'AdminVoitureController',
            'form' => $form,
        ]);
    }
}
