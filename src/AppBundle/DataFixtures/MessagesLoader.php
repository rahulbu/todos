<?php

namespace Practo\WaveBundle\DataFixtures\ORM\MessageTemplates;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Practo\WaveBundle\Entity\Messages;
use Practo\WaveBundle\Entity\MessagesMapper;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Loads messages from fixtures
 */
class MessagesLoader implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    /**
     * Intialize Container
     *
     * @param ContainerInterface $container - Symfony Container Interface
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Processes data from json and creates entries in database
     *
     * @param ObjectManager $manager - Object Manager
     */
    public function load(ObjectManager $manager)
    {
        $em = $this->container->get('doctrine')->getManager();
        $data = json_decode(file_get_contents("src/Practo/WaveBundle/DataFixtures/data.json"), true);

        foreach ($data as $mes) {
            $message = new Messages();
            $message->setName($mes["name"]);
            $message->setMessage($mes["message"]);
            $message->setCreatedAt(new \DateTime("now"));
            $em->persist($message);

            $em->flush();

            $messageMapper = new MessagesMapper();
            $messageMapper->setCommunicationType($mes["communicationType"]);
            $messageMapper->setCountryCode($mes["countryCode"]);
            $messageMapper->setIsMagicLink($mes["isMagicLink"]);
            $messageMapper->setContext($mes["context"]);
            $messageMapper->setEntity($mes["entity"]);
            $messageMapper->setType($mes["type"]);
            $messageMapper->setMessageId($message);
            $messageMapper->setHsmDataFields($mes["hsmDataFields"]);
            if (isset($mes["isReminder"])) {
                $messageMapper->setIsReminder($mes["isReminder"]);
            }
            $messageMapper->setCreatedAt(new \DateTime("now"));
            $em->persist($messageMapper);
        }
        $em->flush();
    }
}