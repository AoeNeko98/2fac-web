<?php

namespace App\Controller;

use App\Entity\Book1;
use App\Entity\Categorie;
use App\Entity\User;
use App\Form\Book1Type;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
/**
 * @Route("/book1")
 */
class Book1Controller extends AbstractController
{
    /**
     * @Route("/", name="book1_index", methods={"GET","POST"})
     */
    public function index(Request $request): Response
    {

        $em = $this->getDoctrine()->getManager();
        if($request->isXmlHttpRequest()) {
            $serializer = new Serializer(array(new ObjectNormalizer()));
            $nom=$request->get('search');
            $sort=$request->get('sortBy');
            $prix3=$request->get('range');
            $cate=$request->get('cate');
            $ncata=$request->get('ncata');
            $ty=$request->get('ty');
            $nty=$request->get('nty');

            if ($request->get('sortBy') == "def") {
                $sort = 'id';
                if($ncata == 0){
                    if ($nty==0){
                        $ty=["Vendre","Demande","Echange"];
                        $cate = $em->getRepository(Categorie::class)->allId();
                        $book1s = $em->getRepository(Book1::class)->filterBook($nom, $cate, $ty, $prix3, $sort);
                        $data = $serializer->normalize($book1s);
                        return new JsonResponse($data);

                    }else {
                        $cate = $em->getRepository(Categorie::class)->allId();
                        $book1s = $em->getRepository(Book1::class)->filterBook($nom, $cate, $ty, $prix3, $sort);
                        $data = $serializer->normalize($book1s);
                        return new JsonResponse($data);
                    }
                }else {
                    if($nty==0){
                        $ty=["Vendre","Demande","Echange"];
                        $book1s = $em->getRepository(Book1::class)->filterBook($nom, $cate, $ty, $prix3, $sort);
                        $data = $serializer->normalize($book1s);
                        return new JsonResponse($data);

                    }else {
                        $book1s = $em->getRepository(Book1::class)->filterBook($nom, $cate, $ty, $prix3, $sort);
                        $data = $serializer->normalize($book1s);
                        return new JsonResponse($data);
                    }
                }

            } elseif ($request->get('sortBy') != "def") {
                if($ncata==0){
                    if(nty==0){
                        $ty=["Vendre","Demande","Echange"];
                        $cate=$em->getRepository(Categorie::class)->allId();
                        $book1s = $em->getRepository(Book1::class)->filterBook($nom,$cate,$ty,$prix3,$sort);
                        $data = $serializer->normalize($book1s);
                        return new JsonResponse($data);

                    }else {
                        $cate = $em->getRepository(Categorie::class)->allId();
                        $book1s = $em->getRepository(Book1::class)->filterBook($nom, $cate, $ty, $prix3, $sort);
                        $data = $serializer->normalize($book1s);
                        return new JsonResponse($data);
                    }
                }else {
                    if(nty==0){
                        $ty=["Vendre","Demande","Echange"];
                        $book1s = $em->getRepository(Book1::class)->filterBook($nom, $cate, $ty, $prix3, $sort);
                        $data = $serializer->normalize($book1s);
                        return new JsonResponse($data);

                    }else {
                        $book1s = $em->getRepository(Book1::class)->filterBook($nom, $cate, $ty, $prix3, $sort);
                        $data = $serializer->normalize($book1s);
                        return new JsonResponse($data);
                    }
                }
            }
        }

        else{
            $book1s=$em->getRepository(Book1::class)->findAll();
            $cat =$this->getDoctrine()->getRepository(Categorie::class)->findAll();
            $prix=$this->getDoctrine()->getRepository(Book1::class)->findPrice();
            $prix2=$prix[0]['MAX(prix)'];

            return $this->render('book1/index.html.twig',[
                'book1s'=>$book1s,
                'cat'=>$cat,
                'maxprix'=>$prix2,

            ]);
        }}



    /**
     * @Route("/mybib", name="book1_mybib", methods={"GET"})
     */
    public function index2(): Response
    {
        $book1s = $this->getDoctrine()
            ->getRepository(Book1::class)
            ->findAll();
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find(18);

        return $this->render('book1/mybib.html.twig', [
            'book1s' => $book1s,
            'user'=>$user,


        ]);
    }

    /**
     * @Route("/new", name="book1_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {


        $book1 = new Book1();
        $form = $this->createForm(Book1Type::class, $book1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getDoctrine()
                ->getRepository(User::class)
                ->find(18);
            $book1->setUser($user);
            $entityManager = $this->getDoctrine()->getManager();
            $file=$form->get('image')->getData();
            $fileName=md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('book_images'),$fileName
            );

            $book1->setImage($fileName);
            $entityManager->persist($book1);
            $entityManager->flush();

            return $this->redirectToRoute('book1_mybib');
        }

        return $this->render('book1/new.html.twig', [
            'book1' => $book1,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="book1_show", methods={"GET"})
     */
    public function show(Book1 $book1): Response
    {
        return $this->render('book1/show.html.twig', [
            'book1' => $book1,
        ]);
    }


    /**
     * @Route("/{id}/edit", name="book1_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Book1 $book1): Response
    {

        $form = $this->createForm(Book1Type::class, $book1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file=$form->get('image')->getData();
            $fileName=md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('book_images'),$fileName
            );

            $book1->setImage($fileName);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('book1_mybib');
        }

        return $this->render('book1/edit.html.twig', [
            'book1' => $book1,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="book1_delete", methods={"POST"})
     */
    public function delete(Request $request, Book1 $book1): Response
    {
        if ($this->isCsrfTokenValid('delete'.$book1->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($book1);
            $entityManager->flush();
        }

        return $this->redirectToRoute('book1_mybib');
    }
}
