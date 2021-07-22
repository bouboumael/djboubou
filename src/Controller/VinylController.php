<?php

namespace App\Controller;

use App\Entity\Vinyl;
use App\Repository\VinylRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vinyl", name="vinyl_")
 */
class VinylController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(VinylRepository $vinylRepository): Response
    {

        return $this->render('vinyl/index.html.twig', [
            'controller_name' => 'VinylController',
            'vinyls' => $vinylRepository->findBy([], ['title' => 'ASC'])
        ]);
    }

    /**
     * @Route("/{title}", name="show")
     *
     */
    public function show(Vinyl $vinyl): Response
    {
        return $this->render('vinyl/show.html.twig', [
            'controller_name' => 'VinylController',
            'vinyl' => $vinyl,
        ]);
    }
}
