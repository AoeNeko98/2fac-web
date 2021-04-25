<?php

namespace App\Controller;

use App\Entity\Scoreapprox;
use App\Entity\Speciality;
use App\Form\ScoreapproxType;
use App\Repository\ScoreapproxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/scoreapprox")
 */
class ScoreapproxController extends AbstractController
{
    /**
     * @Route("/", name="scoreapprox_index", methods={"GET"})
     */
    public function index(ScoreapproxRepository $scoreapproxRepository): Response
    {
        return $this->render('scoreapprox/index.html.twig', [
            'scoreapproxes' => $scoreapproxRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/{id}/{idetab}", name="scoreapprox_new", methods={"GET","POST"})
     */
    public function new(Request $request, Speciality $speciality, $idetab): Response
    {
        $scoreapprox = new Scoreapprox();
        $scoreapprox->setSpeciality($speciality);
        $form = $this->createForm(ScoreapproxType::class, $scoreapprox);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($scoreapprox);
            $entityManager->flush();

            return $this->redirectToRoute('speciality_index', ['id'=>$idetab] );
        }

        return $this->render('scoreapprox/new.html.twig', [
            'scoreapprox' => $scoreapprox,
            'form' => $form->createView(),
            'id'=>$idetab
        ]);
    }

    /**
     * @Route("/{id}", name="scoreapprox_show", methods={"GET"})
     */
    public function show(Scoreapprox $scoreapprox): Response
    {
        return $this->render('scoreapprox/show.html.twig', [
            'scoreapprox' => $scoreapprox,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="scoreapprox_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Scoreapprox $scoreapprox): Response
    {
        $form = $this->createForm(ScoreapproxType::class, $scoreapprox);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('scoreapprox_index');
        }

        return $this->render('scoreapprox/edit.html.twig', [
            'scoreapprox' => $scoreapprox,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="scoreapprox_delete", methods={"POST"})
     */
    public function delete(Request $request, Scoreapprox $scoreapprox): Response
    {
        if ($this->isCsrfTokenValid('delete'.$scoreapprox->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($scoreapprox);
            $entityManager->flush();
        }

        return $this->redirectToRoute('scoreapprox_index');
    }
}
