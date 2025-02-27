<?php

namespace App\Controller;

use App\Entity\Depo;
use App\Form\DepoType;
use App\Repository\DepoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DepoController extends AbstractController
{
    private $admin = false;
    /**
     * @Route("/listdepo", name="app_listdepo")
     * @param Request $request
     * @param DepoRepository $depoRepository
     * @param EntityManagerInterface $em
     * @return Response
     */
    function listVideo(Request $request, DepoRepository $depoRepository, EntityManagerInterface $em): Response
    {
        $depo = new Depo();

        $form = $this->createForm(DepoType::class, $depo);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $depo = $form->getData();

            $em->persist($depo);
            $em->flush();

            return $this->redirectToRoute('app_listdepo');
        }

        return $this->render('depo/index.html.twig', [
            'depos' => $depoRepository->findAll(),
            'form' => $form->createView(),
            'admin' => $this->admin
        ]);
    }

    /**
     * @Route("deletedepo/{id}", name="app_delete_depo")
     * @param Request $request
     * @param Depo $depo
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function delVideo(Request $request, Depo $depo, EntityManagerInterface $em): Response
    {
        $em->remove($depo);
        $em->flush();
        $referer = $request->headers->get('referer');
        return $this->redirect($referer);
    }
}
