<?php

namespace App\Controller;


use App\Entity\Club;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;




/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $mavariable = $session->get('mavariable');
        if (isset($mavariable)) {
       //     echo 'ma session est deja ouverte '.$mavariable;
        } else {
            //echo 'nouvelle variable '.$mavariable;
//            $session->set('mavariable','name');

        }
        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        return $this->render('user/index.html.twig', [
            'users' => $users,

            ]);
    }

    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/login", name="user_login")
     */
    public function login(Request $request): Response
    {
        $session = $request->getSession();
        $session->clear();
        $user = new User();
        $form = $this->createFormBuilder($user)
            ->add('Email')
            ->add('password', PasswordType::class)
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $pwd = $user->getPassword();
            $email = $user->getEmail();
            dump($user);
            $repo = $this->getDoctrine()->getRepository(User::class);
            $user1 = $repo->findOneBy(['Email' => $email, 'password' => $pwd]);
            if (!$user1) {
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'Customer Added!'
                );
            } else {
                if (!$session->has('name')) {
                    $session->set('name', $user1->getNom());
                    $name = $session->get('name');
                    if ($user1->getRole() == "Admin") {
                        $user=$user1;

                        return $this->render('user/index.html.twig', [
                            'users' => $this->getDoctrine()->getRepository(User::class)->findAll(), 'name' => $name , 'user' => $user->getId()
                        ]);

                    } else if ($user1->getRole()=="Etudiant") {
                        $user=$user1;

                        return $this->redirectToRoute('welcome_Etud',['id'=>$user1->getId()]);


                    }else if ($user1->getRole() == "Eleve") {
                        $user=$user1;

                        return $this->redirectToRoute('eleve_new',['id'=> $user1->getId()]);
                    }else if ($user1->getRole() == "Etablissement") {
                        $user=$user1;

                        return $this->render('club/index.html.twig', [
                            'clubs' => $this->getDoctrine()->getRepository(Club::class)->findAll(), 'name' => $name, 'idUser' => $user->getId()
                        ]);
                    }
                }


            }
        }
        return $this->render('user/login.html.twig', [
            'user' => $user,
            'form' => $form->createView(),]);
    }

    /**
     * @Route("/edit/{id}", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('welcome_Etud', ['id' => $user->getId()]);

        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="user_delete", methods={"POST"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * @Route("/tri", name="tri", methods={"GET"})
     */
    public function listuser()
    {
        $p = $this->getDoctrine()->getRepository(User::class)->getCustomInformations();
        $user = $this->getDoctrine()->getRepository(User::class)->findAll();
        return $this->render("user/index.html.twig", array('users' => $user, 'stat' => $p));

    }

    /**
     * @Route("/listtri/{id}", name="list_tri")
     */
    public function listTrierUser(User $user)

    {
        $p = $this->getDoctrine()->getRepository(User::class)->getCustomInformations();
        $user = $this->getDoctrine()->getRepository(User::class)->listOrderByName();
        return $this->render("user/index.html.twig",
            array('users' => $user, 'stat' => $p));

    }
    /**
     * @Route("/Etudiant/{id}", name="welcome_Etud")
     */
    public function welcomeEtud(User $user)

    {
        return $this->render("user/etudiant-index.html.twig",
            ['user' => $user ]);

    }
}
