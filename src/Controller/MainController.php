<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MainController extends AbstractController
{
    #[Route('/main', name: 'main')]
    public function index(): Response
    {
        
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    /**
     * @Route("/ogrenci/kaydet", name="ogrenci.kaydet")
     */
    public function ogrenci_kaydet(Request $request): Response
    {   
        $status = 0;
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this->createForm(UserType::class,$user);
        $form = $form->handleRequest($request);
        $data = $form->getData();
        if($form->isSubmitted() and $form->isValid()){

            $user->setRoles(["ROLE_USER"]);
            $em->persist($user);
            $em->flush();
            $status = 1;

        }

        return $this->render('main/ogrenci_kayit.html.twig', [
            'form' => $form->createView(),
            'status' => $status,
        ]);
    }
}
