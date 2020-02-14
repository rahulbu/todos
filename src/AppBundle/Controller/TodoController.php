<?php

namespace AppBundle\Controller;

use AppBundle\Manager\TodoManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use AppBundle\Entity\Todo;

class TodoController extends Controller
{
    private $todoManager;

    public function __construct(TodoManager $todoManager)
    {
        $this->todoManager = $todoManager;
    }

    /**
     * @Route("/",name="home")
     */
    public function indexAction()
    {
//        die("todos");
        $todos = $this->getDoctrine()
            ->getRepository('AppBundle:Todo')
            ->findAll();
        $todosDesc = $this->getDoctrine()->getRepository('AppBundle:Todo')->findBy(array(),array('createdAt'=>'desc'));

        return $this->render("Todo/index.html.twig",array('todos'=>$todosDesc));
//            return $this->json($todos);
//        return $this->render('', array('name' => $name));
    }

    /**
     * @Route("/todos/create")
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function createAction(Request $request)
    {
        $todo = new Todo();

        $form = $this->createFormBuilder($todo)
            ->add('name', TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('category', TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('description', TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('priority', ChoiceType::class,array('choices'=>array('low'=>'low','normal'=>'normal','high'=>'high'),'attr'=>array('class'=>'form-control')))
            ->add('dueDate', DateTimeType::class,array('attr'=>array('class'=>'formcontrol')))
            ->add('save', SubmitType::class,array('label'=>'create todo','attr'=>array('class'=>'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $todo = $form->getData();

            $this->todoManager->addTask($todo);

            return $this->redirectToRoute('home');
//            return new Response("form submitted");
//            die('submitted');
        }


        return $this->render("Todo/create.html.twig",array('form'=>$form->createView()));
    }
    /**
     * @Route("/todos/edit/{id}")
     */
    public function editAction($id)
    {

        $log = $this->container->get('logger');
        $log->log('a',"nothing to edit");
        return $this->render("Todo/edit.html.twig");
    }

    /**
     * @Route("/todos/show/{id}")
     * @param $id
     * @return Response
     */
    public function showAction($id){
        $details = $this->getDoctrine()->getRepository('AppBundle:Todo')->findOneBy(array("id"=>$id));
        return $this->render("Todo/details.html.twig",array('details'=>$details));
    }

    /**
     * @Route("/todos/{id}/delete")
     * @param $id
     */
    public function deleteAction($id){
        $todo = $this->getDoctrine()->getRepository('AppBundle:Todo')->findOneBy(array("id"=>$id));
        $this->todoManager->removeTask($todo);

        return $this->redirectToRoute("home");
    }
}
