<?php

namespace App\Controller;

use App\Entity\Etablissement;
use App\Entity\Speciality;
use App\Form\SpecialityType;
use App\Repository\SpecialityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/speciality")
 */
class SpecialityController extends AbstractController
{
    /**
     * @Route("/{id}", name="speciality_index", methods={"GET"})
     */
    public function index(SpecialityRepository $specialityRepository, $id): Response
    {



        return $this->render('speciality/index.html.twig', [
            'specialities' => $specialityRepository->findByEtab($id),'id'=>$id
        ]);
    }
    /**
     * @Route("/{Nom}", name="map", methods={"GET"})
     */
    public function Map($Nom): Response
    {



        return $this->render('eleve/Map.html.twig', [
            'Nom' => $Nom
        ]);
    }

    /**
     * @Route("/new/{id}", name="speciality_new", methods={"GET","POST"})
     */
    public function new(Request $request,Etablissement $etablissement): Response
    {
        $speciality = new Speciality();
        $speciality->setEtablissement($etablissement);
        $form = $this->createForm(SpecialityType::class, $speciality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($speciality);
            $entityManager->flush();


            return $this->redirectToRoute('scoreapprox_new', ['id'=>$speciality->getId(),'idetab'=>$etablissement->getId()]);
        }

        return $this->render('speciality/new.html.twig', [
            'speciality' => $speciality,
            'form' => $form->createView(),
            'id'=>$etablissement->getId()
        ]);
    }

    /**
     * @Route("/{id}", name="speciality_show", methods={"GET"})
     */
    public function show(Speciality $speciality): Response
    {
        return $this->render('speciality/show.html.twig', [
            'speciality' => $speciality,
        ]);
    }

    /**
     * @Route("/{id}/edit/{idetab}", name="speciality_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Speciality $speciality, $idetab): Response
    {
        $form = $this->createForm(SpecialityType::class, $speciality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('scoreapprox_new', ['id'=>$speciality->getId(),'idetab'=>$idetab]);
        }

        return $this->render('speciality/edit.html.twig', [
            'speciality' => $speciality,
            'form' => $form->createView(),
            'id'=>$idetab
        ]);
    }

    /**
     * @Route("/{id}/{idetab}", name="speciality_delete", methods={"POST"})
     */
    public function delete(Request $request, Speciality $speciality, $idetab): Response
    {
        if ($this->isCsrfTokenValid('delete'.$speciality->getId(), $request->request->get('_token'))) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($speciality);
            $entityManager->flush();
        }

        return $this->redirectToRoute('speciality_index',[
        'id'=>$idetab
    ]);
    }
}
