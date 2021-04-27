<?php

namespace App\Controller;

use App\Entity\Book1;
use App\Entity\Categorie;
use App\Entity\User;
use App\Form\Book1Type;

use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @Route("/book1")
 */
class Book1Controller extends AbstractController
{
    /**
     * @Route("/index/{id}", name="book1_index", methods={"GET","POST"})
     */
    public function index(Request $request,$id): Response
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
                        $normalizer = new ObjectNormalizer();
                        $normalizer->setCircularReferenceLimit(1);
                        $normalizer->setCircularReferenceHandler(function($object){
                            return $object->getId();
                        });
                        $serializer = new Serializer([$normalizer], [new JsonEncoder()]);
                        $jsonContent = $serializer->serialize($book1s, 'json',[
                            'enable_max_depth' => true
                        ]);
                        return new JsonResponse($jsonContent);

                    }else {
                        $cate = $em->getRepository(Categorie::class)->allId();
                        $book1s = $em->getRepository(Book1::class)->filterBook($nom, $cate, $ty, $prix3, $sort);
                        $normalizer = new ObjectNormalizer();
                        $normalizer->setCircularReferenceLimit(1);
                        $normalizer->setCircularReferenceHandler(function($object){
                            return $object->getId();
                        });
                        $serializer = new Serializer([$normalizer], [new JsonEncoder()]);
                        $jsonContent = $serializer->serialize($book1s, 'json',[
                            'enable_max_depth' => true
                        ]);
                        return new JsonResponse($jsonContent);
                    }
                }else {
                    if($nty==0){
                        $ty=["Vendre","Demande","Echange"];
                        $book1s = $em->getRepository(Book1::class)->filterBook($nom, $cate, $ty, $prix3, $sort);
                        $normalizer = new ObjectNormalizer();
                        $normalizer->setCircularReferenceLimit(1);
                        $normalizer->setCircularReferenceHandler(function($object){
                            return $object->getId();
                        });
                        $serializer = new Serializer([$normalizer], [new JsonEncoder()]);
                        $jsonContent = $serializer->serialize($book1s, 'json',[
                            'enable_max_depth' => true
                        ]);
                        return new JsonResponse($jsonContent);

                    }else {
                        $book1s = $em->getRepository(Book1::class)->filterBook($nom, $cate, $ty, $prix3, $sort);
                        $normalizer = new ObjectNormalizer();
                        $normalizer->setCircularReferenceLimit(1);
                        $normalizer->setCircularReferenceHandler(function($object){
                            return $object->getId();
                        });
                        $serializer = new Serializer([$normalizer], [new JsonEncoder()]);
                        $jsonContent = $serializer->serialize($book1s, 'json',[
                            'enable_max_depth' => true
                        ]);
                        return new JsonResponse($jsonContent);
                    }
                }

            } elseif ($request->get('sortBy') != "def") {
                if($ncata==0){
                    if($nty==0){
                        $ty=["Vendre","Demande","Echange"];
                        $cate=$em->getRepository(Categorie::class)->allId();
                        $book1s = $em->getRepository(Book1::class)->filterBook($nom,$cate,$ty,$prix3,$sort);
                        $normalizer = new ObjectNormalizer();
                        $normalizer->setCircularReferenceLimit(1);
                        $normalizer->setCircularReferenceHandler(function($object){
                            return $object->getId();
                        });
                        $serializer = new Serializer([$normalizer], [new JsonEncoder()]);
                        $jsonContent = $serializer->serialize($book1s, 'json',[
                            'enable_max_depth' => true
                        ]);
                        return new JsonResponse($jsonContent);

                    }else {
                        $cate = $em->getRepository(Categorie::class)->allId();
                        $book1s = $em->getRepository(Book1::class)->filterBook($nom, $cate, $ty, $prix3, $sort);
                        $normalizer = new ObjectNormalizer();
                        $normalizer->setCircularReferenceLimit(1);
                        $normalizer->setCircularReferenceHandler(function($object){
                            return $object->getId();
                        });
                        $serializer = new Serializer([$normalizer], [new JsonEncoder()]);
                        $jsonContent = $serializer->serialize($book1s, 'json',[
                            'enable_max_depth' => true
                        ]);
                        return new JsonResponse($jsonContent);
                    }
                }else {
                    if($nty==0){
                        $ty=["Vendre","Demande","Echange"];
                        $book1s = $em->getRepository(Book1::class)->filterBook($nom, $cate, $ty, $prix3, $sort);
                        $normalizer = new ObjectNormalizer();
                        $normalizer->setCircularReferenceLimit(1);
                        $normalizer->setCircularReferenceHandler(function($object){
                            return $object->getId();
                        });
                        $serializer = new Serializer([$normalizer], [new JsonEncoder()]);
                        $jsonContent = $serializer->serialize($book1s, 'json',[
                            'enable_max_depth' => true
                        ]);
                        return new JsonResponse($jsonContent);

                    }else {
                        $book1s = $em->getRepository(Book1::class)->filterBook($nom, $cate, $ty, $prix3, $sort);
                        $normalizer = new ObjectNormalizer();
                        $normalizer->setCircularReferenceLimit(1);
                        $normalizer->setCircularReferenceHandler(function($object){
                            return $object->getId();
                        });
                        $serializer = new Serializer([$normalizer], [new JsonEncoder()]);
                        $jsonContent = $serializer->serialize($book1s, 'json',[
                            'enable_max_depth' => true
                        ]);
                        return new JsonResponse($jsonContent);
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
                'id'=>$id

            ]);
        }}



    /**
     * @Route("/mybib/{id}", name="book1_mybib", methods={"GET"})
     */
    public function index2($id): Response
    {
        $book1s = $this->getDoctrine()
            ->getRepository(Book1::class)
            ->findAll();
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find(['id'=>$id]);

        return $this->render('book1/mybib.html.twig', [
            'book1s' => $book1s,
            'user'=>$user,
            'id'=>$id


        ]);
    }

    /**
     * @Route("/new/{id}", name="book1_new", methods={"GET","POST"})
     */
    public function new(Request $request, $id): Response
    {


        $book1 = new Book1();
        $form = $this->createForm(Book1Type::class, $book1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getDoctrine()
                ->getRepository(User::class)
                ->find(['id'=>$id]);
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

            return $this->redirectToRoute('book1_mybib' , ['id'=>$id]);
        }

        return $this->render('book1/new.html.twig', [
            'book1' => $book1,
            'form' => $form->createView(),
            'id'=>$id
        ]);
    }
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @Route("/show/{id}", name="book1_show", methods={"GET"})
     */
    public function show(Book1 $book1): Response
    {
        $url='https://openlibrary.org/search?isbn='.$book1->getIsbn();
        $response = $this->client->request('GET',
            $url
        )->getContent();
        $html=$response;
        $crawler=new Crawler($html);
        $element=$crawler->filter('div.editionAbout');
        $readersStats = $element ->filter('ul.readers-stats > li.avg-ratings')->filterXPath('//span[4]');

        return $this->render('book1/show.html.twig', [
            'book1' => $book1,
            'res'=>$readersStats->text(),

        ]);
    }


    /**
     * @Route("/edit/{id}/edit", name="book1_edit", methods={"GET","POST"})
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

        return $this->redirectToRoute('book1_mybib',['id'=>$book1->getUser()->getId()]);
    }
}
