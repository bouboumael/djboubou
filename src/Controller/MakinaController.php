<?php

namespace App\Controller;

use App\Repository\LinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/makina", name="makina_")
 */
class MakinaController extends AbstractController
{
    /**
     * @Route("/présentation", name="index")
     */
    public function index(LinkRepository $link): Response
    {
        $links = $link->findAll();

        return $this->render('makina/index.html.twig',[
            'links' => $links,
        ]);
    }
}
