<?php

namespace App\Controller;

use App\Entity\Eleve;
use App\Entity\Speciality;
use App\Form\EleveType;
use App\Form\FormScoreType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/eleve")
 */
class EleveController extends AbstractController
{
    /**
     * @Route("", name="eleve_index", methods={"GET"})
     */
    public function index(): Response
    {
        $eleves = $this->getDoctrine()
            ->getRepository(Eleve::class)
            ->findAll();

        return $this->render('eleve/index.html.twig', [
            'eleves' => $eleves,
        ]);
    }

    /**
     * @Route("/new", name="eleve_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $eleve = new Eleve();

        $eleve->setIdUser(16);
        $eleve->setScore(0);
        $form = $this->createForm(EleveType::class, $eleve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $id=$eleve->getIdUser();
            $bactype= $eleve->getBacType();
            $entityManager->persist($eleve);
            $entityManager->flush();

            return $this->redirectToRoute('eleve_newSc',['idUser'=>$id]);
        }

        return $this->render('eleve/new.html.twig', [
            'eleve' => $eleve,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/newS/{idUser}", name="eleve_newSc", methods={"GET","POST"})
     */
    public function editSc(Request $request, Eleve $eleve): Response
    {
        $form = $this->createForm(FormScoreType::class, $eleve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('eleve_index');
        }
        if($eleve->getBacType() == 'Eco'){
        return $this->render('eleve/BacEco.html.twig', [
            'eleve' => $eleve,
            'form'  => $form->createView(),

        ]);}
        elseif ($eleve->getBacType() == 'Info'){
            return $this->render('eleve/BacInfo.html.twig', [
                'eleve' => $eleve,
                'form'  => $form->createView(),

            ]);
        }
        elseif ($eleve->getBacType() == 'Let'){
            return $this->render('eleve/BacLet.html.twig', [
                'eleve' => $eleve,
                'form'  => $form->createView(),

            ]);
        }
        elseif ($eleve->getBacType() == 'Math'){
            return $this->render('eleve/BacMath.html.twig', [
                'eleve' => $eleve,
                'form'  => $form->createView(),

            ]);
        }
        elseif ($eleve->getBacType() == 'Sc'){
            return $this->render('eleve/BacSc.html.twig', [
                'eleve' => $eleve,
                'form'  => $form->createView(),

            ]);
        }
        elseif ($eleve->getBacType() == 'Sp'){
            return $this->render('eleve/BacSp.html.twig', [
                'eleve' => $eleve,
                'form'  => $form->createView(),

            ]);
        }
        elseif ($eleve->getBacType() == 'Tech'){
            return $this->render('eleve/BacTech.html.twig', [
                'eleve' => $eleve,
                'form'  => $form->createView(),
            ]);
        }

    }

    /**
     * @Route("/{idUser}/edit", name="eleve_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Eleve $eleve): Response
    {
        $form = $this->createForm(EleveType::class, $eleve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('eleve_index');
        }

        return $this->render('eleve/edit.html.twig', [
            'eleve' => $eleve,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/{idUser}", name="eleve_show", methods={"GET"})
     */
    public function show(Eleve $eleve): Response
    {
        return $this->render('eleve/show.html.twig', [
            'eleve' => $eleve,
        ]);
    }

    /**
     * @Route("/{idUser}", name="eleve_delete", methods={"POST"})
     */
    public function delete(Request $request, Eleve $eleve): Response
    {
        if ($this->isCsrfTokenValid('delete'.$eleve->getIdUser(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($eleve);
            $entityManager->flush();
        }

        return $this->redirectToRoute('eleve_index');
    }
}
