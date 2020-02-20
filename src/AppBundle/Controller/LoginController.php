<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends Controller
{
    /**
     * @Route("/login",name="login",methods={"GET","POST"})
     */
    public function loginAction(Request $request,AuthenticationUtils $authenticationUtils)
    {
        $errors = $authenticationUtils->getLastAuthenticationError();
        $lastUserName = $authenticationUtils->getLastUsername();

        return $this->render('Login/login.html.twig', array(
            'errors'=>$errors,
            'username'=>$lastUserName
        ));
    }

    /**
     * @Route("/logout",name="logout",methods={"GET"})
     */
    public function logoutAction(){

    }
}
