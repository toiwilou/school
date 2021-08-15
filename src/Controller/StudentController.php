<?php

namespace App\Controller;

use App\Entity\Student;
use App\Entity\StudentTemporary;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class StudentController extends AbstractController
{
    /**
     * @Route("/admin/students", name="admin_students")
     */
    public function index(): Response
    {
        $_returneds = [
            'faculties' => $this->getDoctrine()->getRepository(Faculty::class)->findAll(),
            'departments' => $this->getDoctrine()->getRepository(Department::class)->findAll(),
            'formations' => $this->getDoctrine()->getRepository(Formation::class)->findAll(),
            'levels' => $this->getDoctrine()->getRepository(Level::class)->findAll(),
            'students' => $this->getDoctrine()->getRepository(Student::class)->findAll(),
        ];

        return $this->render('admin/adminStudents.html.twig', $_returneds);
    }

    /**
     * @Route("/admin/student/add/{id}", name="add_student")
     */
    public function addStudent($id, 
        UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $student = new Student();
        $user = new User();
        $_student = $this->getDoctrine()->getRepository(StudentTemporary::class)->findOneBy(['id' => $id]);
        
        $student->setFirstname($_student->getFirstname())
            ->setLastname($_student->getLastname())
            ->setEmail($_student->getEmail())
            ->setPhone($_student->getPhone())
            ->setAddress($_student->getAddress())
            ->setPassword($_student->getPassword())
            ->setLevel($_student->getLevel())
            ->setBirthday($_student->getBirthday())
            ->setGender($_student->getGender())
            ->setRegistrationNumber(36651)
        ;
        
        $user->setEmail($student->getEmail());
        $user->setPassword(
            $passwordEncoder->encodePassword(
                $user,
                $student->getPassword()
            )
        );
        $user->setRoles(['ROLE_USER']);

        $student->setPassword('----------');
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($student);
        $em->persist($user);
        $em->remove($_student);
        $em->flush();

        return $this->render('admin/gestionsInscriptions.html.twig', [
            
        ]);
    }
}
