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
     * @ORM\Column(type="string", length=50)
     */
    private $ogretmenAdi;

    /**
     * @ORM\Column(type="integer")
     */
    private $verilecekUcret;


    /**
     * @ORM\Column(type="string", length=20)
     */
    private $telefon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adres;

    /**
     * @ORM\ManyToMany(targetEntity=DersKatologu::class, mappedBy="ogretmen")
     */
    private $dersKatologus;

    /**
     * @ORM\Column(type="integer")
     */
    private $ogretmenId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    public function __construct()
    {
        $this->dersKatologus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOgretmenAdi(): ?string
    {
        return $this->ogretmenAdi;
    }

    public function setOgretmenAdi(string $ogretmenAdi): self
    {
        $this->ogretmenAdi = $ogretmenAdi;

        return $this;
    }

    public function getVerilecekUcret(): ?int
    {
        return $this->verilecekUcret;
    }

    public function setVerilecekUcret(int $verilecekUcret): self
    {
        $this->verilecekUcret = $verilecekUcret;

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
     * @return Collection|DersKatologu[]
     */
    public function getDersKatologus(): Collection
    {
        return $this->dersKatologus;
    }

    public function addDersKatologu(DersKatologu $dersKatologu): self
    {
        if (!$this->dersKatologus->contains($dersKatologu)) {
            $this->dersKatologus[] = $dersKatologu;
            $dersKatologu->addOgretman($this);
        }

        return $this;
    }

    public function removeDersKatologu(DersKatologu $dersKatologu): self
    {
        if ($this->dersKatologus->removeElement($dersKatologu)) {
            $dersKatologu->removeOgretman($this);
        }

        return $this;
    }

    public function getOgretmenId(): ?int
    {
        return $this->ogretmenId;
    }

    public function setOgretmenId(int $ogretmenId): self
    {
        $this->ogretmenId = $ogretmenId;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
