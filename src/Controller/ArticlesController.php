<?php

namespace App\Controller;

use App\Entity\Articles;

use App\Entity\Commentaires;
use App\Form\ArticlesType;
use Doctrine\ORM\Mapping\Id;
use PhpParser\Node\Stmt\Global_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/articles")
 */
class ArticlesController extends AbstractController
{
    /**
     * @Route("/", name="articles_index", methods={"GET"})
     */
    public function index(): Response
    {
        $articles = $this->getDoctrine()
            ->getRepository(Articles::class)
            ->findAll();

        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     *
     *
     * @Route ("/MonForum" , name="MonForum")
     */
    public function Affiche(){
        $repo=$this->getDoctrine()->getRepository(Articles::class);

        $Articles=$repo->findAll();
        foreach ($Articles as $value){
            $id=$value->getIdArt();
            $repos=$this->getDoctrine()->getRepository(Commentaires::class);

            $Comnt=$repos->find($id);
            echo $Comnt;
        }


        return $this->render('articles/MonForum/MonForumHome.html.twig',
            ['articles'=>$Articles,'Comnt'=>$Comnt]);

    }
}
