<?php

namespace App\Controller;

use App\Entity\Classroom;

use App\Entity\Cours;
use App\Entity\Etablissement;
use App\Entity\Rating;
use App\Entity\User;
use App\Form\CoursType;
use App\Repository\coursRepository;
use App\Repository\RatingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cours")
 */
class CoursController extends AbstractController
{
    /**
     * @Route("/etab/{id_Etab}", name="cours_index", methods={"GET","POST"})
     *
     */
    public function index($id_Etab): Response
    {
        $repository=$this->getDoctrine()->getRepository(Cours::class);
        $list=$repository->findAll();
        $repository1=$this->getDoctrine()->getRepository(Rating::class);
        $rates=$repository1->findAll();
        return $this->render('cours/index.html.twig', [
            'cours' => $list,
            'id_Etab'=>$id_Etab,
            'rates'=>$rates,
        ]);
    }

    /**
     * @Route("/new/{id_Etab}", name="cours_new", methods={"GET","POST"})
     */
    public function new(Request $request,Etablissement $id_Etab): Response
    {
        define ('Pidevpdf', '/public/');
        $cour = new Cours();
        $form = $this->createForm(CoursType::class, $cour)
        ->add('Cours',FileType::class,array('data_class' => null));
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $file = $cour->getCours();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move('Pidevpdf', $fileName);
            $cour->setCours($fileName);
            $cour->setId($id_Etab);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cour);
            $entityManager->flush();

            return $this->redirectToRoute('cours_index',['id_Etab'=>$id_Etab->getId()]);
        }

        return $this->render('cours/new.html.twig', [
            'cour' => $cour,
            'form' => $form->createView(),
            'id_Etb'=>$id_Etab,

        ]);
    }

    /**
     * @Route("/usr/{id_User}", name="Consulter_user", methods={"GET","POST"})
     *
     */
    public function Consulter(int $id_User): Response
    {
        $repository=$this->getDoctrine()->getRepository(Cours::class);
        $repository1=$this->getDoctrine()->getRepository(Rating::class);

        $rates=$repository1->findAll();
        $list=$repository->findAll();

        return $this->render('cours/show.html.twig', [
            'cours' => $list,
            'id_User'=>$id_User,
            'rates'=>$rates,

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
        $id_Etab=$cour->getId();
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cours_index',['id_Etab'=>$id_Etab->getId()]);
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
    public function delete(Request $request, Cours $cour, $id_Etab): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cour->getIdCours(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cour);
            $entityManager->flush();
            return $this->redirectToRoute('cours_index',['id_Etab'=>$id_Etab]);
        }

        return $this->redirectToRoute('cours_edit',['id_Etab'=>$id_Etab]);
    }

    /**
     * @Route("/recherche", name="recherche", methods={"GET","POST"})
     */
    function Recherche(coursRepository $repo , Request $request){
        $data=$request->get('recherche');
        $cour=new Cours();
        $cour=$repo->findBy(array('nom'=>$data));
        $id_User=$request->get('id_user');
        $repository1=$this->getDoctrine()->getRepository(Rating::class);
        $rates=$repository1->findAll();
        return $this->render('cours/show.html.twig', [
            'cours' => $cour,
            'id_User'=>$id_User,
            'rates'=>$rates
        ]);
    }

    /**
     * @Route("/rate", name="rate", methods={"GET","POST"})
     */
    public function rate( Request $request,RatingRepository $em){
        $iduser=$request->get('id_user');
        $idCours=$request->get('idCours');
        $rate=$request->get('rating');
        $idrate=$request->get('idrate');
        $rating=$em->findOneBy(array('idCours'=>$idCours,'idUser'=>$iduser));
        $Rating=new Rating();
        $entityManager = $this->getDoctrine()->getManagerForClass(Rating::class);
        if($rating){
            $rating->setRate($rate);
            $entityManager->flush();

        }else{
            $Rating->setRate($rate);
            $Rating->setIdCours($idCours);
            $Rating->setIdUser($iduser);
            $entityManager->persist($Rating);
            $entityManager->flush();
        }

        return $this->redirectToRoute('Consulter_user', [
            'id_User'=>$iduser]);
    }
    /**
     * @Route("/rechercheetab", name="rechercheetab", methods={"GET","POST"})
     */
    function Rechercheetab(coursRepository $repo , Request $request){
        $data=$request->get('recherche');
        $cour=new Cours();
        $cour=$repo->findBy(array('nom'=>$data));
        $id_Etab=$request->get('id_etab');
        $repository1=$this->getDoctrine()->getRepository(Rating::class);
        $rates=$repository1->findAll();
        return $this->render('cours/index2.html.twig', [
            'cours' => $cour,
            'id_Etab'=>$id_Etab,
            'rates'=>$rates,
        ]);
    }

}
