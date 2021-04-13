<?php

namespace App\Controller;

use App\Entity\Book1;
use App\Entity\Categorie;
use App\Entity\User;
use App\Form\Book1Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use phpDocumentor\Reflection\File;
/**
 * @Route("/book1")
 */
class Book1Controller extends AbstractController
{
    /**
     * @Route("/", name="book1_index", methods={"GET"})
     */
    public function index(): Response
    {
        $book1s = $this->getDoctrine()
            ->getRepository(Book1::class)
            ->findAll();


        return $this->render('book1/index.html.twig', [
            'book1s' => $book1s,

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

            return $this->redirectToRoute('book1_index');
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
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('book1_index');
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

        return $this->redirectToRoute('book1_index');
    }
}
