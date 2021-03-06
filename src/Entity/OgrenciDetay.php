<?php

namespace App\Entity;

use App\Repository\OgrenciDetayRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OgrenciDetayRepository::class)
 */
class OgrenciDetay
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $ogrenci_adi;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $telefon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adres;

    /**
     * @ORM\Column(type="integer")
     */
    private $kredi;




    /**
     * @ORM\Column(type="integer")
     */
    private $ogrenci_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\ManyToMany(targetEntity=DersKatologu::class, mappedBy="ogrenci")
     */
    private $alinanDersListesi;

    public function __construct()
    {
        $this->ders_listesi = new ArrayCollection();
        $this->alinanDersListesi = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOgrenciAdi(): ?string
    {
        return $this->ogrenci_adi;
    }

    public function setOgrenciAdi(string $ogrenci_adi): self
    {
        $this->ogrenci_adi = $ogrenci_adi;

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

    public function getKredi(): ?int
    {
        return $this->kredi;
    }

    public function setKredi(int $kredi): self
    {
        $this->kredi = $kredi;

        return $this;
    }


    public function getOgrenciId(): ?int
    {
        return $this->ogrenci_id;
    }

    public function setOgrenciId(int $ogrenci_id): self
    {
        $this->ogrenci_id = $ogrenci_id;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return Collection|DersKatologu[]
     */
    public function getAlinanDersListesi(): Collection
    {
        return $this->alinanDersListesi;
    }

    public function addAlinanDersListesi(DersKatologu $alinanDersListesi): self
    {
        if (!$this->alinanDersListesi->contains($alinanDersListesi)) {
            $this->alinanDersListesi[] = $alinanDersListesi;
            $alinanDersListesi->addOgrenci($this);
        }

        return $this;
    }

    public function removeAlinanDersListesi(DersKatologu $alinanDersListesi): self
    {
        if ($this->alinanDersListesi->removeElement($alinanDersListesi)) {
            $alinanDersListesi->removeOgrenci($this);
        }

        return $this;
    }
}
