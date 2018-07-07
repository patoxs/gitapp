<?php

namespace App\Controller;

use App\Entity\TeamUser;
use App\Form\TeamUserType;
use App\Repository\TeamUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/team/user")
 */
class TeamUserController extends Controller
{
    /**
     * @Route("/", name="team_user_index", methods="GET")
     */
    public function index(TeamUserRepository $teamUserRepository): Response
    {
        return $this->render('team_user/index.html.twig', ['team_users' => $teamUserRepository->findAll()]);
    }

    /**
     * @Route("/new", name="team_user_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $teamUser = new TeamUser();
        $form = $this->createForm(TeamUserType::class, $teamUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($teamUser);
            $em->flush();

            return $this->redirectToRoute('team_user_index');
        }

        return $this->render('team_user/new.html.twig', [
            'team_user' => $teamUser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="team_user_show", methods="GET")
     */
    public function show(TeamUser $teamUser): Response
    {
        return $this->render('team_user/show.html.twig', ['team_user' => $teamUser]);
    }

    /**
     * @Route("/{id}/edit", name="team_user_edit", methods="GET|POST")
     */
    public function edit(Request $request, TeamUser $teamUser): Response
    {
        $form = $this->createForm(TeamUserType::class, $teamUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('team_user_edit', ['id' => $teamUser->getId()]);
        }

        return $this->render('team_user/edit.html.twig', [
            'team_user' => $teamUser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="team_user_delete", methods="DELETE")
     */
    public function delete(Request $request, TeamUser $teamUser): Response
    {
        if ($this->isCsrfTokenValid('delete'.$teamUser->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($teamUser);
            $em->flush();
        }

        return $this->redirectToRoute('team_user_index');
    }
}
