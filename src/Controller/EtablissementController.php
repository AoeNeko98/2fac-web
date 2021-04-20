<?php

namespace App\Controller;

use App\Entity\Etablissement;
use App\Form\EtablissementType;
use App\Repository\EtablissementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/etablissement",methods={"GET","POST"})
 *
 */
class EtablissementController extends AbstractController
{
    /**
     * @Route("/etab/{etab}", name="etablissement_index", methods={"GET","POST"})
     *
     */
    public function index(EtablissementRepository $repository,Etablissement $etab): Response
    {
        $list=$repository->find($etab->getIdEtab());
        return $this->render('etablissement/index.html.twig',[
            'etabli'=>$list,
        ])  ;
    }

    /**
     * @Route("/login", name="etablissement_login", methods={"GET","POST"})
     */
    public function login( Request $request): Response
    {
        $etab=new Etablissement();
        $form=$this->createFormBuilder($etab)
            ->add('nom')
            ->add('password',PasswordType::class)
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() ){
            $pwd=$etab->getPassword();
            $nom=$etab->getNom();
            $repo= $this->getDoctrine()->getRepository(Etablissement::class);
            $user1=$repo->findOneBy(array('nom'=>$nom,'password'=>$pwd));
            if(!$user1){
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'Customer Added!'
                );
            }else{
                $etab->setIdEtab($user1->getIdEtab());
                return $this->redirectToRoute('etablissement_index',['etab'=>$etab->getIdEtab()]);

            }

        }
        return $this->render('etablissement/login.html.twig',[
            'etab'=>$etab,
            'form'=>$form->createView(),]) ;
    }
    /**
     * @Route("/new", name="etablissement_new", methods={"GET","POST"})
     *
     */
    public function new(Request $request): Response
    {
        $etablissement = new Etablissement();
        $form = $this->createForm(EtablissementType::class, $etablissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($etablissement);
            $entityManager->flush();

            return $this->redirectToRoute('etablissement_login');
        }

        return $this->render('etablissement/new.html.twig', [
            'etablissement' => $etablissement,
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/{idEtab}/edit", name="etablissement_edit", methods={"GET","POST"},)
     *
     */
    public function edit(Request $request, Etablissement $etablissement): Response
    {
        $form = $this->createForm(EtablissementType::class, $etablissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('etablissement_index',[
                'etab'=>$etablissement->getIdEtab()]);
        }

        return $this->render('etablissement/edit.html.twig', [
            'etablissement' => $etablissement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idEtab}", name="etablissement_delete", methods={"GET","POST"})
     *
     */
    public function delete(Request $request, Etablissement $etablissement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etablissement->getIdEtab(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($etablissement);
            $entityManager->flush();
            return $this->redirectToRoute('etablisscement_login');
        }

        return $this->redirectToRoute('etablissement_index',['etab'=>$etablissement->getIdEtab()]);
    }

}
