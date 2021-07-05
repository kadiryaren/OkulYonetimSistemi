<?php

namespace App\Entity;

use App\Repository\DersKatologuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DersKatologuRepository::class)
 */
class DersKatologu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $ders_adi;

    /**
     * @ORM\Column(type="integer")
     */
    private $ders_fiyati;

    /**
     * @ORM\Column(type="integer")
     */
    private $ogretmen_ucreti;

    /**
     * @ORM\Column(type="integer")
     */
    private $hangi_yil_alinabilir;

    /**
     * @ORM\Column(type="integer")
     */
    private $ders_kredisi;

    /**
     * @ORM\Column(type="date")
     */
    private $ders_gunu;

    /**
     * @ORM\ManyToMany(targetEntity=OgrenciDetay::class, inversedBy="ders_listesi")
     */
    private $ogrenci_listesi;

    /**
     * @ORM\ManyToMany(targetEntity=OgretmenDetay::class, mappedBy="ders_listesi")
     */
    private $dersHocasi;

    public function __construct()
    {
        $this->ogrenci_listesi = new ArrayCollection();
        $this->dersHocasi = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDersAdi(): ?string
    {
        return $this->ders_adi;
    }

    public function setDersAdi(string $ders_adi): self
    {
        $this->ders_adi = $ders_adi;

        return $this;
    }

    public function getDersFiyati(): ?int
    {
        return $this->ders_fiyati;
    }

    public function setDersFiyati(int $ders_fiyati): self
    {
        $this->ders_fiyati = $ders_fiyati;

        return $this;
    }

    public function getOgretmenUcreti(): ?int
    {
        return $this->ogretmen_ucreti;
    }

    public function setOgretmenUcreti(int $ogretmen_ucreti): self
    {
        $this->ogretmen_ucreti = $ogretmen_ucreti;

        return $this;
    }

    public function getHangiYilAlinabilir(): ?int
    {
        return $this->hangi_yil_alinabilir;
    }

    public function setHangiYilAlinabilir(int $hangi_yil_alinabilir): self
    {
        $this->hangi_yil_alinabilir = $hangi_yil_alinabilir;

        return $this;
    }

    public function getDersKredisi(): ?int
    {
        return $this->ders_kredisi;
    }

    public function setDersKredisi(int $ders_kredisi): self
    {
        $this->ders_kredisi = $ders_kredisi;

        return $this;
    }

    public function getDersGunu(): ?\DateTimeInterface
    {
        return $this->ders_gunu;
    }

    public function setDersGunu(\DateTimeInterface $ders_gunu): self
    {
        $this->ders_gunu = $ders_gunu;

        return $this;
    }

    /**
     * @return Collection|OgrenciDetay[]
     */
    public function getOgrenciListesi(): Collection
    {
        return $this->ogrenci_listesi;
    }

    public function addOgrenciListesi(OgrenciDetay $ogrenciListesi): self
    {
        if (!$this->ogrenci_listesi->contains($ogrenciListesi)) {
            $this->ogrenci_listesi[] = $ogrenciListesi;
        }

        return $this;
    }

    public function removeOgrenciListesi(OgrenciDetay $ogrenciListesi): self
    {
        $this->ogrenci_listesi->removeElement($ogrenciListesi);

        return $this;
    }

    /**
     * @return Collection|OgretmenDetay[]
     */
    public function getDersHocasi(): Collection
    {
        return $this->dersHocasi;
    }

    public function addDersHocasi(OgretmenDetay $dersHocasi): self
    {
        if (!$this->dersHocasi->contains($dersHocasi)) {
            $this->dersHocasi[] = $dersHocasi;
            $dersHocasi->addDersListesi($this);
        }

        return $this;
    }

    public function removeDersHocasi(OgretmenDetay $dersHocasi): self
    {
        if ($this->dersHocasi->removeElement($dersHocasi)) {
            $dersHocasi->removeDersListesi($this);
        }

        return $this;
    }
}
