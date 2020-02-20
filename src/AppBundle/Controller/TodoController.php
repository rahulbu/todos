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
     * @Route("/todos",name="home",methods={"GET"})
     */
    public function indexAction(Request $request)
    {
        $page_num = $request->get('page_num');
        if(!$page_num)
            $page_num = 1;

        $user = $this->getUser();
        $todos = $this->todoManager->findAllTodos($user->getUsername(),$page_num);
        $limit = 9;
        $maxPages = ceil($todos->count()/$limit);

        return $this->render("Todo/index.html.twig",array('todos'=>$todos,'thisPage'=>$page_num,'maxPages'=>$maxPages));
    }

    /**
     * @Route("/todos/create",methods={"GET","POST"})
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

            $todo->setUserId($this->getUser()->getUsername());
            $this->todoManager->addTask($todo);
            return $this->redirectToRoute('home');
        }
        return $this->render("Todo/create.html.twig",array('form'=>$form->createView()));
    }

    /**
     * @Route("/todos/{id}/edit",methods={"GET","POST"})
     */
    public function editAction(Request $request,$id)
    {
        $todo = $this->todoManager->findTodo($id);
        if(!$todo)
            throw $this->todoNotFoundException('task not found.');
        $form = $this->createFormBuilder($todo)
            ->add('name', TextType::class,array('attr'=>array('class'=>'form-control','value'=>$todo->getName())))
            ->add('category', TextType::class,array('attr'=>array('class'=>'form-control','value'=>$todo->getCategory())))
            ->add('description', TextType::class,array('attr'=>array('class'=>'form-control','value'=>$todo->getDescription())))
            ->add('priority', ChoiceType::class,array('choices'=>array('low'=>'low','normal'=>'normal','high'=>'high'),'attr'=>array('class'=>'form-control')))
            ->add('dueDate', DateTimeType::class,array('attr'=>array('class'=>'formcontrol')))
            ->add('submit', SubmitType::class,array('label'=>'Edit todo','attr'=>array('class'=>'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->todoManager->editTodo($form->getData());
            return $this->redirectToRoute('home');
        }
        return $this->render("Todo/edit.html.twig",array('form'=>$form->createView()));
    }
    /**
     * @Route("/todos/{id}/update",methods={"GET"})
     */
    public function updateAction($id){
        $todo = $this->todoManager->updateTodo($id);
        return $this->redirectToRoute('home');
    }
    /**
     * @Route("/todos/{id}/delete",methods={"GET"})
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction($id){
        $todo = $this->todoManager->findTodo($id);
        $this->todoManager->removeTask($todo);
        return $this->redirectToRoute("home");
    }
    /**
     * @Route("/todos/{id}",name="show_todo",methods={"GET"})
     * @param $id
     * @return Response
     */
    public function showAction($id){
        $details = $this->todoManager->findTodo($id);
        return $this->render("Todo/details.html.twig",array('details'=>$details));
    }
}