<?php

namespace App\Controller;

use App\Entity\Tasktype;
use App\Form\Tasktype1Type;
use App\Repository\TasktypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tasktype")
 */
class TasktypeController extends Controller
{
    /**
     * @Route("/", name="tasktype_index", methods="GET")
     */
    public function index(TasktypeRepository $tasktypeRepository): Response
    {
        return $this->render('tasktype/index.html.twig', ['tasktypes' => $tasktypeRepository->findAll()]);
    }

    /**
     * @Route("/new", name="tasktype_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $tasktype = new Tasktype();
        $form = $this->createForm(Tasktype1Type::class, $tasktype);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tasktype);
            $em->flush();

            return $this->redirectToRoute('tasktype_index');
        }

        return $this->render('tasktype/new.html.twig', [
            'tasktype' => $tasktype,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tasktype_show", methods="GET")
     */
    public function show(Tasktype $tasktype): Response
    {
        return $this->render('tasktype/show.html.twig', ['tasktype' => $tasktype]);
    }

    /**
     * @Route("/{id}/edit", name="tasktype_edit", methods="GET|POST")
     */
    public function edit(Request $request, Tasktype $tasktype): Response
    {
        $form = $this->createForm(Tasktype1Type::class, $tasktype);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tasktype_edit', ['id' => $tasktype->getId()]);
        }

        return $this->render('tasktype/edit.html.twig', [
            'tasktype' => $tasktype,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tasktype_delete", methods="DELETE")
     */
    public function delete(Request $request, Tasktype $tasktype): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tasktype->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tasktype);
            $em->flush();
        }

        return $this->redirectToRoute('tasktype_index');
    }
}
