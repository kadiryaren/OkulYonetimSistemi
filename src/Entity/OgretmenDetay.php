<?php

namespace App\Entity;

use App\Repository\OgretmenDetayRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OgretmenDetayRepository::class)
 */
class OgretmenDetay
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ogretmen_adi;

    /**
     * @ORM\Column(type="integer")
     */
    private $verilecek_ucret;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $telefon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adres;

    /**
     * @ORM\ManyToMany(targetEntity=dersKatologu::class, inversedBy="dersHocasi")
     */
    private $ders_listesi;

    public function __construct()
    {
        $this->ders_listesi = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOgretmenAdi(): ?string
    {
        return $this->ogretmen_adi;
    }

    public function setOgretmenAdi(string $ogretmen_adi): self
    {
        $this->ogretmen_adi = $ogretmen_adi;

        return $this;
    }

    public function getVerilecekUcret(): ?int
    {
        return $this->verilecek_ucret;
    }

    public function setVerilecekUcret(int $verilecek_ucret): self
    {
        $this->verilecek_ucret = $verilecek_ucret;

        return $this;
    }

    public function getTelefon(): ?string
    {
        return $this->telefon;
    }

    public function setTelefon(string $telefon): self
    {
        $this->telefon = $telefon;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    /**
     * @return Collection|dersKatologu[]
     */
    public function getDersListesi(): Collection
    {
        return $this->ders_listesi;
    }

    public function addDersListesi(dersKatologu $dersListesi): self
    {
        if (!$this->ders_listesi->contains($dersListesi)) {
            $this->ders_listesi[] = $dersListesi;
        }

        return $this;
    }

    public function removeDersListesi(dersKatologu $dersListesi): self
    {
        $this->ders_listesi->removeElement($dersListesi);

        return $this;
    }
}
