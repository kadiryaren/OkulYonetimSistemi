<?php

namespace App\Entity;

use App\Repository\YoneticiDetayRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=YoneticiDetayRepository::class)
 */
class YoneticiDetay
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
    private $yonetici_adi;

    /**
     * @ORM\Column(type="integer")
     */
    private $verilecek_ucret;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telefon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adres;

    /**
     * @ORM\Column(type="integer")
     */
    private $yoneticiId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYoneticiAdi(): ?string
    {
        return $this->yonetici_adi;
    }

    public function setYoneticiAdi(string $yonetici_adi): self
    {
        $this->yonetici_adi = $yonetici_adi;

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

    public function getYoneticiId(): ?int
    {
        return $this->yoneticiId;
    }

    public function setYoneticiId(int $yoneticiId): self
    {
        $this->yoneticiId = $yoneticiId;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
