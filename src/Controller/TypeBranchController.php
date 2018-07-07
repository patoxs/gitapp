<?php

namespace App\Controller;

use App\Entity\TypeBranch;
use App\Form\TypeBranchType;
use App\Repository\TypeBranchRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/branch")
 */
class TypeBranchController extends Controller
{
    /**
     * @Route("/", name="type_branch_index", methods="GET")
     */
    public function index(TypeBranchRepository $typeBranchRepository): Response
    {
        return $this->render('type_branch/index.html.twig', ['type_branches' => $typeBranchRepository->findAll()]);
    }

    /**
     * @Route("/new", name="type_branch_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $typeBranch = new TypeBranch();
        $form = $this->createForm(TypeBranchType::class, $typeBranch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeBranch);
            $em->flush();

            return $this->redirectToRoute('type_branch_index');
        }

        return $this->render('type_branch/new.html.twig', [
            'type_branch' => $typeBranch,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_branch_show", methods="GET")
     */
    public function show(TypeBranch $typeBranch): Response
    {
        return $this->render('type_branch/show.html.twig', ['type_branch' => $typeBranch]);
    }

    /**
     * @Route("/{id}/edit", name="type_branch_edit", methods="GET|POST")
     */
    public function edit(Request $request, TypeBranch $typeBranch): Response
    {
        $form = $this->createForm(TypeBranchType::class, $typeBranch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_branch_edit', ['id' => $typeBranch->getId()]);
        }

        return $this->render('type_branch/edit.html.twig', [
            'type_branch' => $typeBranch,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_branch_delete", methods="DELETE")
     */
    public function delete(Request $request, TypeBranch $typeBranch): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeBranch->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeBranch);
            $em->flush();
        }

        return $this->redirectToRoute('type_branch_index');
    }
}
