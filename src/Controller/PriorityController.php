<?php

namespace App\Controller;

use App\Entity\Priority;
use App\Form\PriorityType;
use App\Repository\PriorityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/priority")
 */
class PriorityController extends Controller
{
    /**
     * @Route("/", name="priority_index", methods="GET")
     */
    public function index(PriorityRepository $priorityRepository): Response
    {
        return $this->render('priority/index.html.twig', ['priorities' => $priorityRepository->findAll()]);
    }

    /**
     * @Route("/new", name="priority_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $priority = new Priority();
        $form = $this->createForm(PriorityType::class, $priority);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($priority);
            $em->flush();

            return $this->redirectToRoute('priority_index');
        }

        return $this->render('priority/new.html.twig', [
            'priority' => $priority,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="priority_show", methods="GET")
     */
    public function show(Priority $priority): Response
    {
        return $this->render('priority/show.html.twig', ['priority' => $priority]);
    }

    /**
     * @Route("/{id}/edit", name="priority_edit", methods="GET|POST")
     */
    public function edit(Request $request, Priority $priority): Response
    {
        $form = $this->createForm(PriorityType::class, $priority);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('priority_edit', ['id' => $priority->getId()]);
        }

        return $this->render('priority/edit.html.twig', [
            'priority' => $priority,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="priority_delete", methods="DELETE")
     */
    public function delete(Request $request, Priority $priority): Response
    {
        if ($this->isCsrfTokenValid('delete'.$priority->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($priority);
            $em->flush();
        }

        return $this->redirectToRoute('priority_index');
    }
}
