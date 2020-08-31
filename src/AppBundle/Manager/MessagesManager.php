<?php


namespace AppBundle\Manager;

use Doctrine\Common\Persistence\ManagerRegistry as Doctrine;

class MessagesManager
{
    private $messagesMapperRepository;
    private $em;
    public $count;

    /**
     * MessagesManager constructor.
     *
     */
    public function __construct(Doctrine $doctrine)
    {
        $this->em = $doctrine->getManager();
        $this->messagesMapperRepository = $doctrine->getEntityManager()->getRepository('AppBundle:MessagesMapper');
    }

    /**
     * Returns message template
     *
     * @param string  $entity            - communication entity
     * @param string  $context           - context
     * @param string  $communicationType - communication medium type
     * @param boolean $isMagicLink       - isMagicLink
     * @param string  $countryCode       - country code
     *
     * @return mixed
     */
    public function getMessageTemplate($entity, $context, $communicationType, $isMagicLink, $countryCode)
    {
//        $messageMapper = $this->messagesMapperRepository->findOneBy(
//            array(
//                'context' => $context,
//                'countryCode' => $countryCode,
//                'communicationType' => $communicationType,
//                'entity' => $entity,
//                'isMagicLink' => $isMagicLink,
//            )
//        );
        $this->count = "rahul";
        $qb = $this->em->createQueryBuilder();
        $qb->select("m.name")
            ->from("AppBundle:MessagesMapper","mm")
            ->innerjoin("mm","AppBundle:Messages","m","mm.messages_id = m.id")
            ->where("mm.context = :context")
            ->andWhere("mm.country_code = :cc")
            ->andWhere("mm.communication_type = :ct")
            ->andWhere("mm.entity = :entity")
            ->andWhere("mm.is_magic_link = :magicLink")
            ->setParameter("context",$context)
            ->setParameter("cc",$countryCode)
            ->setParameter("entity",$entity)
            ->setParameter("magicLink",$isMagicLink)
            ->setParameter("ct",$communicationType)
            ->getQuery();

//        $messageId = $messageMapper->getMessageId()
        return $qb->getResult()[0];
//        return $messageId->getMessage();
    }

    /**
     * Returns type
     *
     * @param string  $entity            - communication entity
     * @param string  $context           - context
     * @param string  $communicationType - communication medium type
     * @param boolean $isMagicLink       - isMagicLink
     *
     * @return mixed
     */
    public function getType($entity, $context, $communicationType, $isMagicLink)
    {
        $messageMapper = $this->messagesMapperRepository->findOneBy(
            array(
                'context' => $context,
                'communicationType' => $communicationType,
                'entity' => $entity,
                'isMagicLink' => $isMagicLink,
            )
        );

        return $messageMapper->getType();
    }

    /**
     * Returns hsm_data_fields
     *
     * @param string  $entity            - communication entity
     * @param string  $context           - context
     * @param string  $communicationType - communication medium type
     * @param boolean $isMagicLink       - isMagicLink
     *
     * @return mixed
     */
    public function getHsmDataFields($entity, $context, $communicationType, $isMagicLink)
    {
        $messageMapper = $this->messagesMapperRepository->findOneBy(
            array(
                'context' => $context,
                'communicationType' => $communicationType,
                'entity' => $entity,
                'isMagicLink' => $isMagicLink,
            )
        );

        return $messageMapper->getHsmDataFields();
    }
}