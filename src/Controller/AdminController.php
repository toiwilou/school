<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Entity\Level;
use App\Entity\StudentTemporary;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/add", name="add_admin")
     */
    public function addAdmin(
        UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $admin = new StudentTemporary();
        $user = new User();

        $admin->setFirstname('Hassane')
            ->setLastname('Toiwilou')
            ->setEmail('hassane.toiwilou@gmail.com')
            ->setPhone('0623514132')
            ->setAddress('Moroni Zilimadjou')
            ->setGender('Monsieur')
            ->setBirthday(new \DateTime('1998-08-12'))
            ->setPassword('test')
            ->setLevel(
                $this->getDoctrine()->getRepository(Level::class)->findOneBy(['id' => 1])
            )
        ;

        $user->setEmail($admin->getEmail());
        $user->setPassword(
            $passwordEncoder->encodePassword(
                $user,
                'test'
            )
        );
        $user->setRoles(['ROLE_USER']);

        /* $doctrine = $this->getDoctrine()->getManager();
        $doctrine->persist($admin);
        $doctrine->persist($user);
        $doctrine->flush(); */

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
