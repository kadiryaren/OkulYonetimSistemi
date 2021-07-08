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
     * @ORM\Column(type="string", length=50)
     */
    private $dersAdi;

    /**
     * @ORM\Column(type="integer")
     */
    private $dersFiyati;

    /**
     * @ORM\Column(type="integer")
     */
    private $ogretmenUcreti;

    /**
     * @ORM\Column(type="integer")
     */
    private $hangiSiniftaAlinabilir;

    /**
     * @ORM\Column(type="integer")
     */
    private $dersKredisi;

    /**
     * @ORM\Column(type="date")
     */
    private $dersGunu;

    /**
     * @ORM\ManyToMany(targetEntity=OgretmenDetay::class, inversedBy="dersKatologus")
     */
    private $ogretmen;

    /**
     * @ORM\ManyToMany(targetEntity=OgrenciDetay::class, inversedBy="alinanDersListesi")
     */
    private $ogrenci;

    public function __construct()
    {
        $this->ogretmen = new ArrayCollection();
        $this->ogrenci = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDersAdi(): ?string
    {
        return $this->dersAdi;
    }

    public function setDersAdi(string $dersAdi): self
    {
        $this->dersAdi = $dersAdi;

        return $this;
    }

    public function getDersFiyati(): ?int
    {
        return $this->dersFiyati;
    }

    public function setDersFiyati(int $dersFiyati): self
    {
        $this->dersFiyati = $dersFiyati;

        return $this;
    }

    public function getOgretmenUcreti(): ?int
    {
        return $this->ogretmenUcreti;
    }

    public function setOgretmenUcreti(int $ogretmenUcreti): self
    {
        $this->ogretmenUcreti = $ogretmenUcreti;

        return $this;
    }

    public function getHangiSiniftaAlinabilir(): ?int
    {
        return $this->hangiSiniftaAlinabilir;
    }

    public function setHangiSiniftaAlinabilir(int $hangiSiniftaAlinabilir): self
    {
        $this->hangiSiniftaAlinabilir = $hangiSiniftaAlinabilir;

        return $this;
    }

    public function getDersKredisi(): ?int
    {
        return $this->dersKredisi;
    }

    public function setDersKredisi(int $dersKredisi): self
    {
        $this->dersKredisi = $dersKredisi;

        return $this;
    }

    public function getDersGunu(): ?\DateTimeInterface
    {
        return $this->dersGunu;
    }

    public function setDersGunu(\DateTimeInterface $dersGunu): self
    {
        $this->dersGunu = $dersGunu;

        return $this;
    }

    /**
     * @return Collection|ogretmenDetay[]
     */
    public function getOgretmen(): Collection
    {
        return $this->ogretmen;
    }

    public function addOgretman(ogretmenDetay $ogretmen): self
    {
        if (!$this->ogretmen->contains($ogretmen)) {
            $this->ogretmen[] = $ogretmen;
        }

        return $this;
    }

    public function removeOgretman(ogretmenDetay $ogretman): self
    {
        $this->ogretmen->removeElement($ogretman);

        return $this;
    }

    /**
     * @return Collection|OgrenciDetay[]
     */
    public function getOgrenci(): Collection
    {
        return $this->ogrenci;
    }

    public function addOgrenci(OgrenciDetay $ogrenci): self
    {
        if (!$this->ogrenci->contains($ogrenci)) {
            $this->ogrenci[] = $ogrenci;
        }

        return $this;
    }

    public function removeOgrenci(OgrenciDetay $ogrenci): self
    {
        $this->ogrenci->removeElement($ogrenci);

        return $this;
    }
}
