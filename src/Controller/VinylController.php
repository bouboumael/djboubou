<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\SearchCategory;
use App\Entity\Vinyl;
use App\Form\SearchCategoryType;
use App\Repository\CategoryRepository;
use App\Repository\VinylRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/vinyl", name="vinyl_")
 */
class VinylController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(VinylRepository $vinylRepository, CategoryRepository $categoryRepository, Request $request): Response
    {
        $vinyls = $vinylRepository->findBy([], ['title' => 'ASC']);

        $searchCategory = new SearchCategory();
        $form = $this->createForm(SearchCategoryType::class, $searchCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $categoryRepository->findOneByName($searchCategory->getCategory());
            if ($category instanceof Category) {
                $vinyls = $vinylRepository->findBy([
                    'category' => $category
                ], [
                    'title' => 'ASC'
                ]);
            }
        }

        return $this->render('vinyl/index.html.twig', [
            'controller_name' => 'VinylController',
            'vinyls' => $vinyls,
            'form' => $form->createView(),
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
