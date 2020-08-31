<?php


namespace AppBundle\Tests\Entity;


use AppBundle\Entity\Messages;
use AppBundle\Entity\MessagesMapper;
use AppBundle\Utils\MobileConstants;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Manager\MessagesManager;

class MessagesEntityTest extends WebTestCase
{
//    public function testRepository(){
//
//        $message = new Messages();
//        $message->setName('test');
//
//        $messagesRepository = $this->createMock(ObjectRepository::class);
//        $messagesRepository->expects($this->any())->method('find')->willReturn($message);
//
//        $em = $this->createMock(ObjectManager::class);
//        $em->expects($this->any())->method('getRepository')->willReturn($messagesRepository);
//
//
//        $messageMapper = new MessagesMapper();
//        $messageMapper->setMessageId();
//
//
//        $this->assertEquals($message->getId(), $messageMapper->getMessageId());
//        $this->assertEquals($message->getName(), );
//    }

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;
    private $mm;


    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
        $this->mm = $kernel->getContainer()->get('AppBundle\Manager\MessagesManager');

//        $this->assertNotNull($this->mm);
//        $message = new Messages();
//        $message->setName('testing');
//        $message->setMessage('message');
//        $this->entityManager->persist($message);

//        $this->entityManager->flush();

//        $messageMapper = new MessagesMapper();
//        $messageMapper->setMessageId($message);
//        $messageMapper->setType('yes');
//        $messageMapper->setEntity('doc');
//        $messageMapper->setContext('com');
//        $messageMapper->setIsMagicLink(true);
//        $messageMapper->setCountryCode('IN');
//        $messageMapper->setCommunicationType('mob');
//
//        $this->entityManager->persist($messageMapper);
//        $this->entityManager->flush();
    }

    public function testSearchByName()
    {

//        $mm = $this->entityManager->getRepository(Messages::class)->findOneBy(array('id'=>44));

//        $this->assertSame(44,$mm->getId());
//
//        $messageMapper = $this->entityManager->getRepository(MessagesMapper::class)->findOneBy(['messageId' => $mm]);
//        $this->assertSame($mm->getId(),$messageMapper->getMessageId());
//        $product = $this->entityManager
//            ->getRepository(Messages::class)
//            ->findOneBy(['id' => $messageMapper]);

//        $this->assertSame($mm, $product);
//        $this->assertSame('IN',$messageMapper->getCountryCode());

//        $newMessage = new Messages();
//        $newMessage->setMessage("mes");
//        $newMessage->setName('na');
//
//        $messageMapper->setMessageId($newMessage);

//        $this->entityManager->detach($product);
//        $this->entityManager->detach($product);
//        $this->entityManager->remove($messageMapper);
//        $this->entityManager->flush();

        $jobs = array(
            array('entity'=>'DOCTOR','context' => 'COMMON','comtype' => 'SMS','magic' => MobileConstants::MAGIC_LINK_COMMUNICATION,'country' => 'IN'),
            array('entity'=>'DOCTOR','context' => 'COMMON','comtype' => 'SMS','magic' => MobileConstants::MAGIC_LINK_COMMUNICATION,'country' => 'BR'),
            array('entity'=>'DOCTOR','context' => 'COMMON','comtype' => 'SMS','magic' => MobileConstants::MAGIC_LINK_COMMUNICATION,'country' => 'PH'),
            array('entity'=>'DOCTOR','context' => 'COMMON','comtype' => 'SMS','magic' => MobileConstants::MAGIC_LINK_COMMUNICATION,'country' => 'ID'),

            array('entity'=>'DOCTOR','context' => 'COMMON','comtype' => 'SMS','magic' => MobileConstants::NON_MAGIC_LINK_COMMUNICATION,'country' => 'IN'),
            array('entity'=>'DOCTOR','context' => 'COMMON','comtype' => 'SMS','magic' => MobileConstants::NON_MAGIC_LINK_COMMUNICATION,'country' => 'BR'),
            array('entity'=>'DOCTOR','context' => 'COMMON','comtype' => 'SMS','magic' => MobileConstants::NON_MAGIC_LINK_COMMUNICATION,'country' => 'ID'),
            array('entity'=>'DOCTOR','context' => 'COMMON','comtype' => 'SMS','magic' => MobileConstants::NON_MAGIC_LINK_COMMUNICATION,'country' => 'PH'),

            array('entity'=>'DOCTOR','context' => 'COMMON','comtype' => 'WHATSAPP','magic' => MobileConstants::MAGIC_LINK_COMMUNICATION,'country' => 'IN'),

            array('entity'=>'DOCTOR','context' => 'COMMON','comtype' => 'WHATSAPP','magic' => MobileConstants::NON_MAGIC_LINK_COMMUNICATION,'country' => 'IN'),

            array('entity'=>'DOCTOR','context' => 'RAY_CHECKOUT','comtype' => 'SMS','magic' => MobileConstants::MAGIC_LINK_COMMUNICATION,'country' => 'IN'),

            array('entity'=>'PRACTICE','context' => 'COMMON','comtype' => 'SMS','magic' => MobileConstants::MAGIC_LINK_COMMUNICATION,'country' => 'IN'),

            array('entity'=>'PRACTICE','context' => 'COMMON','comtype' => 'SMS','magic' => MobileConstants::NON_MAGIC_LINK_COMMUNICATION,'country' => 'IN'),

            array('entity'=>'PRACTICE','context' => 'COMMON','comtype' => 'WHATSAPP','magic' => MobileConstants::MAGIC_LINK_COMMUNICATION,'country' => 'IN'),

            array('entity'=>'PRACTICE','context' => 'COMMON','comtype' => 'WHATSAPP','magic' => MobileConstants::NON_MAGIC_LINK_COMMUNICATION,'country' => 'IN'),

            array('entity'=>'PRACTICE_TAB','context' => 'COMMON','comtype' => 'WHATSAPP','magic' => MobileConstants::MAGIC_LINK_COMMUNICATION,'country' => 'IN'),

        );
        foreach ($jobs as $job) {
            $messageFromcode = MobileConstants::$communicationsEntityMapping[$job['entity']][$job['context']][$job['comtype']][$job['magic']]['texts'][$job['country']];
            $messageFromDB = $this->mm->getMessageTemplate($job['entity'], $job['context'],$job['comtype'], $job['magic'] === MobileConstants::MAGIC_LINK_COMMUNICATION,$job['country']);

            $typeFromcode = MobileConstants::$communicationsEntityMapping[$job['entity']][$job['context']][$job['comtype']][$job['magic']]['type'];
            $typeFromDB = $this->mm->getType($job['entity'], $job['context'],$job['comtype'], $job['magic'] === MobileConstants::MAGIC_LINK_COMMUNICATION);


            $this->assertSame($messageFromcode, $messageFromDB);
            $this->assertSame($typeFromcode, $typeFromDB);

            if($job['comtype'] === 'WHATSAPP') {
                $fsmFromCode = MobileConstants::$communicationsEntityMapping[$job['entity']][$job['context']][$job['comtype']][$job['magic']]['hsm_data_fields'];
                $fsmFromDB = $this->mm->getHsmDataFields($job['entity'], $job['context'],$job['comtype'], $job['magic'] === MobileConstants::MAGIC_LINK_COMMUNICATION);

                $this->assertSame($fsmFromCode, $fsmFromDB);
            }
        }
    }

    protected function tearDown()
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}