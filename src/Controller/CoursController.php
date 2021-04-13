<?php

namespace App\Controller;

use App\Entity\Classroom;
use App\Entity\Cours;
use App\Entity\Etablissement;
use App\Form\CoursType;
use App\Repository\coursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cours")
 */
class CoursController extends AbstractController
{
    /**
     * @Route("/{id_Etab}", name="cours_index", methods={"GET"})
     *
     */
    public function index(Etablissement $id_Etab): Response
    {
        $repository=$this->getDoctrine()->getRepository(Cours::class);
        $list=$repository->findAll();
        return $this->render('cours/index.html.twig', [
            'cours' => $list,
            'id_Etab'=>$id_Etab,
        ]);
    }

    /**
     * @Route("/new/{id_Etab}", name="cours_new", methods={"GET","POST"})
     */
    public function new(Request $request,Etablissement $id_Etab): Response
    {
        $cour = new Cours();
        $form = $this->createForm(CoursType::class, $cour);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $cour->setIdEtab($id_Etab);
            $entityManager->persist($cour);
            $entityManager->flush();

            return $this->redirectToRoute('cours_index',['id_Etab'=>$id_Etab->getIdEtab()]);
        }

        return $this->render('cours/new.html.twig', [
            'cour' => $cour,
            'form' => $form->createView(),
            'id_Etb'=>$id_Etab,

        ]);
    }

    /**
     * @Route("/{idCours}", name="cours_show", methods={"GET"})
     */
    public function show(Cours $cour): Response
    {
        return $this->render('cours/show.html.twig', [
            'cour' => $cour,
        ]);
    }

    /**
     * @Route("/{idCours}/edit", name="cours_edit", methods={"GET","POST"})
     *
     */
    public function edit(Request $request, Cours $cour): Response
    {
        $form = $this->createForm(CoursType::class, $cour);
        $form->handleRequest($request);
        $id_Etab=$cour->getIdEtab();
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cours_index',['id_Etab'=>$id_Etab->getIdEtab()]);
        }

        return $this->render('cours/edit.html.twig', [
            'cour' => $cour,
            'form' => $form->createView(),
            'id_Etab'=>$id_Etab,

        ]);
    }

    /**
     * @Route("/{idCours}/{id_Etab}", name="cours_delete", methods={"GET","POST"})
     */
    public function delete(Request $request, Cours $cour,Etablissement $id_Etab): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cour->getIdCours(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cour);
            $entityManager->flush();
            return $this->redirectToRoute('cours_index',[$id_Etab->getIdEtab()]);
        }

        return $this->redirectToRoute('cours_edit',[$id_Etab->getIdEtab()]);
    }
}
