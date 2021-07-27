<?php

namespace App\Entity;

use App\Repository\DersKatologuRepository;
<<<<<<< HEAD
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
=======
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
>>>>>>> main

/**
 * @ORM\Entity(repositoryClass=DersKatologuRepository::class)
 */
<<<<<<< HEAD
class DersKatologu implements UserInterface, PasswordAuthenticatedUserInterface
=======
class DersKatologu
>>>>>>> main
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
<<<<<<< HEAD
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ders_adi;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $ders_ogrenci_fiyati;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $ders_ogretmen_ucreti;

    /**
     * @ORM\Column(type="integer")
     */
    private $ders_kredisi;

    /**
     * @ORM\Column(type="dateinterval", nullable=true)
     */
    private $ders_saatleri;
=======
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
>>>>>>> main

    public function getId(): ?int
    {
        return $this->id;
    }

<<<<<<< HEAD
    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
=======
    public function getDersAdi(): ?string
    {
        return $this->dersAdi;
    }

    public function setDersAdi(string $dersAdi): self
    {
        $this->dersAdi = $dersAdi;
>>>>>>> main

        return $this;
    }

<<<<<<< HEAD
    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
=======
    public function getDersFiyati(): ?int
    {
        return $this->dersFiyati;
    }

    public function setDersFiyati(int $dersFiyati): self
    {
        $this->dersFiyati = $dersFiyati;
>>>>>>> main

        return $this;
    }

<<<<<<< HEAD
    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
=======
    public function getOgretmenUcreti(): ?int
    {
        return $this->ogretmenUcreti;
    }

    public function setOgretmenUcreti(int $ogretmenUcreti): self
    {
        $this->ogretmenUcreti = $ogretmenUcreti;
>>>>>>> main

        return $this;
    }

<<<<<<< HEAD
    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getDersAdi(): ?string
    {
        return $this->ders_adi;
    }

    public function setDersAdi(string $ders_adi): self
    {
        $this->ders_adi = $ders_adi;
=======
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
>>>>>>> main

        return $this;
    }

<<<<<<< HEAD
    public function getDersOgrenciFiyati(): ?float
    {
        return $this->ders_ogrenci_fiyati;
    }

    public function setDersOgrenciFiyati(?float $ders_ogrenci_fiyati): self
    {
        $this->ders_ogrenci_fiyati = $ders_ogrenci_fiyati;
=======
    public function getDersGunu(): ?\DateTimeInterface
    {
        return $this->dersGunu;
    }

    public function setDersGunu(\DateTimeInterface $dersGunu): self
    {
        $this->dersGunu = $dersGunu;
>>>>>>> main

        return $this;
    }

<<<<<<< HEAD
    public function getDersOgretmenUcreti(): ?float
    {
        return $this->ders_ogretmen_ucreti;
    }

    public function setDersOgretmenUcreti(?float $ders_ogretmen_ucreti): self
    {
        $this->ders_ogretmen_ucreti = $ders_ogretmen_ucreti;
=======
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
>>>>>>> main

        return $this;
    }

<<<<<<< HEAD
    public function getDersKredisi(): ?int
    {
        return $this->ders_kredisi;
    }

    public function setDersKredisi(int $ders_kredisi): self
    {
        $this->ders_kredisi = $ders_kredisi;

        return $this;
    }

    public function getDersSaatleri(): ?\DateInterval
    {
        return $this->ders_saatleri;
    }

    public function setDersSaatleri(?\DateInterval $ders_saatleri): self
    {
        $this->ders_saatleri = $ders_saatleri;
=======
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
>>>>>>> main

        return $this;
    }
}
