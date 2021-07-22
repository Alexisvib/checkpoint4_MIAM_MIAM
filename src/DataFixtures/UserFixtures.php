<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class UserFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('test@gmail.com');
        $user->setFirstName('NomTest');
        $user->setLastName('PrénomTest');
        $password = $this->encoder->encodePassword($user, 'test');
        $user->setPassword($password);
        $user->setPseudo('test');
        $user->setRoles(['ROLE_CONTRIBUTOR']);
        $manager->persist($user);
        $this->addReference('user_0', $user);

        $user = new User();
        $user->setEmail('admin@gmail.com');
        $user->setFirstName('admin');
        $user->setLastName('admin');
        $password = $this->encoder->encodePassword($user, 'admin');
        $user->setPassword($password);
        $user->setPseudo('admin');
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);
        $this->addReference('user_1', $user);

        $manager->flush();
    }
}
