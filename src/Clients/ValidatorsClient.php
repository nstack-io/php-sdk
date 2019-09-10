<?php

namespace NStack\Clients;

use NStack\Exceptions\FailedToParseException;
use NStack\Models\EmailValidation;
use NStack\Models\PhoneValidation;

/**
 * Class ValidatorsClient
 *
 * @package NStack\Clients
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class ValidatorsClient extends NStackClient
{
    /** @var string */
    protected $path = 'validator';

    /**
     * email
     *
     * @param String $email
     * @return EmailValidation
     * @throws FailedToParseException
     * @author  Tiago Araujo <tiar@nodesagency.com>
     */
    public function email(String $email): EmailValidation
    {
        $response = $this->client->get($this->buildPath($this->path . '/email?email=' . $email));
        $contents = $response->getBody()->getContents();
        $data = json_decode($contents, true);

        return new EmailValidation($data);
    }

    /**
     * phone
     *
     * @param String       $phone
     * @param String|null  $fallbackCountryCode
     * @param Boolean|null $validateWithTwilio
     * @param String|null  $twilioType
     * @return PhoneValidation
     * @throws FailedToParseException
     * @author  Tiago Araujo <tiar@nodesagency.com>
     */
    public function phone(
        String $phone,
        String $fallbackCountryCode = null,
        bool $validateWithTwilio = null,
        String $twilioType = null
    ): PhoneValidation {
        $path = $this->buildPath($this->path . '/phone?phone=' . $phone);

        if ($fallbackCountryCode) {
            $path = $path . '&fallback_country_code=' . $fallbackCountryCode;
        }
        if ($validateWithTwilio) {
            $path = $path . '&twilio=' . $validateWithTwilio;
        }
        if ($twilioType) {
            $path = $path . '&twilio_type=' . $twilioType;
        }

        $response = $this->client->get($path);
        $contents = $response->getBody()->getContents();
        $data = json_decode($contents, true);

        return new PhoneValidation($data);
    }
}