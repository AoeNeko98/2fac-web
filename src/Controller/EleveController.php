<?php

namespace App\Controller;

use App\Entity\Eleve;
use App\Entity\SpecialitySear;
use App\Entity\User;
use App\Form\EleveType;
use App\Form\SpecialitySearType;
use App\Repository\EleveRepository;
use App\Repository\EtablissementRepository;
use App\Repository\ScoreapproxRepository;
use App\Repository\SpecialityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\FormScoreType;

/**
 * @Route("/eleve")
 */
class EleveController extends AbstractController
{
    /**
     * @Route("/", name="eleve_index", methods={"GET"})
     */
    public function index(EleveRepository $eleveRepository): Response
    {
        return $this->render('eleve/index.html.twig', [
            'eleves' => $eleveRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/{id}", name="eleve_new", methods={"GET","POST"})
     */
    public function new(Request $request, User $user): Response
    {
        $eleve = new Eleve();
        $eleve->setUser($user);
        $form = $this->createForm(EleveType::class, $eleve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($eleve);

            $entityManager->flush();

            $id=$eleve->getId();

            return $this->redirectToRoute('eleve_newSc',['id'=>$id]);
        }

        return $this->render('eleve/new.html.twig', [
            'eleve' => $eleve,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/score/{id}", name="specialit", methods={"GET","POST"})
     *
     */
    public function specialists(ScoreapproxRepository $scoreRepository ,SpecialityRepository $specialityRepository,EtablissementRepository $etablissementRepository,Eleve  $eleve ,Request $request): Response
    {   $specialitysearch = new SpecialitySear();
        $form = $this->createForm(SpecialitySearType::class,$specialitysearch);
        $form->handleRequest($request);
        $spec= $scoreRepository->findAll();
        $specs=$specialityRepository->findAll();
        $etabs=$etablissementRepository->findAll();
        $type=$eleve->getBacType();
        if($form->isSubmitted() && $form->isValid()) {

            $nom = $specialitysearch->getNom();
            $etabsearch=$specialitysearch->getEtab()->getNom();

            if ($nom=="Nan" && $etabsearch!="Nan"){
                //si on a fourni un nom d'article on affiche tous les articles ayant ce nom
                $etabs= $etablissementRepository->findBy(['Nom' => $etabsearch] );
                $specs=$specialityRepository->findAll();
                return $this->redirectToRoute('specialitSearch',['id'=>$eleve->getId() , 'nom'=>"Nan" , 'etabsearch'=>$etabsearch]);
                }

            elseif($nom!="Nan" && $etabsearch!="Nan"){
                //si si aucun nom n'est fourni on affiche tous les articles
                $etabs= $etablissementRepository->findBy(['Nom' => $etabsearch] );
                $specs=$specialityRepository->findByExampleField($nom);
                return $this->redirectToRoute('specialitSearch',['id'=>$eleve->getId() , 'nom'=>$nom, 'etabsearch'=>$etabsearch]);}
            else{
                echo "erreur"
;          echo $nom;
            echo $etabsearch;}

        }

        return $this->render('eleve/ShowSpec.html.twig', [
            'scores' => $spec,'eleve' => $eleve,'type'=>$type,'form'=>$form->createView(),'specs'=>$specs,'etabs'=>$etabs,
        ]);
    }
    /**
     * @Route("/score/{id}/{nom}/{etabsearch}", name="specialitSearch", methods={"GET","POST"})
     *
     */
    public function specialistsSearch(ScoreapproxRepository $scoreRepository ,SpecialityRepository $specialityRepository,EtablissementRepository $etablissementRepository,Eleve  $eleve ,Request $request, $nom , $etabsearch): Response
    {   $specialitysearch = new SpecialitySear();
        $form = $this->createForm(SpecialitySearType::class,$specialitysearch);
        $form->handleRequest($request);
        $spec= $scoreRepository->findAll();
        $type=$eleve->getBacType();
        if($form->isSubmitted() && $form->isValid()) {
            $nom = $specialitysearch->getNom();
            $etabsearch=$specialitysearch->getEtab()->getNom();
            if ($nom=="Nan" && $etabsearch!="Nan"){

                $etabs= $etablissementRepository->findBy(['Nom' => $etabsearch] );
                $specs=$specialityRepository->findAll();
                return $this->redirectToRoute('specialitSearch',['id'=>$eleve->getId() , 'nom'=>"Nan" , 'etabsearch'=>$etabsearch]);

            }

            elseif($nom!="Nan" && $etabsearch!="Nan"){

                $etabs= $etablissementRepository->findOneBySomeField( $etabsearch);
                $specs=$specialityRepository->findOneBySomeField($nom);}
            return $this->redirectToRoute('specialitSearch',['id'=>$eleve->getId() , 'nom'=>$nom , 'etabsearch'=>$etabsearch]);
        }
        elseif ($nom=="Nan" && $etabsearch!="Nan"){

            $etabs= $etablissementRepository->findBy(array('Nom' => $etabsearch) );
            $specs=$specialityRepository->findAll();
            return $this->render('eleve/ShowSpec.html.twig', [
                'scores' => $spec,'eleve' => $eleve,'type'=>$type,'form'=>$form->createView(),'specs'=>$specs,'etabs'=>$etabs,
            ]);
        }

        else{

            $etabs= $etablissementRepository->findOneBySomeField($etabsearch);
            $specs=$specialityRepository->findOneBySomeField($nom);
            return $this->render('eleve/ShowOneSpec.html.twig', [
                'scores' => $spec,'eleve' => $eleve,'type'=>$type,'form'=>$form->createView(),'specs'=>$specs,'etabs'=>$etabs,
            ]);
       }

    }

/**
 * @Route("/newS/{id}", name="eleve_newSc", methods={"GET","POST"})
 */
public function editSc(Request $request, Eleve $eleve): Response
{
    $form = $this->createForm(FormScoreType::class, $eleve);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('specialit', ['id'=>  $eleve->getId()]);
    }
    if($eleve->getBacType() == 'ECO'){
        return $this->render('eleve/BacEco.html.twig', [
            'eleve' => $eleve,
            'form'  => $form->createView(),

        ]);}
    elseif ($eleve->getBacType() == 'INFO'){
        return $this->render('eleve/BacInfo.html.twig', [
            'eleve' => $eleve,
            'form'  => $form->createView(),

        ]);
    }
    elseif ($eleve->getBacType() == 'LET'){
        return $this->render('eleve/BacLet.html.twig', [
            'eleve' => $eleve,
            'form'  => $form->createView(),

        ]);
    }
    elseif ($eleve->getBacType() == 'MATH'){
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
    elseif ($eleve->getBacType() == 'SPORT'){
        return $this->render('eleve/BacSp.html.twig', [
            'eleve' => $eleve,
            'form'  => $form->createView(),

        ]);
    }
    elseif ($eleve->getBacType() == 'TECH'){
        return $this->render('eleve/BacTech.html.twig', [
            'eleve' => $eleve,
            'form'  => $form->createView(),
        ]);
    }}



    /**
     * @Route("/{id}", name="eleve_show", methods={"GET"})
     */
    public function show(Eleve $eleve): Response
    {
        return $this->render('eleve/show.html.twig', [
            'eleve' => $eleve,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="eleve_edit", methods={"GET","POST"})
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
     * @Route("/{id}", name="eleve_delete", methods={"POST"})
     */
    public function delete(Request $request, Eleve $eleve): Response
    {
        if ($this->isCsrfTokenValid('delete'.$eleve->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($eleve);
            $entityManager->flush();
        }

        return $this->redirectToRoute('eleve_index');
    }
}
