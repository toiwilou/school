<?php

namespace App\Controller;

use App\Entity\Department;
use App\Entity\Faculty;
use App\Entity\Formation;
use App\Entity\Level;
use App\Entity\Student;
use App\Entity\StudentTemporary;
use App\Entity\User;
use App\Form\FileFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            
        ]);
    }

    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request, RequestStack $requestStack, 
        UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $_hidden = $request->request->get('_hidden');
        $session = $requestStack->getSession();
        $form = $this->createForm(FileFormType::class);
        $form->handleRequest($request);
        $_returneds = [
            'faculties' => $this->getDoctrine()->getRepository(Faculty::class)->findAll(),
            'departments' => $this->getDoctrine()->getRepository(Department::class)->findAll(),
            'formations' => $this->getDoctrine()->getRepository(Formation::class)->findAll(),
            'levels' => $this->getDoctrine()->getRepository(Level::class)->findAll(),
            'form' => $form->createView(),
            'firstname' => null,
            'isEmailSuccess' => false,
            'isStudentYet' => 'is-student-yet',
            '_checked' => null,
        ];

        // Formulaire de vérification de l'email
        if($request->getMethod() == 'POST' && $_hidden == 'email_hidden')
        {
            $_email = $request->request->get('_email');
            $_student = $this->getDoctrine()->getRepository(StudentTemporary::class)->findOneBy(['email' => $_email]);

            if($_student)
            {
                $session->set('_student', $_student);
                $_returneds['firstname'] = $_student->getFirstname();
                $_returneds['isEmailSuccess'] = true;
                $_returneds['_checked'] = 'checked disabled';
                $_returneds['isStudentYet'] = null;
                return $this->render('home/register.html.twig', $_returneds);
            }
        }

        // Formulaire d'inscription à un niveau de formation
        if($form->isSubmitted() && $form->isValid())
        {
            $id_level = $form->get('id_level')->getData();
            $_level = $this->getDoctrine()->getRepository(Level::class)->findOneBy(['id' => $id_level]);
            $__student = $session->get('_student');
            $diplome = $form->get('diplomes')->getData();

            if($diplome)
            {
                $newFileName = 'diplome_' . $__student->getFirstname() . '_' . $__student->getLastname() . '_' . $__student->getId() . '.' . $diplome->guessExtension();
            
                $diplome->move(
                    $this->getParameter('last_diplomes'),
                    $newFileName
                );
            }

            // Envoyer un mail à l'administration
        }

        return $this->render('home/register.html.twig', $_returneds);
    }
}
