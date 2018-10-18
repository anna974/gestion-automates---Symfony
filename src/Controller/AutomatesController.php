<?php

namespace App\Controller;

use App\Entity\Automates;
use App\Form\AutomatesType;
use App\Repository\AutomatesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/automates")
 */
class AutomatesController extends AbstractController
{
    /**
     * @Route("/", name="automates_index", methods="GET")
     */
    public function index(AutomatesRepository $automatesRepository): Response
    {
        return $this->render('automates/index.html.twig', ['automates' => $automatesRepository->findAll()]);
    }

    /**
     * @Route("/new", name="automates_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $automate = new Automates();
        $form = $this->createForm(AutomatesType::class, $automate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($automate);
            $em->flush();

            return $this->redirectToRoute('automates_index');
        }

        return $this->render('automates/new.html.twig', [
            'automate' => $automate,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="automates_show", methods="GET")
     */
    public function show(Automates $automate): Response
    {
        return $this->render('automates/show.html.twig', ['automate' => $automate]);
    }

    /**
     * @Route("/{id}/edit", name="automates_edit", methods="GET|POST")
     */
    public function edit(Request $request, Automates $automate): Response
    {
        $form = $this->createForm(AutomatesType::class, $automate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('automates_edit', ['id' => $automate->getId()]);
        }

        return $this->render('automates/edit.html.twig', [
            'automate' => $automate,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="automates_delete", methods="DELETE")
     */
    public function delete(Request $request, Automates $automate): Response
    {
        if ($this->isCsrfTokenValid('delete'.$automate->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($automate);
            $em->flush();
        }

        return $this->redirectToRoute('automates_index');
    }
}
