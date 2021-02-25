<?php

namespace App\Controller;

use App\Entity\CoursVideo;
use App\Form\CoursVideoType;
use App\Repository\CoursVideoRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OneController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     * @param Request $request
     * @param CoursVideoRepository $coursVideoRepository
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function index(Request $request,CoursVideoRepository $coursVideoRepository,EntityManagerInterface $em): Response
    {
         $coursVideo = new CoursVideo();

         $form = $this->createForm(CoursVideoType::class,$coursVideo);
         $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        $coursVideo = $form->getData();

        $em->persist($coursVideo);
        $em->flush();

        return $this->redirectToRoute('one');

    }

        return $this->render('one/index.html.twig', [
            'coursVideos' => $coursVideoRepository->findBy(array(),array('id' => 'DESC'),4),
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/listvideo", name="app_listvideo")
     * @return Response
     */
    function listVideo(): Response
    {
        return $this->render('one/videolist.html.twig');
    }
}
