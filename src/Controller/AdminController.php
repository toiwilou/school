<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Entity\Level;
use App\Entity\StudentTemporary;
use App\Entity\User;
use App\Form\AddAdminFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/add", name="add_admin")
     */
    public function addAdmin(Request $request, 
        UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $admin = new Admin();
        $user = new User();

        $form = $this->createForm(AddAdminFormType::class, $admin);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $user->setEmail($admin->getEmail());
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $admin->getPassword()
                )
            );
            $user->setRoles(['ROLE_ADMIN']);

            $admin->setPassword('---------');

            /* $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($admin);
            $doctrine->persist($user);
            $doctrine->flush(); */
        }

        /*$admin->setFirstname('Hassane')
            ->setLastname('Toiwilou')
            ->setEmail('toiwilouhassane@gmail.com')
            ->setPhone('0623514132')
            ->setAddress('Moroni Zilimadjou')
            ->setPassword('test')
            ->setRole('ROLE_SUPER_ADMIN')
            ->setGender('Monsieur')
            ->setBirthday(new \DateTime('1998-08-12'))            
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

        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->persist($admin);
        $doctrine->persist($user);
        $doctrine->flush(); */

        return $this->render('admin/addAdmin.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
