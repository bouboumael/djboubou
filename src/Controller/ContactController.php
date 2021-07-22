<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact->setPostedAt(new DateTimeImmutable());
            $entityManager->persist($contact);


            $entityManager->flush();
            $this->addFlash('success', 'Merci pour vote message ' . ucfirst($contact->getFirstname()) . '. Je reviens vers vous rapidement.');
            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView(),
        ]);
    }
}
