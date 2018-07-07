<?php

namespace App\Controller;

use App\Entity\Merge;
use App\Form\MergeType;
use App\Repository\MergeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/merge")
 */
class MergeController extends Controller
{
    /**
     * @Route("/", name="merge_index", methods="GET")
     */
    public function index(MergeRepository $mergeRepository): Response
    {
        return $this->render('merge/index.html.twig', ['merges' => $mergeRepository->findAll()]);
    }

    /**
     * @Route("/new", name="merge_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $merge = new Merge();
        $form = $this->createForm(MergeType::class, $merge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($merge);
            $em->flush();

            return $this->redirectToRoute('merge_index');
        }

        return $this->render('merge/new.html.twig', [
            'merge' => $merge,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="merge_show", methods="GET")
     */
    public function show(Merge $merge): Response
    {
        return $this->render('merge/show.html.twig', ['merge' => $merge]);
    }

    /**
     * @Route("/{id}/edit", name="merge_edit", methods="GET|POST")
     */
    public function edit(Request $request, Merge $merge): Response
    {
        $form = $this->createForm(MergeType::class, $merge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('merge_edit', ['id' => $merge->getId()]);
        }

        return $this->render('merge/edit.html.twig', [
            'merge' => $merge,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="merge_delete", methods="DELETE")
     */
    public function delete(Request $request, Merge $merge): Response
    {
        if ($this->isCsrfTokenValid('delete'.$merge->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($merge);
            $em->flush();
        }

        return $this->redirectToRoute('merge_index');
    }
}
