<?php

namespace App\Controller;

use App\Entity\Incidence;
use App\Form\IncidenceType;
use App\Repository\IncidenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/incidence")
 */
class IncidenceController extends Controller
{
    /**
     * @Route("/", name="incidence_index", methods="GET")
     */
    public function index(IncidenceRepository $incidenceRepository): Response
    {
        return $this->render('incidence/index.html.twig', ['incidences' => $incidenceRepository->findAll()]);
    }

    /**
     * @Route("/new", name="incidence_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $incidence = new Incidence();
        $form = $this->createForm(IncidenceType::class, $incidence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($incidence);
            $em->flush();

            return $this->redirectToRoute('incidence_index');
        }

        return $this->render('incidence/new.html.twig', [
            'incidence' => $incidence,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="incidence_show", methods="GET")
     */
    public function show(Incidence $incidence): Response
    {
        return $this->render('incidence/show.html.twig', ['incidence' => $incidence]);
    }

    /**
     * @Route("/{id}/edit", name="incidence_edit", methods="GET|POST")
     */
    public function edit(Request $request, Incidence $incidence): Response
    {
        $form = $this->createForm(IncidenceType::class, $incidence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('incidence_edit', ['id' => $incidence->getId()]);
        }

        return $this->render('incidence/edit.html.twig', [
            'incidence' => $incidence,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="incidence_delete", methods="DELETE")
     */
    public function delete(Request $request, Incidence $incidence): Response
    {
        if ($this->isCsrfTokenValid('delete'.$incidence->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($incidence);
            $em->flush();
        }

        return $this->redirectToRoute('incidence_index');
    }
}
