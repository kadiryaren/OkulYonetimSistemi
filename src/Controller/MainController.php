<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserInterface;

class MainController extends AbstractController
{

    /**
     * @Route("/", name="root")
     */
    public function root(): Response
    {
        return $this->render('main/root.html.twig', []);
    }

    

    /**
     * @Route("/seperate", name="seperate")
     */
    public function seperate(): Response
    {
        
        if($this->getUser()->getRoles()[0] == "ROLE_OGRENCI"){
            return $this->redirectToRoute('ogrenci-main');
        }
        else if($this->getUser()->getRoles()[0] == "ROLE_OGRETMEN"){
            return $this->redirectToRoute('ogretmen-main');
        }
        else if($this->getUser()->getRoles()[0] == "ROLE_YONETICI"){
            return $this->redirectToRoute('yonetici-main');
        }

        return $this->render('main/index.html.twig', [
            'controller_name' => 'abc'
        ]);
    }

    /**
     * @Route("/ogrenci", name="ogrenci-main")
     */
    public function ogrenci_main_page(): Response
    {
        return $this->render('main_pages/ogrenciMain.html.twig', []);
    }

    /**
     * @Route("/ogretmen", name="ogretmen-main")
     */
    public function ogretmen_main_page(): Response
    {
        return $this->render('main_pages/ogretmenMain.html.twig', []);
    }

    /**
     * @Route("/yonetici", name="yonetici-main")
     */
    public function yonetici_main_page(): Response
    {
        return $this->render('main_pages/yoneticiMain.html.twig', []);
    }

    /**
     * @Route("/yonetici-istatistikler", name="yonetici.istatistikler")
     */
    public function yoneticiIstatistikler(): Response
    {
        return $this->render('main/yoneticiIstatistik.html.twig',[
            
        ]);
    }


    
    
    
}
