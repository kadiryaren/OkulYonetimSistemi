<?php

namespace App\Controller;

use App\Entity\DersKatologu;
use App\Entity\OgrenciDetay;
use App\Entity\OgretmenDetay;
use App\Entity\User;
use App\Entity\YoneticiDetay;
use App\Form\DersKatologuFormType;
use App\Form\OgrenciFormType;
use App\Form\OgretmenFormType;
use App\Form\YoneticiFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserSecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
             return $this->redirectToRoute('seperate');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route('/ogrenci-kayit', name: 'ogrenci-kayit')]
    public function ogrenciKayit(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $ogrenci = new OgrenciDetay();
        $form = $this->createForm(OgrenciFormType::class,$user);

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
            $ogrenci->setUsername($form->get("username")->getData());
            $ogrenci->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get("password")->getData()
                )
            );
            $ogrenci->setEmail($form->get('email')->getData());
            
            $ogrenci->setOgrenciAdi($form->get('ogrenci_adi')->getData());
            $ogrenci->setTelefon($form->get('telefon')->getData());
            $ogrenci->setAdres($form->get("adres")->getData());
            $ogrenci->setKredi($form->get('kredi')->getData());
            
            $em->persist($user);
            
            $em->flush();
            $ogrenci->setOgrenciId((int) $user->getId());
            
            $em->persist($ogrenci);
            $em->flush();

            return $this->redirectToRoute('root');
            
        }
        
        

        

        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
            'title' => "Ogrenci Kayit Formu"
        ]);
    }
    /**
     * @Route("/ogretmen-kayit", name="ogretmen-kayit")
     */
    public function ogretmenKayit(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {

        $user = new User();
        $ogretmen = new OgretmenDetay();

        $form = $this->createForm(OgretmenFormType::class,$user);
        $em = $this->getDoctrine()->getManager();
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){
            $user->setUsername($form->get("username")->getData());
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get("password")->getData()
                )
            );
            $user->setRoles(["ROLE_OGRETMEN"]);
            $user->setEmail($form->get('email')->getData());
            $ogretmen->setUsername($form->get("username")->getData());
            $ogretmen->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get("password")->getData()
                )
            );
            $ogretmen->setEmail($form->get('email')->getData());
            $ogretmen->setOgretmenAdi($form->get('ogretmen_adi')->getData());
            $ogretmen->setVerilecekUcret($form->get('verilecek_ucret')->getData());
            $ogretmen->setTelefon($form->get('telefon')->getData());
            $ogretmen->setAdres($form->get('adres')->getData());

            $em->persist($user);
            $em->flush();
            $ogretmen->setOgretmenAdi($user->getId());
            $em->persist($ogretmen);
            $em->flush();


        }
    
        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
            'title' => "Ogretmen Kayit Formu"
        ]);
    }
    /**
     * @Route("/ders-kayit", name="ders-kayit")
     */
    public function dersKayit(Request $request): Response
    {

        $ders_katologu = new DersKatologu();


        $form = $this->createForm(DersKatologuFormType::class,$ders_katologu);
        $em = $this->getDoctrine()->getManager();
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){
            dump($ders_katologu);
            $em->persist($ders_katologu);
            $em->flush();
        }
    
        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
            'title' => "Ders Kayit Formu"
        ]);
    }
    /**
     * @Route("/yonetici-kayit", name="yonetici-kayit")
     */
    public function yoneticiKayit(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {

        $user = new User();
        $yonetici = new YoneticiDetay();

        $form = $this->createForm(YoneticiFormType::class,$user);
        $em = $this->getDoctrine()->getManager();
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){
            $user->setUsername($form->get("username")->getData());
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get("password")->getData()
                )
            );
            $user->setRoles(["ROLE_YONETICI"]);
            $user->setEmail($form->get('email')->getData());

            $yonetici->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get("password")->getData()
                )
            );
            $yonetici->setEmail($form->get('email')->getData());
            $yonetici->setUsername($form->get("username")->getData());
           $yonetici->setYoneticiAdi($form->get('yoneticiAdi')->getData());
           $yonetici->setVerilecekUcret($form->get('verilecekUcret')->getData());
           $yonetici->setTelefon($form->get('telefon')->getData());
           $yonetici->setAdres($form->get('adres')->getData());

            $em->persist($user);
            $em->flush();
            $yonetici->setYoneticiId($user->getId());
            $em->persist($yonetici);
            $em->flush();


        }
    
        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
            'title' => "Yonetici Kayit Formu"
        ]);
    }

    
    
    
}
