<?php

namespace App\DataFixtures;

use App\Entity\OgrenciDetay;
use App\Entity\OgretmenDetay;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
        for($i = 0; $i < 100; $i++){
            $faker = Factory::create();
            $user = new User();
            $ogrenci = new OgrenciDetay();
            $user->setUsername($faker->firstName.$i);
            $user->setPassword('$2y$13$M/6KU9dyjGNUqVvMlu2S0eDYesXpEd6UqJwIDAiM24I.9oYT7PFrO');
            $user->setEmail($faker->email);
            $user->setRoles(["ROLE_OGRENCI"]);
            $ogrenci->setOgrenciAdi($faker->firstName);
            $ogrenci->setTelefon($faker->phoneNumber);
            $ogrenci->setAdres($faker->address);
            $ogrenci->setKredi(20);

            $manager->persist($user);
            $manager->flush();

            

            $ogrenci->setUsername($user->getUserIdentifier());
            $ogrenci->setPassword('$2y$13$M/6KU9dyjGNUqVvMlu2S0eDYesXpEd6UqJwIDAiM24I.9oYT7PFrO');
            $ogrenci->setEmail($user->getEmail());
            $ogrenci->setOgrenciId($user->getId());


            $manager->persist($ogrenci);
            $manager->flush();

        }
        

    }
}
