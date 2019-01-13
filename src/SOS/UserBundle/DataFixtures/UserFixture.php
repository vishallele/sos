<?php

namespace SOS\UserBundle\DataFixtures;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use SOS\UserBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Description of UserFixture
 *
 * @author admin
 */
class UserFixture extends Fixture {
    
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->setEmail('sos'.$i.'@gmail.com');
            $password = $this->encoder->encodePassword($user, 'sosuser'.$i);
            $user->setPassword($password);
            $user->setFirstname('sos_fname_'.$i);
            $user->setLastname('sos_lname_'.$i);
            $user->setIsActive(1);
            $user->setIsDeleted(0);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
