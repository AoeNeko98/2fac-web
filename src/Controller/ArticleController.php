<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Commentaires;
use App\Entity\Etablissement;
use App\Entity\Scoreapprox;
use App\Entity\User;
use App\Form\ArticleType;
use App\Form\CommentaireType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article/index/{id}", name="article")
     */
    public function index($id): Response
    {
        $repo =$this->getDoctrine()->getRepository(Article::class);

        $article = $repo->findAll();
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $article,
            'id'=>$id
        ]);
    }
    /**
     * @Route("/article/show/{id}/{idetab}", name="article_show")
     */
    public function show(Article $article , Request $request,$idetab): Response
    {
        $repo =$this->getDoctrine()->getRepository(User::class);
        $iduser=1;

        $user=$repo->find($iduser);
        if (!$user){
            $user=new User();
        }
        $comnt = new Commentaires();
        $comnt->setCreatedAt(new \DateTime());
        $comnt->setArticle($article);
        $comnt->setAuthor($user);



        $form = $this->createForm(CommentaireType::class,$comnt);
        $repos =$this->getDoctrine()->getRepository(Article::class);
        $article = $repos->find($article->getId());
        $form->handleRequest($request);
        if ( $form ->isSubmitted() && $form->isValid() ) {


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager -> persist($comnt);
            $entityManager->flush();

        }


        return $this->render('article/show.html.twig', [
            'controller_name' => 'ArticleController',
            'article' => $article,
            'form'=> $form->createView(),
            'id'=>$idetab
        ]);
    }

    /**
     * @Route("/article/create/{id}", name="article_createss")
     */
    public function create(Etablissement $etablissement , Request $request): Response
    {
        $article = new Article();
        $article->setEtablissement($etablissement);
        $form = $this->createForm(ArticleType::class,$article);
        $form->handleRequest($request);

        if($form ->isSubmitted() && $form->isValid()){
            $image = $form->get('image')->getData();
            $fichier = md5(uniqid()) . '.' . $image->guessExtension();
            $image->move(
                $this->getParameter('image_directory'),
                $fichier
            );

            $article->setImage($fichier);
            $article->setCreatedAt(new \DateTime());


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager -> persist($article);
            $entityManager->flush();
            return  $this->redirectToRoute('article_profile',['id'=>$etablissement->getId()]);
        }




        return $this->render('article/create.html.twig', [
            'controller_name' => 'ArticleController',
            'article'=>$article,
            'form'=> $form->createView(),
            'id'=>$etablissement->getId()

        ]);
    }
    /**
     * @Route("/article/profile/{id}", name="article_profile")
     */
    public function profile(Etablissement $etablissement): Response
    {
        $repo =$this->getDoctrine()->getRepository(Article::class);

        $article = $repo->findBy(['Etablissement'=>$etablissement]);
        return $this->render('article/profile.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $article,
            'id'=>$etablissement->getId()
        ]);
    }

    /**
     * @Route("/article/Edit/{id}/{idetab}", name="article_edit")
     */
    public function Edit(Article $article, Request $request,$idetab): Response
    {
        $article->setImage("");
        $form = $this->createForm(ArticleType::class,$article);

        $form->handleRequest($request);

        if($form ->isSubmitted() && $form->isValid()){
            $image = $form->get('image')->getData();
            $fichier = md5(uniqid()) . '.' . $image->guessExtension();
            $image->move(
                $this->getParameter('image_directory'),
                $fichier
            );

            $article->setImage($fichier);
            $article->setCreatedAt(new \DateTime());


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager -> persist($article);
            $entityManager->flush();
            return  $this->redirectToRoute('article_show',['id'=>$article->getId(),'idetab'=>$idetab]);
        }
        dump($form);



        return $this->render('article/create.html.twig', [
            'controller_name' => 'ArticleController',
            'article'=>$article,
            'form'=> $form->createView(),
            'id'=>$idetab

        ]);
    }

    /**
     * @Route("/article/delete/{id}/{idetab}", name="article_delete", methods={"POST"})
     */
    public function delete(Request $request, Article $article,$idetab): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();
        }

        return $this->redirectToRoute('article_profile',['id'=>$idetab]);
    }

}
