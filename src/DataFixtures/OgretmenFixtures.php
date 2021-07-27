<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\OgretmenDetay;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class OgretmenFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 20; $i++){
            sleep(0.5);
            $faker2 = Factory::create();
            $user = new User();
            $ogretmen = new OgretmenDetay();
            $user->setUsername($faker2->firstName.$i);
            $user->setPassword('$2y$13$M/6KU9dyjGNUqVvMlu2S0eDYesXpEd6UqJwIDAiM24I.9oYT7PFrO');
            $user->setEmail($faker2->email);
            $user->setRoles(["ROLE_OGRETMEN"]);

            $ogretmen->setOgretmenAdi($faker2->firstName);
            $ogretmen->setVerilecekUcret(mt_rand(50,199));
            $ogretmen->setTelefon($faker2->phoneNumber);
            $ogretmen->setAdres($faker2->address);
         
            $manager->persist($user);
            $manager->flush();

            $ogretmen->setUsername($user->getUserIdentifier());
            $ogretmen->setEmail($user->getEmail());
            $ogretmen->setPassword('$2y$13$M/6KU9dyjGNUqVvMlu2S0eDYesXpEd6UqJwIDAiM24I.9oYT7PFrO');
            $ogretmen->setOgretmenId($user->getId());

            $manager->persist($ogretmen);
            $manager->flush();
            
        }
    }
}
