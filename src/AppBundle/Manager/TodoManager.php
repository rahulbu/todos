<?php


namespace AppBundle\Manager;

use Doctrine\Common\Persistence\ManagerRegistry as Doctrine;
use AppBundle\Entity\Todo;

class TodoManager
{
    protected $doctrine;
    protected $entityManager;
    protected  $entityRepository;
    protected  $queryBuilder;

    /**
     * TodoManager constructor.
     * @param Doctrine $doctrine
     */
    public function __construct(Doctrine $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->entityManager = $this->doctrine->getManager();
        $this->entityRepository = $this->doctrine->getRepository('AppBundle:Todo');
        $this->queryBuilder = $this->entityRepository->createQueryBuilder('Todo');
    }

    public function addTask(Todo $todoClone){

        $todo = new Todo();
        $todo->setPriority($todoClone->getPriority());
        $todo->setDueDate($todoClone->getDueDate());
        $todo->setDescription($todoClone->getDescription());
        $todo->setCategory($todoClone->getCategory());
        $todo->setName($todoClone->getName());
        $todo->setCreatedAt(new \DateTime('now'));
        $todo->setUserId();

        $this->entityManager->persist($todo);
        $this->entityManager->flush();
    }

    public function removeTask(Todo $todo){

        $this->entityManager->remove($todo);
        $this->entityManager->flush();
    }

    public function findAllTodos(){
        return $this->entityRepository->findAllTodos();
//        return $this->queryBuilder->select()->from('Todo')->addGroupBy('Todo.status')->addOrderBy('Todo.dueDate','desc')->getQuery()->execute();

     }
    public function findTodo($id){
        return $this->entityRepository->findOneBy(array('id'=>$id));
    }
    public function editTodo(Todo $todo){
        $currentTodo = $this->findTodo($todo->getId());
        $currentTodo->setName($todo->getName());
        $currentTodo->setDescription($todo->getDescription());
        $currentTodo->setCategory($todo->getCategory());
        $currentTodo->setPriority($todo->getPriority());
        $currentTodo->setDueDate($todo->getDueDate());

        $this->entityManager->flush();
    }
    public function updateTodo($id){
        $todo = $this->findTodo($id);
        if(!$todo)
            throw $this->todoNotFoundException('todo not found');

        $todo->setStatus(1);
        $this->entityManager->flush();
    }
}