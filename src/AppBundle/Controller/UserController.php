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
    public function newAction(Request $request){
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

            $user = $form->getData();

            $this->userManager->addUser($user);

            return $this->redirectToRoute('home');
        }


        return $this->render("User/create.html.twig",array('form'=>$form->createView()));
    }

    /**
     * @Route("/user/{id}",methods={"GET"},requirements={"id"="\d+"})
     */
    public function profileAction($id){
        $user = $this->userManager->getUser($id);
        if(!$user)
            throw $this->userNotFoundException('user does not exist. id : '.$id );
        return $this->render("User/show.html.twig",array('user'=>$user));
    }

    /**
     * @Route("/user/{id}/edit",methods={"GET"}, requirements={"id"="\d+"})
     */
    public function editAction($id){

    }
    /**
     * @Route("/user/{id}/delete",methods={"GET"}, requirements={"id"="\d+"})
     */
    public function deleteAction($id){

    }
}
