<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    #[Route('/register', name: 'register')]
    public function index(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this->createForm(UserType::class,$user);

        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isValid()){
            $user->setUsername($form->get("username")->getData());
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get("password")->getData()
                )
            );
            $user->setRoles(["ROLE_USER"]);
            $user->setEmail($form->get('email')->getData());
            
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('main');
            
        }
        
        

        

        return $this->render('register/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
