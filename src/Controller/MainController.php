<?php

namespace App\Controller;

use App\Entity\DersKatologu;
use App\Entity\OgrenciDetay;
use App\Entity\OgretmenDetay;
use App\Entity\User;
use App\Entity\YoneticiDetay;
use App\Form\DersEkleType;
use App\Form\UserType;
use App\Repository\OgrenciDetayRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Faker\Factory;

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
        dump($this->getDoctrine()->getRepository(OgrenciDetay::class)->findAll());
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

    /**
     * @Route("/ogrencileri-gor", name="ogrencileri.gor")
     */
    public function ogrencileriGor(): Response
    {   
        $tum_ogrenciler = $this->getDoctrine()->getRepository(OgrenciDetay::class)->findAll();
        
        $faker = Factory::create();

        dump($faker->firstName);
        
        return $this->render('main/ogrencileriGor.html.twig', [
            'ogrenciler' => $tum_ogrenciler,
        ]);
    }

    /**
     * @Route("/ogretmenleri-gor", name="ogretmenleri.gor")
     */
    public function ogretmenleriGor(): Response
    {
        $tum_ogretmenler = $this->getDoctrine()->getRepository(OgretmenDetay::class)->findAll();
        return $this->render('main/ogretmenleriGor.html.twig', [
            'ogretmenler' => $tum_ogretmenler
        ]);
    }

    /**
     * @Route("/yoneticileri-gor", name="yoneticileri.gor")
     */
    public function yoneticileriGor(): Response
    {
        $tum_yoneticiler = $this->getDoctrine()->getRepository(YoneticiDetay::class)->findAll();
        return $this->render('main/yoneticileriGor.html.twig', [
            'yoneticiler' => $tum_yoneticiler
        ]);
    }

    /**
     * @Route("/ders-ekle", name="ders.ekle")
     */
    public function dersEkle(Request $request): Response
    {   
        $em = $this->getDoctrine()->getManager();
        $ders = new DersKatologu();
        $form = $this->createForm(DersEkleType::class,$ders);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isValid()){
            $ders->setDersAdi($form->get('dersAdi')->getData());
            $ders->setDersFiyati($form->get('dersFiyati')->getData());
            $ders->setOgretmenUcreti($form->get('ogretmenUcreti')->getData());
            $ders->setHangiSiniftaAlinabilir($form->get('hangiSiniftaAlinabilir')->getData());
            $ders->setDersKredisi($form->get('dersKredisi')->getData());
            $ders->setDersGunu($form->get('dersGunu')->getData());
            $em->persist($ders);
            $em->flush();

        }


        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
            'title' => "Ders Ekleme Formu"
        ]);
    }
    /**
     * @Route("/dersleri-gor", name="dersleri.gor")
     */
    public function dersleriGor(): Response
    {
        $dersler = $this->getDoctrine()->getRepository(DersKatologu::class)->findAll();
        return $this->render('main/dersleriGor.html.twig', [
            'dersler' => $dersler
        ]);
    }


    
    
    
}
