<?php

namespace AppBundle\Utils;


/**
 * An abstraction for the data related to mobile communications
 */
final class MobileConstants
{
    const INDIA_CODE = 'IN';
    const BRAZIL_CODE = 'BR';
    const INDONESIA_CODE = 'ID';
    const PHILIPPINES_CODE = 'PH';

    //Mobile communication related constants
    const SMS_COMMUNICATION = 'SMS';
    const IVR_COMMUNICATION = 'IVR';
    const WHATSAPP_COMMUNICATION = 'WHATSAPP';
    const DEFAULT_MOBILE_COMMUNICATION_LIMIT = 10;

    //References
    const SURVEY_REFERENCE = 'SURVEY_ID';
    const DOCTOR_REFERENCE = 'DOCTOR_ID';
    const MOBILE_COMMUNICATION_REFERENCE = 'MOBILE_COMMUNICATION_ID';
    const REVIEW_MODERATION_REFERENCE = 'REVIEW_MODERATION_ID';

    //Communication Link Type
    const MAGIC_LINK_COMMUNICATION = 'MAGIC_LINK_COMMUNICATION';
    const NON_MAGIC_LINK_COMMUNICATION = 'NON_MAGIC_LINK_COMMUNICATION';

    //Message types
    const DOCTOR_RECO_VOICE_MESSAGE_TYPE = 'DOCTOR_RECO_VOICE_MESSAGE';
    const DOCTOR_FEEDBACK_MAGIC_LINK_TEXT_TYPE = 'DOCTOR_FEEDBACK_MAGIC_LINK_TEXT';
    const DOCTOR_FEEDBACK_NON_MAGIC_LINK_TEXT_TYPE = 'DOCTOR_FEEDBACK_NON_MAGIC_LINK_TEXT';
    const PRACTICE_FEEDBACK_MAGIC_LINK_TEXT_TYPE = 'PRACTICE_FEEDBACK_MAGIC_LINK_TEXT';
    const PRACTICE_FEEDBACK_NON_MAGIC_LINK_TEXT_TYPE = 'PRACTICE_FEEDBACK_NON_MAGIC_LINK_TEXT';
    const RECEIVED_REVIEW_DOCTOR_TEXT_TYPE = 'RECEIVED_REVIEW_DOCTOR_TEXT';
    const CONTESTED_PROOF_REVIEW_DOCTOR_TEXT_TYPE = 'CONTESTED_PROOF_REVIEW_DOCTOR_TEXT';
    const SURVEY_SMS_TYPE = 'SURVEY_SMS';
    const SURVEY_USER_VERIFICATION_TYPE = 'USER_VERIFICATION';
    const DOCTOR_REVIEW_STATUS_UPDATE = 'DOCTOR_REVIEW_STATUS_UPDATE';
    const PATIENT_CLOSING_LOOP_TYPE = 'PATIENT_CLOSING_LOOP';
    const TAB_PRACTICE_FEEDBACK_MAGIC_LINK_TEXT_TYPE = 'TAB_PRACTICE_FEEDBACK_MAGIC_LINK_PUBLISHED_REVIEW';
    const DOCTOR_OFFLINE_FEEDBACK_MAGIC_LINK_TEXT_TYPE = 'DOCTOR_OFFLINE_FEEDBACK_MAGIC_LINK_PUBLISHED_REVIEW';
    const DOCTOR_OFFLINE_FEEDBACK_NON_MAGIC_LINK_TEXT_TYPE = 'DOCTOR_OFFLINE_FEEDBACK_NON_MAGIC_LINK_PUBLISHED_REVIEW';

    //Communicator message types
    const FEEDBACK_STATUS_SMS = 'FEEDBACK_STATUS_SMS';

    const PNS_PROOF_REQUEST_SMS = "PNS_PROOF_REQUEST_SMS";

    //SMS related constants
    const SMS_LIMIT_PER_RESPONDEE = 2;
    const TRANSACTIONAL_MESSAGE_SENDER = 'TRANSACTIONAL_MESSAGE';
    const PROMOTIONAL_MESSAGE_SENDER = 'PROMOTIONAL_MESSAGE';
    const UNSUBSCRIBE_LINK = '

$unsubscribe_link';

    //Whatsapp related constants
    const WHATSAPP_MESSAGE_TYPE = 'HSM';
    const FEEDBACK_VALID_WHATSAPP_MESSAGE_TYPE = 'FEEDBACK_WHATSAPP_MAGIC_LINK';
    const PRACTICE_TAB_WHATSAPP_MESSAGE_TYPE = 'FEEDBACK_PRACTICE_TAB_WHATSAPP_MAGIC_LINK';
    const WHATSAPP_EXPIRY_DAYS = '2 days';
    const WHATSAPP_APP_NAME = 'Feedback';
    const WHATSAPP_API = '/send_generic_transactional_whatsapp';
    const WHATSAPP_GET_CONSENT_API = "/wave/api/whatsapp/consent.json";
    const WHATSAPP_LIMIT_PER_RESPONDEE = 1;

    //Message texts
    const DOCTOR_FEEDBACK_WHATSAPP_MAGIC_LINK_TEXT = "{{1}}, Hope you're feeling better! Please write a feedback for {{2}} by clicking this link. {{magic_link}}
Your feedback will help lakhs of patients in {{4}} make an informed choice.";

    const DOCTOR_FEEDBACK_WHATSAPP_NON_MAGIC_LINK_TEXT = 'How was your appointment experience with {{doctor_name}} at {{practice_name}}? Your feedback has potential to help lacs of people on Practo.
Give your feedback here: {{doctor_feedback_url}}';

    const DOCTOR_FEEDBACK_MAGIC_LINK_TEXT = "%greeting%, Hope you're feeling better! Please write a feedback for %doctor_name% by clicking this link. {{link}}
Your feedback will help lakhs of patients in %practice_city% make an informed choice.";

    const DOCTOR_FEEDBACK_NON_MAGIC_LINK_TEXT = "%greeting%, Hope you're feeling better! Please write a feedback for %doctor_name% by clicking this link. %doctor_feedback_url%
Your feedback will help lakhs of patients in %practice_city% make an informed choice.";

    const DOCTOR_RECO_VOICE_MESSAGE = 'Hi.. Practo dot com wants to take feedback about %doctor_name% at %practice_name%. Press one if you did not Visited this doctor. Press two if you recommend the doctor. Press three for if you dont recommend';

    const PRACTICE_FEEDBACK_WHATSAPP_NON_MAGIC_LINK_TEXT = 'How was your appointment experience at {{practice_name}}? Your feedback has potential to help lacs of people on Practo.
Give your feedback here: {{practice_feedback_url}}';

    const PRACTICE_FEEDBACK_WHATSAPP_MAGIC_LINK_TEXT = "How was your appointment experience at {{practice_name}}? Your feedback has potential to help lacs of people on Practo.
Give your feedback here: {{magic_link}}
Practo's T&C applicable.";

    const PRACTICE_FEEDBACK_NON_MAGIC_LINK_TEXT = "%greeting%, Hope you're feeling better! Please leave a feedback for your doctor at %practice_name% by clicking this link. %practice_feedback_url%
Your feedback will help lakhs of patients in %practice_city% make an informed choice";

    const PRACTICE_FEEDBACK_MAGIC_LINK_TEXT = "How was your appointment experience at %practice_name%? Your feedback has potential to help lacs of people on Practo.
Give your feedback here: {{link}}
Practo's T&C applicable.";

    const DOCTOR_FEEDBACK_RAY_CHECKOUT_MAGIC_LINK_TEXT = '%greeting%, thank you for visiting %practice_name%. We wish you a speedy recovery! Please leave your feedback for %doctor_name% by clicking this link. {{link}}';

    const RECEIVED_REVIEW_DOCTOR_TEXT = "Dear %doctorName%, You have received new feedback. To reply, kindly login into feedback dashboard - Practo";

    const CONTESTED_PROOF_REVIEW_DOCTOR_TEXT = "Dear %doctorName%, %patientName% has submitted proof of visit contested by you. Please see details in your Feedback dashboard - Practo";

    //Brazil Message Texts
    const DOCTOR_FEEDBACK_MAGIC_LINK_TEXT_BR = "Como foi a sua experiência com %doctor_name% em %practice_name%? Seu feedback pode ajudar milhares de pessoas na Practo.
Deixe seu feedback aqui: {{link}}
T&C da Practo aplicáveis.";

    const DOCTOR_FEEDBACK_NON_MAGIC_LINK_TEXT_BR = 'Como foi a sua experiência com %doctor_name% em %practice_name%? Seu feedback pode ajudar milhares de pessoas na Practo.
Deixe seu feedback aqui: %doctor_feedback_url%';

    //Indonesia Message Texts
    const DOCTOR_FEEDBACK_MAGIC_LINK_TEXT_ID = "Bagaimana pengalaman janji temu anda dengan %doctor_name% di %practice_name%? Feedback anda akan sangat membantu jutaan orang di Practo.
Berikan feedback anda disini: {{link}}
S&K Practo berlaku.";

    const DOCTOR_FEEDBACK_NON_MAGIC_LINK_TEXT_ID = 'Bagaimana pengalaman janji temu anda dengan %doctor_name% di %practice_name%? Feedback anda akan sangat membantu jutaan orang di Practo.
Berikan feedback anda disini: %doctor_feedback_url%';

    //Philippines Message Texts
    const DOCTOR_FEEDBACK_MAGIC_LINK_TEXT_PH = "How was your appointment experience with %doctor_name% at %practice_name%? Your feedback has potential to help lacs of people on Practo.
Give your feedback here: {{link}}
Practo's T&C applicable.";

    const DOCTOR_FEEDBACK_NON_MAGIC_LINK_TEXT_PH = 'How was your appointment experience with %doctor_name% at %practice_name%? Your feedback has potential to help lacs of people on Practo.
Give your feedback here: %doctor_feedback_url%';

    const TAB_WHATSAPP_PUBLISHED_REVIEW_TEXT = "Thank you for submitting the feedback for {{doctor_name}} at {{practice_name}}.
If you have not given this feedback yourself or disagree with its contents, then please let us know here: {{magic_link}} - Practo";

    //Status constants
    const CALL_INITIATED_STATUS = 'CALL_INITIATED';
    const INVALID_KEYPRESS_STATUS = 'INVALID_KEYPRESS';
    const SURVEY_DELETED_STATUS = 'SURVEY_DELETED';
    const RESPONSE_REGISTERED_STATUS = 'RESPONSE_REGISTERED';
    const SENT_STATUS = 'SENT';
    const FAILED_STATUS = 'FAILED';

    public static $mobileCommunicatorFallbackMappings = array(
        self::WHATSAPP_COMMUNICATION => self::SMS_COMMUNICATION,
    );

    //Voice related constants
    const VOICE_AUTOCALLS_API = '/v1/autocalls';
    const VOICE_CALLBACK_API = '/wave/surveys/voiceresponses';
    const VOICE_LIMIT_PER_RESPONDEE = 1;
    public static $doctorRecoQuestion = array(
        'playback_text' => self::DOCTOR_RECO_VOICE_MESSAGE,
        'keypress' => array(
            '2' => 'YES',
            '3' => 'NO',
        ),
        'callback_route' => self::VOICE_CALLBACK_API,
        'call_flow' => 'doctor_reco_collection',
    );

    public static $communicationLimitMapping = array(
        self::WHATSAPP_COMMUNICATION => self::WHATSAPP_LIMIT_PER_RESPONDEE,
        self::SMS_COMMUNICATION => self::SMS_LIMIT_PER_RESPONDEE,
        self::IVR_COMMUNICATION => self::VOICE_LIMIT_PER_RESPONDEE,
    );

    public static $communicatorSMSTypeMappings = array(
        self::RECEIVED_REVIEW_DOCTOR_TEXT_TYPE => self::FEEDBACK_STATUS_SMS,
        self::CONTESTED_PROOF_REVIEW_DOCTOR_TEXT_TYPE => self::FEEDBACK_STATUS_SMS,
        self::SURVEY_SMS_TYPE => self::SURVEY_SMS_TYPE,
        self::DOCTOR_FEEDBACK_MAGIC_LINK_TEXT_TYPE => self::SURVEY_SMS_TYPE,
        self::DOCTOR_FEEDBACK_NON_MAGIC_LINK_TEXT_TYPE => self::SURVEY_SMS_TYPE,
        self::PRACTICE_FEEDBACK_MAGIC_LINK_TEXT_TYPE => self::SURVEY_SMS_TYPE,
        self::PRACTICE_FEEDBACK_NON_MAGIC_LINK_TEXT_TYPE => self::SURVEY_SMS_TYPE,
        self::SURVEY_USER_VERIFICATION_TYPE => self::SURVEY_USER_VERIFICATION_TYPE,
        self::PATIENT_CLOSING_LOOP_TYPE => self::PATIENT_CLOSING_LOOP_TYPE,
        self::PNS_PROOF_REQUEST_SMS => self::PNS_PROOF_REQUEST_SMS,
        self::DOCTOR_REVIEW_STATUS_UPDATE => self::SURVEY_SMS_TYPE,
        self::DOCTOR_OFFLINE_FEEDBACK_NON_MAGIC_LINK_TEXT_TYPE => self::SURVEY_SMS_TYPE,
        self::DOCTOR_OFFLINE_FEEDBACK_MAGIC_LINK_TEXT_TYPE => self::SURVEY_SMS_TYPE,
    );

    const CONTEXT_COMMON = 'COMMON';
    const CONTEXT_RAY_CHECKOUT = 'RAY_CHECKOUT';

    public static $communicationsEntityMapping = array(
        'DOCTOR' => array(
            self::CONTEXT_COMMON => array(
                self::SMS_COMMUNICATION => array(
                    self::MAGIC_LINK_COMMUNICATION => array(
                        'texts' => array(
                            self::INDIA_CODE => self::DOCTOR_FEEDBACK_MAGIC_LINK_TEXT,
                            self::BRAZIL_CODE => self::DOCTOR_FEEDBACK_MAGIC_LINK_TEXT_BR,
                            self::INDONESIA_CODE => self::DOCTOR_FEEDBACK_MAGIC_LINK_TEXT_ID,
                            self::PHILIPPINES_CODE => self::DOCTOR_FEEDBACK_MAGIC_LINK_TEXT_PH,
                        ),
                        'type' => self::DOCTOR_FEEDBACK_MAGIC_LINK_TEXT_TYPE,
                    ),
                    self::NON_MAGIC_LINK_COMMUNICATION => array(
                        'texts' => array(
                            self::INDIA_CODE => self::DOCTOR_FEEDBACK_NON_MAGIC_LINK_TEXT,
                            self::BRAZIL_CODE => self::DOCTOR_FEEDBACK_NON_MAGIC_LINK_TEXT_BR,
                            self::INDONESIA_CODE => self::DOCTOR_FEEDBACK_NON_MAGIC_LINK_TEXT_ID,
                            self::PHILIPPINES_CODE => self::DOCTOR_FEEDBACK_NON_MAGIC_LINK_TEXT_PH,
                        ),
                        'type' => self::DOCTOR_FEEDBACK_NON_MAGIC_LINK_TEXT_TYPE,
                    ),
                ),
                self::WHATSAPP_COMMUNICATION => array(
                    self::MAGIC_LINK_COMMUNICATION => array(
                        'texts' => array(
                            self::INDIA_CODE => self::DOCTOR_FEEDBACK_WHATSAPP_MAGIC_LINK_TEXT,
                        ),
                        'type' => self::DOCTOR_FEEDBACK_MAGIC_LINK_TEXT_TYPE,
                        'hsm_data_fields' => array(
                            '1',
                            '2',
                            'magic_link',
                            '4',
                        ),
                    ),
                    self::NON_MAGIC_LINK_COMMUNICATION => array(
                        'texts' => array(
                            self::INDIA_CODE => self::DOCTOR_FEEDBACK_WHATSAPP_NON_MAGIC_LINK_TEXT,
                        ),
                        'type' => self::DOCTOR_FEEDBACK_NON_MAGIC_LINK_TEXT_TYPE,
                        'hsm_data_fields' => array(
                            'doctor_name',
                            'practice_name',
                            'doctor_feedback_url',
                        ),
                    ),
                ),
            ),
            self::CONTEXT_RAY_CHECKOUT => array(
                self::SMS_COMMUNICATION => array(
                    self::MAGIC_LINK_COMMUNICATION => array(
                        'texts' => array(
                            self::INDIA_CODE => self::DOCTOR_FEEDBACK_RAY_CHECKOUT_MAGIC_LINK_TEXT,
                        ),
                        'type' => self::DOCTOR_FEEDBACK_MAGIC_LINK_TEXT_TYPE,
                    ),
                ),
            ),
        ),
        'PRACTICE' => array(
            self::CONTEXT_COMMON => array(
                self::SMS_COMMUNICATION => array(
                    self::MAGIC_LINK_COMMUNICATION => array(
                        'texts' => array(
                            self::INDIA_CODE => self::PRACTICE_FEEDBACK_MAGIC_LINK_TEXT,
                        ),
                        'type' => self::PRACTICE_FEEDBACK_MAGIC_LINK_TEXT_TYPE,
                    ),
                    self::NON_MAGIC_LINK_COMMUNICATION => array(
                        'texts' => array(
                            self::INDIA_CODE => self::PRACTICE_FEEDBACK_NON_MAGIC_LINK_TEXT,
                        ),
                        'type' => self::PRACTICE_FEEDBACK_NON_MAGIC_LINK_TEXT_TYPE,
                    ),
                ),
                self::WHATSAPP_COMMUNICATION => array(
                    self::MAGIC_LINK_COMMUNICATION => array(
                        'texts' => array(
                            self::INDIA_CODE => self::PRACTICE_FEEDBACK_WHATSAPP_MAGIC_LINK_TEXT,
                        ),
                        'type' => self::PRACTICE_FEEDBACK_MAGIC_LINK_TEXT_TYPE,
                        'hsm_data_fields' => array(
                            'practice_name',
                            'magic_link',
                        ),
                    ),
                    self::NON_MAGIC_LINK_COMMUNICATION => array(
                        'texts' => array(
                            self::INDIA_CODE => self::PRACTICE_FEEDBACK_WHATSAPP_NON_MAGIC_LINK_TEXT,
                        ),
                        'type' => self::PRACTICE_FEEDBACK_NON_MAGIC_LINK_TEXT_TYPE,
                        'hsm_data_fields' => array(
                            'practice_name',
                            'practice_feedback_url',
                        ),
                    ),
                ),
            ),
        ),
        'PRACTICE_TAB' => array(
            self::CONTEXT_COMMON => array(
                self::WHATSAPP_COMMUNICATION => array(
                    self::MAGIC_LINK_COMMUNICATION => array(
                        'texts' => array(
                            self::INDIA_CODE => self::TAB_WHATSAPP_PUBLISHED_REVIEW_TEXT,
                        ),
                        'type' => self::TAB_PRACTICE_FEEDBACK_MAGIC_LINK_TEXT_TYPE,
                        'hsm_data_fields' => array(
                            'doctor_name',
                            'practice_name',
                            'magic_link',
                        ),
                    ),
                ),
            ),
        ),
    );

    public static $okWhatsAppStatusCodes = ['DELIVERED', 'READ'];
}
