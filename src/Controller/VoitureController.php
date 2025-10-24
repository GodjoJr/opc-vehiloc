<?php

namespace App\Controller;

use App\Entity\Voiture;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class VoitureController extends AbstractController
{
    #[Route('/voiture/{id}', name: 'app_voiture_show', requirements: ['id' => '\d+'])]
    public function show(int $id, EntityManagerInterface $em): Response
    {
        $voiture = $em->getRepository(Voiture::class)->find($id);

        if (!$voiture) {
            throw $this->createNotFoundException('Voiture non trouvée.');
        }

        return $this->render('voiture/show.html.twig', [
            'voiture' => $voiture,
        ]);
    }

        #[Route('/voiture/delete/{id}', name: 'app_voiture_delete', requirements: ['id' => '\d+'])]
    public function delete(int $id, EntityManagerInterface $em): Response
    {
        $voiture = $em->getRepository(Voiture::class)->find($id);

        if (!$voiture) {
            throw $this->createNotFoundException('Voiture non trouvée.');
        }

        $em->remove($voiture);
        $em->flush();

        return $this->redirectToRoute('app_index');
    }

}
