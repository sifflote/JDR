<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker;

class AppFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ){}

    public function load(ObjectManager $manager): void
    {

        $admin = new Users();
        $admin->setEmail('admin@sifflote.fr');
        $admin->setUsername('Admin');
        $admin->setIsVerified(1);
        $admin->setMdpUse(1);
        $admin->setPassword(
            $this->passwordHasher->hashPassword($admin, 'password')
        );
        $admin->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $manager->persist($admin);

        $faker = Faker\Factory::create('fr_FR');

        for($usr = 1; $usr <= 10; $usr++){
            $user = new Users();
            $user->setEmail($faker->email);
            $user->setUsername($faker->userName);
            $user->setRoles(['ROLE_USER']);
            $user->setMdpUse(true);
            $user->setPlainpassword('secret');

            $manager->persist($user);
        }

        $manager->flush();
    }
}
