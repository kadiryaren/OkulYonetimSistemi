<?php

namespace App\Twig;


use Twig\TwigFunction;
use App\Entity\DersKatologu;
use Twig\Extension\AbstractExtension;
use Symfony\Component\Security\Core\Security;

class AppExtension extends AbstractExtension
{
    /**
     * @var Security
     */
    private $security;

    public function __construct(Security $security)
    {
       $this->security = $security;
    }
    public function getFunctions()
    {
        return [
            new TwigFunction('derseAidiyetKontrol', [$this, 'derseAidiyetKontrol']),
            new TwigFunction('ogrenciderseAidiyetKontrol', [$this, 'ogrenciderseAidiyetKontrol']),
        ];
    }

    public function derseAidiyetKontrol($ogretmenListesi,$ogretmen)
    {
        if(in_array($ogretmen,$ogretmenListesi->getValues())){
            return true;
        }else{
            return false;
        }
    }
    public function ogrenciderseAidiyetKontrol($ogrenciListesi,$ogrenci)
    {
        if(in_array($ogrenci,$ogrenciListesi->getValues())){
            return true;
        }else{
            return false;
        }
    }
}