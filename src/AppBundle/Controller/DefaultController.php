<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class DefaultController extends Controller
{
    /**
     * @Route("/login",name="login")
     */
    public function loginAction(Request $request,AuthenticationUtils $authenticationUtils){

        $errors= $authenticationUtils->getLastAuthenticationError();

        $lastUserId = $authenticationUtils->getLastUsername();

        $form = $this->createFormBuilder()
            ->add('_username',NumberType::class,array('attr'=>array('class'=>'form-control','name'=>"_userId")))
            ->add('password',PasswordType::class,array('attr'=>array('class'=>'form-control','name'=>"_password")))
            ->add('submit',SubmitType::class,array('attr'=>array('class'=>'btn btn-primary')))
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            return $this->redirectToRoute('home');
        }
        return $this->render('default/login.html.twig',array('form'=>$form->createView(),'errors'=>$errors,'userId'=>$lastUserId));
    }
}
