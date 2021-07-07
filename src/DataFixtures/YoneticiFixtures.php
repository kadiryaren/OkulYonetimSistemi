<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\YoneticiDetay;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class YoneticiFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 5; $i++){
            $faker3 = Factory::create();
            $user = new User();
            $yonetici = new YoneticiDetay();
            $user->setUsername($faker3->firstName);
            $user->setPassword('$2y$13$M/6KU9dyjGNUqVvMlu2S0eDYesXpEd6UqJwIDAiM24I.9oYT7PFrO');
            $user->setEmail($faker3->email);
            $user->setRoles(["ROLE_YONETICI"]);


            $yonetici->setYoneticiAdi($faker3->firstName);
            $yonetici->setVerilecekUcret(mt_rand(50,500));
            $yonetici->setTelefon($faker3->phoneNumber);
            $yonetici->setAdres($faker3->address);
            

            $manager->persist($user);
            $manager->flush();

            $yonetici->setYoneticiId($user->getId());

            $yonetici->setUsername($user->getUserIdentifier());
            $yonetici->setPassword('$2y$13$M/6KU9dyjGNUqVvMlu2S0eDYesXpEd6UqJwIDAiM24I.9oYT7PFrO');
            $yonetici->setEmail($user->getEmail());

            $manager->persist($yonetici);
            $manager->flush();

        }

    }
}
