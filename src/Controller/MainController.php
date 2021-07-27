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
     * @Route("/load", name="load")
     */
    public function loading(): Response
    {

        $em = $this->getDoctrine()->getManager();

        $ogretmen = $this->getDoctrine()->getRepository(OgretmenDetay::class)->find(64);
        $ders = $this->getDoctrine()->getRepository(DersKatologu::class)->find(3);
        
        $ders->addOgretman($ogretmen);
        $em->persist($ders);
        $em->flush();
        
        return $this->render('main/root.html.twig', []);
    }




    /**
     * @Route("/", name="root")
     */
    public function root(): Response
    {
        return $this->render('main/root.html.twig', []);
        
    }



    /**
     * @Route("/sistem-hakkinda", name="sistem.hakkinda")
     */
    public function sistemHakkinda(): Response
    {
        return $this->render('main/sistem.html.twig', []);
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

        return $this->redirectToRoute("root");
    }





    /**
     * @Route("/ogrenci", name="ogrenci-main")
     */
    public function ogrenci_main_page(): Response
    {
        return $this->render('main/ogrenci.html.twig', []);
    }




    /**
     * @Route("/ogretmen", name="ogretmen-main")
     */
    public function ogretmen_main_page(): Response
    {
       
        return $this->render('main/ogretmen.html.twig', []);
    }


    /**
     * @Route("/yonetici", name="yonetici-main")
     */
    public function yonetici_main_page(): Response
    {
        
        return $this->render('main/yonetici.html.twig', []);
    }



    /**
     * @Route("/yonetici/ogrencileri-gor", name="yonetici.ogrencileri.gor")
     * @Route("/ogretmen/ogrencileri-gor", name="ogretmen.ogrencileri.gor")
     */
    public function ogrencileriGor(): Response
    {   
        $tum_ogrenciler = $this->getDoctrine()->getRepository(OgrenciDetay::class)->findAll();
        
        return $this->render('main/ogrencileriGor.html.twig', [
            'ogrenciler' => $tum_ogrenciler,
            "user" => $this->getUser()
        ]);
    }





    /**
     * @Route("/yonetici/ogretmenleri-gor", name="ogretmenleri.gor")
     */
    public function ogretmenleriGor(): Response
    {
        $tum_ogretmenler = $this->getDoctrine()->getRepository(OgretmenDetay::class)->findAll();
        return $this->render('main/ogretmenleriGor.html.twig', [
            'ogretmenler' => $tum_ogretmenler,
            "user" => $this->getUser()
        ]);
    }





    /**
     * @Route("/yonetici/yoneticileri-gor", name="yoneticileri.gor")
     */
    public function yoneticileriGor(): Response
    {
        $tum_yoneticiler = $this->getDoctrine()->getRepository(YoneticiDetay::class)->findAll();
        return $this->render('main/yoneticileriGor.html.twig', [
            'yoneticiler' => $tum_yoneticiler
        ]);
    }






    /**
     * @Route("/yonetici/ders-ekle", name="ders.ekle")
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
            $this->addFlash(
                'kayit.basarili', 'Kayit basarili' 
            );

        }


        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
            'title' => "Ders Ekleme Formu"
        ]);
    }






    /**
     * @Route("/yonetici/ders-sil/{dersid}", name="yonetici.ders-sil")
     */
    public function dersSil($dersid): Response
    {
        $em = $this->getDoctrine()->getManager();
        $ders = $this->getDoctrine()->getRepository(DersKatologu::class)->find($dersid);
        $em->remove($ders);
        $em->flush();
        $this->addFlash(
            "ders-sil","Ders Silindi"
        );
        return $this->redirectToRoute("yonetici.dersleri.gor");
    }





    
    /**
     * @Route("/yonetici/dersleri-gor", name="yonetici.dersleri.gor")
     * @Route("/ogretmen/dersleri-gor", name="ogretmen.dersleri.gor")
     * @Route("/ogrenci/dersleri-gor", name="ogrenci.dersleri.gor")
     */
    public function dersleriGor(): Response
    {
        @$dersler = $this->getDoctrine()->getRepository(DersKatologu::class)->findAll();
        @$ogretmen = $this->getDoctrine()->getRepository(OgretmenDetay::class)->findOneBy(["ogretmenId" => $this->getUser()->getId()]);
        
        $ogrenci = $this->getDoctrine()->getRepository(OgrenciDetay::class)->findOneBy(["ogrenci_id" => $this->getUser()->getId()]);
        
        return $this->render('main/dersleriGor.html.twig', [
            'dersler' => $dersler,
            'ogretmen' => @$ogretmen,
            'ogrenci' => @$ogrenci,
            "user" => $this->getUser()
        ]);
    }



    /**
     * @Route("/ogretmen/dersten-ayril/{id}", name="ogretmen.derstenAyril")
     */
    public function ogretmenDerstenAyril($id): Response
    {
        // ogretmen derse ait mi once onu kontrol et! Ait ise cikar degilse hicbir sey yapma.

        $em = $this->getDoctrine()->getManager();
        $ogretmen = $this->getDoctrine()->getRepository(OgretmenDetay::class)->findOneBy(["ogretmenId" => $this->getUser()->getId()]);
        $ders = $this->getDoctrine()->getRepository(DersKatologu::class)->find($id);
        if(in_array($ders,$ogretmen->getDersKatologus()->getValues())){
            $ogretmen->removeDersKatologu($ders);
            $em->persist($ogretmen);
            $em->flush();

            if(!count($ders->getOgretmen()->getValues()) > 0 ){
                if(count($ders->getOgrenci()->getValues()) > 0 ){
                    for($i = 0 ; $i < count($ders->getOgrenci()->getValues()) ; $i++){
                        $ders->removeOgrenci($ders->getOgrenci()->getValues()[$i]);
                    }
                    $em->persist($ders);
                    $em->flush();
                    
                }
            }

            return $this->redirectToRoute("ogretmen.dersleri.gor");

        }else{
            return $this->redirectToRoute("ogretmen.dersleri.gor");
        }
    }





    /**
     * @Route("ogrenci/dersten-ayril/{dersid}", name="ogrenci.dersten-ayril")
     */
    public function ogrenciDerstenAyril($dersid): Response
    {
        $em = $this->getDoctrine()->getManager();
        $ogrencimiz = $this->getDoctrine()->getRepository(OgrenciDetay::class)->findOneBy(["ogrenci_id" => $this->getUser()->getId()]);
        $ogrencimiz->setKredi($ogrencimiz->getKredi() +  $this->getDoctrine()->getRepository(DersKatologu::class)->find($dersid)->getDersKredisi());
        $ogrencimiz->removeAlinanDersListesi($this->getDoctrine()->getRepository(DersKatologu::class)->find($dersid));
        $em->persist($ogrencimiz);
        $em->flush();

        return $this->redirectToRoute("ogrenci.dersleri.gor");
    }




    /**
     * @Route("ogrenci/derse-katil/{dersid}", name="ogrenci.derse-katil")
     */
    public function ogrenciDerseKatil($dersid): Response
    {
        $em = $this->getDoctrine()->getManager();
        $ogrencimiz = $this->getDoctrine()->getRepository(OgrenciDetay::class)->findOneBy(["ogrenci_id" => $this->getUser()->getId()]);
        if($ogrencimiz->getKredi() > $this->getDoctrine()->getRepository(DersKatologu::class)->find($dersid)->getDersKredisi())
        {
            $ogrencimiz->addAlinanDersListesi($this->getDoctrine()->getRepository(DersKatologu::class)->find($dersid));
            $ogrencimiz->setKredi($ogrencimiz->getKredi() - $this->getDoctrine()->getRepository(DersKatologu::class)->find($dersid)->getDersKredisi() );

            $em->persist($ogrencimiz);
            $em->flush();
        }
        return $this->redirectToRoute("ogrenci.dersleri.gor");
    }



    /**
     * @Route("/ogretmen/derste-katil/{id}", name="ogretmen.derseKatil")
     */
    public function ogretmenDerseKatil($id): Response
    {
        // ogretmen derse ait mi once onu kontrol et! Ait ise cikar degilse hicbir sey yapma.

        $em = $this->getDoctrine()->getManager();
        $ogretmen = $this->getDoctrine()->getRepository(OgretmenDetay::class)->findOneBy(["ogretmenId" => $this->getUser()->getId()]);
        $ders = $this->getDoctrine()->getRepository(DersKatologu::class)->find($id);
        if(in_array($ders,$ogretmen->getDersKatologus()->getValues())){
            return $this->redirectToRoute("ogretmen.dersleri.gor");

        }else{
            $ogretmen->addDersKatologu($ders);
            $em->persist($ogretmen);
            $em->flush();
            return $this->redirectToRoute("ogretmen.dersleri.gor");
        }
        
    }




    /**
     * @Route("/yonetici/account", name="yonetici.account")
     */
    public function yoneticiAccountGoster(): Response
    {
        $yonetici_id = $this->getUser()->getId();
        $yonetciDetay = $this->getDoctrine()->getRepository(YoneticiDetay::class)->findOneBy(["yoneticiId" => $yonetici_id]);
        return $this->render('main/yoneticiAccount.html.twig', [
            'yonetici' => $yonetciDetay,
            "user" => $this->getUser()
        ]);
    }




    /**
     * @Route("/ogretmen/account", name="ogretmen.account")
     */
    public function ogretmenAccountGoster(): Response
    {
        $ogretmen_id = $this->getUser()->getId();
        $ogretmenDetay = $this->getDoctrine()->getRepository(OgretmenDetay::class)->findOneBy(["ogretmenId" => $ogretmen_id]);
        return $this->render('main/ogretmenAccount.html.twig', [
            'ogretmen' => $ogretmenDetay,
            "user" => $this->getUser()
        ]);
    }



    /**
     * @Route("/ogrenci/account", name="ogrenci.account")
     */
    public function ogrenciAccountGoster(): Response
    {
        $ogrenciId = $this->getUser()->getId();
        $ogrenciDetay = $this->getDoctrine()->getRepository(OgrenciDetay::class)->findOneBy(["ogrenci_id" => $ogrenciId]);
        return $this->render('main/ogrenciAccount.html.twig', [
            'ogrenci' => $ogrenciDetay,
            "user" => $this->getUser()
        ]);
    }




    /**
     * @Route("/ogrenci/derse-kayitli-ogrenciler/{dersid}", name="ogrenci.derse-kayitli-ogrenciler")
     * @Route("/ogretmen/derse-kayitli-ogrenciler/{dersid}", name="ogretmen.derse-kayitli-ogrenciler")
     * @Route("/yonetici/derse-kayitli-ogrenciler/{dersid}", name="yonetici.derse-kayitli-ogrenciler")
     */
    public function derseKayitliOgrencileriGoster($dersid): Response
    {
        $ogrenciListesi= $this->getDoctrine()->getRepository(DersKatologu::class)->find($dersid)->getOgrenci()->getValues();
        
        return $this->render('main/ogrencileriGor.html.twig', [
            'ogrenciler' => $ogrenciListesi
            
        ]);
    }

}
