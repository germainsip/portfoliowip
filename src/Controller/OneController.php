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
    private $admin = true;

    /**
     * @Route("/", name="app_home")
     * @param Request $request
     * @param CoursVideoRepository $coursVideoRepository
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function index(Request $request, CoursVideoRepository $coursVideoRepository, EntityManagerInterface $em): Response
    {
        return $this->render('one/index.html.twig', [
            'coursVideos' => $coursVideoRepository->findBy(array(), array('id' => 'DESC'), 4),
            'admin' => $this->admin,

        ]);
    }

    /**
     * @Route("/listvideo", name="app_listvideo")
     * @param Request $request
     * @param CoursVideoRepository $coursVideoRepository
     * @param EntityManagerInterface $em
     * @return Response
     */
    function listVideo(Request $request, CoursVideoRepository $coursVideoRepository, EntityManagerInterface $em): Response
    {
        $coursVideo = new CoursVideo();

        $form = $this->createForm(CoursVideoType::class, $coursVideo);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $coursVideo = $form->getData();

            $em->persist($coursVideo);
            $em->flush();

            return $this->redirectToRoute('app_listvideo');
        }

        return $this->render('one/videolist.html.twig', [
            'coursVideos' => $coursVideoRepository->findAll(),
            'form' => $form->createView(),
            'admin' => $this->admin
        ]);
    }

    /**
     * @Route("/{id}", name="app_video")
     * @param CoursVideo $coursVideo
     * @return Response
     */
    public function video(CoursVideo $coursVideo): Response
    {
        return $this->render('one/video.html.twig', [
            'coursVideo' => $coursVideo,
        ]);


    }

    /**
     * @Route("deletevideo/{id}", name="app_delete_video")
     * @param Request $request
     * @param CoursVideo $coursVideo
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function delVideo(Request $request, CoursVideo $coursVideo, EntityManagerInterface $em): Response
    {
        $em->remove($coursVideo);
        $em->flush();
        $referer = $request->headers->get('referer');
        return $this->redirect($referer);
    }
}
