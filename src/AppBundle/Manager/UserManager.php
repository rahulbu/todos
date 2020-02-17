<?php


namespace AppBundle\Manager;


use AppBundle\Entity\User;
use Doctrine\Common\Persistence\ManagerRegistry;

class UserManager
{
    private $doctrine;
    private $entityManager;
    private $entityRepository;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->entityRepository = $doctrine->getRepository('AppBundle:User');
        $this->entityManager = $doctrine->getManager();
    }

    /**
     * @param $user
     */
    public function addUser(User $user){
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    /**
     * @param $user
     */
    public function deleteUser($userId){
        $user = $this->entityRepository->findOneBy(array("userId"=>$userId));
        if(!user)
            throw $this->userNotFoundException('user not found with the id '.$userId);
        $this->entityManager->remove($user);
        $this->entityManager->flush();
    }

    public function editUser(User $user){
        $existingUser = $this->entityRepository->findBy(array("userId"=>$user->getUserId()));
        if(!$existingUser){
            throw $this->userNotFoundException("no user found with id : ".$user->getUserId());
        }
        $existingUser->setName($user->getName());
        $existingUser->setDesignation($user->getDesignation());
        $this->entityManager->flush();
    }

    public function getUser($id){
        return $this->entityRepository->findOneBy(array('userId'=>$id));
    }
}