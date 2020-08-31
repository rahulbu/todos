<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * MessagesMapper
 *
 * @ORM\Table(name="messages_mapper")
 * @ORM\Entity
 */
class MessagesMapper
{
    const ENTITY_DOCTOR = 'doctor';
    const ENTITY_PRACTICE = 'practice';
    const ENTITY_PRACTICE_TAB = 'practice_tab';

    const CONTEXT_COMMON = 'common';
    const CONTEXT_RAY_CHECKOUT = 'ray_checkout';

    const SMS_COMMUNICATION_TYPE = 'sms';
    const WHATSAPP_COMMUNICATION_TYPE = 'whatsapp';

    const DOCTOR_FEEDBACK_MAGIC_LINK_TEXT_TYPE = 'DOCTOR_FEEDBACK_MAGIC_LINK_TEXT';
    const DOCTOR_FEEDBACK_NON_MAGIC_LINK_TEXT_TYPE = 'DOCTOR_FEEDBACK_NON_MAGIC_LINK_TEXT';
    const PRACTICE_FEEDBACK_MAGIC_LINK_TEXT_TYPE = 'PRACTICE_FEEDBACK_MAGIC_LINK_TEXT';
    const PRACTICE_FEEDBACK_NON_MAGIC_LINK_TEXT_TYPE = 'PRACTICE_FEEDBACK_NON_MAGIC_LINK_TEXT';
    const TAB_PRACTICE_FEEDBACK_MAGIC_LINK_TEXT_TYPE = 'TAB_PRACTICE_FEEDBACK_MAGIC_LINK_PUBLISHED_REVIEW';

    /**
     * @var integer
     *
     * @ORM\Column(name="id",               type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     *
     * @Assert\Choice(callback="getEntityValue")
     * @ORM\Column(name="entity", type="string", length=255)
     */
    private $entity;

    /**
     * @var string
     *
     * @ORM\Column(name="context", type="string", length=255)
     * @Assert\Choice(callback     = "getContextValue", message = "choose valid context")
     */
    private $context;

    /**
     * @var string
     *
     * @ORM\Column(name="communication_type", type="string", length=255)
     * @Assert\Choice(callback                = "getCommunicationTypeValue", message = "choose valid communication type")
     */
    private $communicationType;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_magic_link", type="boolean")
     */
    private $isMagicLink;

    /**
     * @var string
     *
     * @ORM\Column(name="country_code", type="string", length=3)
     * @Assert\Choice(callback          = "getCountryCodeValue", message = "choose a valid country code")
     */
    private $countryCode;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     * @Assert\Choice(callback  = "getTypeValue", message = "choose a valid country code")
     */
    private $type;

    /**
     * @var array
     *
     * @ORM\Column(name="hsm_data_fields", type="array")
     */
    private $hsmDataFields;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Messages", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", name="message_id")
     */
    private $messageId;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public static function getEntityValue()
    {
        return array(self::ENTITY_DOCTOR, self::ENTITY_PRACTICE, self::ENTITY_PRACTICE_TAB);
    }

    /**
     * Set entity
     *
     * @param string $entity
     *
     * @return MessagesMapper
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * Get entity
     *
     * @return string
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @return array
     */
    public static function getContextValue()
    {
        return array(self::CONTEXT_COMMON, self::CONTEXT_RAY_CHECKOUT);
    }

    /**
     * Set context
     *
     * @param string $context
     *
     * @return MessagesMapper
     */
    public function setContext($context)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * Get context
     *
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @return array
     */
    public static function getCommunicationTypeValue()
    {
        return array(self::SMS_COMMUNICATION_TYPE, self::WHATSAPP_COMMUNICATION_TYPE);
    }

    /**
     * Set communicationType
     *
     * @param string $communicationType
     *
     * @return MessagesMapper
     */
    public function setCommunicationType($communicationType)
    {
        $this->communicationType = $communicationType;

        return $this;
    }

    /**
     * Get communicationType
     *
     * @return string
     */
    public function getCommunicationType()
    {
        return $this->communicationType;
    }

    /**
     * Set isMagicLink
     *
     * @param boolean $isMagicLink
     *
     * @return MessagesMapper
     */
    public function setIsMagicLink($isMagicLink)
    {
        $this->isMagicLink = $isMagicLink;

        return $this;
    }

    /**
     * Get isMagicLink
     *
     * @return boolean
     */
    public function getIsMagicLink()
    {
        return $this->isMagicLink;
    }

    /**
     * @return array
     */
    public static function getCountryCodeValue()
    {
        return array(Country::BRAZIL_CODE, Country::SINGAPORE_CODE, Country::INDONESIA_CODE, Country::INDIA_CODE, Country::PHILIPPINES_CODE);
    }

    /**
     * Set countryCode
     *
     * @param string $countryCode
     *
     * @return MessagesMapper
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Get countryCode
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @return array
     */
    public static function getTypevalue()
    {
        return array(
            self::DOCTOR_FEEDBACK_MAGIC_LINK_TEXT_TYPE,
            self::DOCTOR_FEEDBACK_NON_MAGIC_LINK_TEXT_TYPE,
            self::PRACTICE_FEEDBACK_MAGIC_LINK_TEXT_TYPE,
            self::PRACTICE_FEEDBACK_NON_MAGIC_LINK_TEXT_TYPE,
            self::TAB_PRACTICE_FEEDBACK_MAGIC_LINK_TEXT_TYPE,
        );
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return MessagesMapper
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set hsmDataFields
     *
     * @param array $hsmDataFields
     *
     * @return MessagesMapper
     */
    public function setHsmDataFields($hsmDataFields)
    {
        $this->hsmDataFields = $hsmDataFields;

        return $this;
    }

    /**
     * Get hsmDataFields
     *
     * @return array
     */
    public function getHsmDataFields()
    {
        return $this->hsmDataFields;
    }

    /**
     * @return mixed
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @param mixed $messageId
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    }

}
