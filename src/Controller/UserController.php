<?php

namespace App\Controller;


use App\Entity\User;

use App\Form\UserType;
use App\Repository\clubRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Exception\core\Type\SubmitType;
use function Sodium\add;

/**
 * @Route("/user")
 */
class UserController extends Controller
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
     * @Route("/showAll/{idUser}", name="user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/login", name="user_login", methods={"GET","POST"})
     */
    public function login(Request $request, clubRepository $clubRepository, userRepository $UserRepository): Response
    {
        
        $session = $request->getSession();
     
        $session->clear();
        $user = new User();
        $form = $this->createFormBuilder($user)
            ->add('email')
            ->add('password', PasswordType::class)
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $pwd = $user->getPassword();
            $email = $user->getEmail();
            $repo = $this->getDoctrine()->getRepository(User::class);
            $user1 = $repo->findOneBy(array('email' => $email, 'password' => $pwd));
            if (!$user1) {
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'Customer Added!'
                );
            } else {
                if (!$session->has('name')) {

                    $session->set('name', $user1->getNom());
                    $session->set('loggedUser', $user1);
                    $session->set('idUser', $user1->getIdUser());
                    $name = $session->get('name');
                    if ($user1->getRole() == "Admin") {
                        $user->setIdUser($user1->getIdUser());
                        return $this->redirectToRoute('user_index', ['user' => $user->getIdUser()]);
                        return $this->render('user/index.html.twig', [
                            'users' => $UserRepository->findAll(), 'name' => $name
                        ]);

                    } else if ($user1->getRole()=="Etudiant") {
                        $user->setIdUser($user1->getIdUser());
                        return $this->redirectToRoute('club_newindex',['idUser'=>$user->getIdUser()]);
                        return $this->render('/club/newindex.html.twig', [
                            'clubs' => $clubRepository->findAll(), 'name' => $name,
                            'form' => $form->createView(),
                        ]);

                    }else if ($user1->getRole() == "Eleve") {
                        $user->setIdUser($user1->getIdUser());
                        return $this->redirectToRoute('club_newindex', ['idUser' => $user->getIdUser()]);
                        return $this->render('club/newindex.html.twig', [
                            'clubs' => $clubRepository->findAll(), 'name' => $name
                        ]);
                    }else if ($user1->getRole() == "Etablissement") {
                        $user->setIdUser($user1->getIdUser());
                        return $this->redirectToRoute('club_index', ['idUser' => $user->getIdUser()]);
                        return $this->render('club/index.html.twig', [
                            'clubs' => $clubRepository->findAll(), 'name' => $name
                        ]);
                    }
                }
                $user->setIdUser($user1->getIdUser());
                return $this->redirectToRoute('user_index', ['user' => $user->getIdUser()]);

            }
        }
        return $this->render('user/login.html.twig', [
            'user' => $user,
            'form' => $form->createView(),]);
    }

    /**
     * @Route("/{idUser}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('user_index', ['user' => $user->getIdUser()]);
            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idUser}", name="user_delete", methods={"POST"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getIdUser(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * @Route("/{idUser}", name="tri", methods={"GET"})
     */
    public function listuser(UserRepository $userRepository)
    {
        $p = $userRepository->getCustomInformations();
        $user = $this->getDoctrine()->getRepository(User::class)->findAll();
        return $this->render("user/index.html.twig", array('users' => $user, 'stat' => $p));

    }

    /**
     * @Route("/user/tri", name="tri")
     */
    public function listTrierUser(UserRepository $userRepository)

    {
        $p = $userRepository->getCustomInformations();
        $user = $this->getDoctrine()->getRepository(User::class)->listOrderByName();
        return $this->render("user/index.html.twig",
            array('users' => $user, 'stat' => $p));

    }

    
}
