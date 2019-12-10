<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    /**
     * UserFixtures constructor.
     * @param $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $User1 =new User();
        $User1 ->setPseudo("Alex");
        $password = $this->encoder->encodePassword($User1, 'nofx');
        $User1->setPassword($password);
        $User1->setEmail("alex@free.fr");   
        $User1->setRoles(["ROLE_ADMIN"]);
        $manager->persist($User1);
        $this->setReference("user-alex", $User1);

        $User2 =new User();
        $User2 ->setPseudo("Brian");
        $password = $this->encoder->encodePassword($User2, 'nofx');
        $User2->setPassword($password);
        $User2->setEmail("brian@free.fr");
        $User2->setRoles(["ROLE_ADMIN"]);
        $manager->persist($User2);
        $this->setReference("user-brian", $User2);

        $manager->flush();
    }
}
