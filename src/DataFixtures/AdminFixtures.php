<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstname('Admin');
        $user->setLastname('Admin');
        $user->setEmail('admin@admin.com');

        $password = $this->encoder->encodePassword($user, 'admin123');
        $user->setPassword($password);

        $time = new DateTime('now');
        $birthday = $time->modify('-18 year');
        $user->setBirthday($birthday);

        $user->setRoles(['ROLE_ADMIN']);

        $manager->persist($user);
        $manager->flush();
    }
}
