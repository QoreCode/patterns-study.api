<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\UserRole;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin')
            ->setEmail('d.dev@ukr.net')
            ->setRoles([User::ROLE_USER, User::ROLE_ADMIN])
            ->setPassword($this->passwordEncoder->encodePassword($user, 'admin'));

        $manager->persist($user);
        $manager->flush();
    }
}
