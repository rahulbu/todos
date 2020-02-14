<?php


namespace AppBundle\Manager;

//use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use Doctrine\Common\Persistence\ManagerRegistry as Doctrine;
//use Symfony\Bridge\Doctrine as Doctrine;
//use Doctrine\Bundle\DoctrineBundle\DoctrineBundle as Doctrine;
//use AppBundle\Repository\TodoRepository as Todo;
use AppBundle\Entity\Todo;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Form;

class TodoManager
{
    protected $doctrine;
    protected $entityManager;
    protected  $entityRepository;

    /**
     * TodoManager constructor.
     * @param Doctrine $doctrine
     */
    public function __construct(Doctrine $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->entityManager = $this->doctrine->getManager();
        $this->entityRepository = $this->doctrine->getRepository('AppBundle:Todo');
    }

    public function addTask(Todo $todoClone){

        $todo = new Todo();
        $todo->setPriority($todoClone->getPriority());
        $todo->setDueDate($todoClone->getDueDate());
        $todo->setDescription($todoClone->getDescription());
        $todo->setCategory($todoClone->getCategory());
        $todo->setName($todoClone->getName());
        $todo->setCreatedAt(new \DateTime('now'));

        $this->entityManager->persist($todo);
        $this->entityManager->flush();
    }

    public function removeTask(Todo $todo){

        $this->entityManager->remove($todo);
        $this->entityManager->flush();
    }
}