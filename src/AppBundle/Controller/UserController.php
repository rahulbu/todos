<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Manager\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserController extends Controller
{
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @Route("/user/new",methods={"GET","POST"})
     */
    public function newAction(Request $request, UserPasswordEncoderInterface $passwordEncoder){
        $user = new User();

        $form = $this->createFormBuilder($user)
            ->add('userId', TextType::class,array('attr'=>array('class'=>'form-control','maxLength'=>'5')))
            ->add('name', TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('designation', TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('password', PasswordType::class,array('attr'=>array('class'=>'form-control')))
            ->add('save', SubmitType::class,array('label'=>'Register','attr'=>array('class'=>'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $password = $passwordEncoder->encodePassword($user,$user->getPassword());
            $user->setPassword($password);
            $this->userManager->addUser($user);
            return $this->redirectToRoute('home');
        }
        return $this->render("User/create.html.twig",array('form'=>$form->createView()));
    }

    /**
     * @Route("/user/{id}",name="profile",methods={"GET"})
     */
    public function profileAction($id){

        if($id!=$this->getUser()->getUsername()) {
            $this->addFlash("notice", "unauthorised access");
            return $this->redirectToRoute('home');
        }

        $user = $this->userManager->getUser($id);
        return $this->render("User/show.html.twig",array('user'=>$user));
    }

    /**
     * @Route("/user/{id}/edit",methods={"GET","PUT"})
     */
    public function editAction(Request $request,$id){

        if($id!=$this->getUser()->getUsername()) {
            $this->addFlash("notice", "unauthorised access");
            return $this->redirectToRoute('home');
        }

        $user = $this->userManager->getUser($id);
        $form = $this->createFormBuilder($user,[
            'method'=>'PUT'
        ])
            ->add('name', TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('designation', TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('save', SubmitType::class,array('label'=>'SAVE','attr'=>array('class'=>'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->userManager->editUser($user);
            return $this->redirectToRoute('profile',array('id'=>$id));
        }
        return $this->render("User/edit.html.twig",array('form'=>$form->createView()));
    }

    /**
     * @Route("/user/{id}/delete",methods={"GET"})
     */
    public function deleteAction($id){

        if($id!=$this->getUser()->getUsername()) {
            $this->addFlash("notice", "unauthorised access");
            return $this->redirectToRoute('home');
        }
        $this->userManager->deleteUser($id);
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/user/{id}/changePassword",methods={"GET","PUT"})
     */
    public function changePasswordAction(Request $request,$id,UserPasswordEncoderInterface $passwordEncoder){

        if($id!=$this->getUser()->getUsername()) {
            $this->addFlash("notice", "unauthorised access");
            return $this->redirectToRoute('home');
        }

        $user = $this->userManager->getUser($id);
        $form = $this->createFormBuilder($user,[
            'method'=>'PUT'
        ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'New Password '],
                'second_options' => ['label' => 'Confirm Password '],
                'attr'=>array('class'=>'form-control')
            ])
            ->add('change password',SubmitType::class,array('attr'=>array('class'=>'btn btn-success')))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($user,$user->getPassword());
            $user->setPassword($password);;
            $this->userManager->editUser($user);
            return $this->redirectToRoute('login');
        }
        return $this->render('User/edit.html.twig',array('form'=>$form->createView()));
    }
}