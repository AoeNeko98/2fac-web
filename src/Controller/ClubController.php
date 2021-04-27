<?php

namespace App\Controller;

use App\Entity\Abonnement;
use App\Entity\Club;
use App\Entity\User;
use App\Form\ClubType;
use App\Repository\AbonnementRepository;
use App\Repository\clubRepository;
//use Doctrine\DBAL\Types\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;

use function Sodium\add;

/**
 * @Route("/club")
 */
class ClubController extends Controller
{
    /**
     * @Route("/{id}", name="club_index", methods={"GET","POST"})
     */
    public function index(clubRepository $clubRepository,Request $request , $id): Response
    {
        $club = new Club();
        $form=$this->createFormBuilder($club)
            ->add('domaine',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $term=$club->getDomaine();
            $allclubs=$clubRepository->search($term);
        }else{
            $allclubs=$clubRepository->findAll();
        }

        $clubs=$this->get('knp_paginator')->paginate(
            $allclubs,
            $request->query->getInt('page',1),
            5
        );
        return $this->render('club/index.html.twig', [
            'clubs' => $clubs,
            'form' => $form->createView(),
            'id' => $id
        ]);
    }

    /**
     * @Route("/listc/{id}", name="club_list", methods={"GET"})
     * @param clubRepository $clubRepository
     * @param $clubs
     * @return Response
     */
    public function listc(clubRepository $clubRepository, $id ): Response
    {

        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        $clubs=$clubRepository->findAll();
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('club/listp.html.twig', [
            'clubs' => $clubs,
            'id'=>$id
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A3', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Store PDF Binary Data
        $output = $dompdf->output();

        // In this case, we want to write the file in the public directory
        $publicDirectory = $this->get('kernel')->getProjectDir() . '/public';
        // e.g /var/www/project/public/mypdf.pdf
        $pdfFilepath =  $publicDirectory .'/uploads/'.md5(uniqid()) . '.' .'pdf';


        // Write file to the desired path
        file_put_contents($pdfFilepath, $output);

        // Send some text response
      //  return new Response("The PDF file has been succesfully generated !");
        return $this->redirectToRoute('club_index',['id'=>$id]);

    }

    /**
     * @Route("/new/{id}", name="club_new", methods={"GET","POST"})
     */
    public function new(Request $request, $id): Response
    {
        /*$session = $request->getSession();
        if(!$session->has('name'))
        {
            $this->get('session')->getFlashBag()->add('info','error');
            return $this->render('homepage');

        }*/
        $club = new Club();
        $form = $this->createForm(ClubType::class, $club);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($club);
            $entityManager->flush();

            return $this->redirectToRoute('club_index', ['id'=>$id]);
        }

        return $this->render('club/new.html.twig', [
            'club' => $club,
            'form' => $form->createView(),
            'id'=>$id
        ]);
    }

    /**
     * @Route("/show/{id}/{idetab}", name="club_show", methods={"GET"})
     * @Route("/showetud/{id}/{iduser}", name="club_show_user", methods={"GET"})
     */
    public function show(Club $club , $idetab=null,$iduser=null): Response
    {
        return $this->render('club/show.html.twig', [
            'club' => $club,
            'id'=> $idetab,
            'iduser'=>$iduser
        ]);
    }
    /**
     * @Route("/join_club/{idUser}/{id}", name="join_club", methods={"GET"})
     */
    public function join_club($idUser,Request $request,$id): Response
    {
        $session = $request->getSession();
        $abo=new Abonnement();
        $foundClub=$this->getDoctrine()->getRepository(Club::class)->findOneBy(['id'=>$id]);
        $foundUser=$this->getDoctrine()->getRepository(User::class)->findOneBy(['id'=>$idUser]);
        $newPlaces=(int)$foundClub->getPlaces()-1;
        $foundClub->setPlaces((string)$newPlaces);
        $abo->setUser($foundUser);
        $abo->setClub($foundClub);
        $abo->setDate(new \DateTime());
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($abo);
        $entityManager->flush();
        $this->getCustomInformations($id,$idUser);
        return $this->redirectToRoute('club_newindex',['idUser'=>$idUser]);



    }

    public function getCustomInformations($idclub,$iduser)
    {
        $rawSql = "UPDATE abonnement
SET ID_Club = $idclub, ID_User = $iduser";

        $stmt = $this->getDoctrine()->getConnection()->prepare($rawSql);
        $stmt->execute([]);

        return false;
    }

    /**
     * @Route("/edit/{id}/edit/{idetab}", name="club_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Club $club,$idetab): Response
    {
        $form = $this->createForm(ClubType::class, $club);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('club_index',['id'=>$idetab]);
        }

        return $this->render('club/edit.html.twig', [
            'club' => $club,
            'form' => $form->createView(),
            'id'=>$idetab

        ]);
    }

    /**
     * @Route("/delete/{id}", name="club_delete", methods={"POST"})
     */
    public function delete(Request $request, Club $club): Response
    {
        if ($this->isCsrfTokenValid('delete'.$club->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($club);
            $entityManager->flush();
        }

        return $this->redirectToRoute('club_index');
    }



    /**
     * @Route("/newindex/{idUser}", name="club_newindex", methods={"GET","POST"})
     */
    public function newindex(clubRepository $clubRepository,Request $request,$idUser): Response
    {

        $club = new Club();
        $form=$this->createFormBuilder($club)
            ->add('domaine',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $term=$club->getDomaine();
            $allclubs=$clubRepository->search($term);
        }else{
            $allclubs=$clubRepository->findAll();
        }


        $session = $request->getSession();
        foreach($allclubs as $club){
            $length=$this->getDoctrine()->getRepository(Abonnement::class)->findOneBySomeField($idUser,$club->getId());
            if ( $length  ) {
                $jsonArray[] = array(
                    'club' => $club,
                    'joined' => true
                );
            }else{
                $jsonArray[] = array(
                    'club' => $club,
                    'joined' => false
                );
            }

        }

        $allclubs=$this->get('knp_paginator')->paginate(
            $jsonArray,
            $request->query->getInt('page',1),
            5
        );
        $session = $request->getSession();
        return $this->render('club/newindex.html.twig', [
            'clubs' => $allclubs,
            'form' => $form->createView(),
            'idUser'=>$idUser

        ]);
    }



}
