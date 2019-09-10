<?php

namespace NStack\Models;

/**
 * Class PhoneValidation
 *
 * @package NStack\Models
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class PhoneValidation extends Model
{
    /** @var boolean */
    protected $ok;

    /** @var String */
    protected $countryCode;

    /** @var String */
    protected $nationalNumber;

    /**
     * parse
     *
     * @param array $data
     * @author Tiago Araujo <tiar@nodesagency.com>
     */
    public function parse(array $data)
    {
        $this->ok = (String)$data['ok'];
        $this->countryCode = (String)$data['country_code'];
        $this->nationalNumber = (String)$data['national_number'];
    }

    /**
     * toArray
     *
     * @return array
     * @author Tiago Araujo <tiar@nodesagency.com>
     */
    public function toArray(): array
    {
        return [
            'ok'              => $this->ok,
            'country_code'    => $this->countryCode,
            'national_number' => $this->nationalNumber,
        ];
    }

    /**
     * @return bool
     */
    public function isOk(): bool
    {
        return $this->ok;
    }

    /**
     * @return String
     */
    public function getCountryCode(): String
    {
        return $this->countryCode;
    }

    /**
     * @return String
     */
    public function getNationalNumber(): String
    {
        return $this->nationalNumber;
    }
}