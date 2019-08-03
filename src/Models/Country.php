<?php

namespace NStack\Models;

/**
 * Class Country
 *
 * @package NStack\Models
 * @author  Casper Rasmussen <cr@nodes.dk>
 */
class Country extends Model
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $code;

    /** @var string */
    protected $codeIso;

    /** @var string */
    protected $name;

    /** @var string */
    protected $native;

    /** @var int */
    protected $phone;

    /** @var string */
    protected $continent;

    /** @var ?string */
    protected $capital;

    /** @var ?double */
    protected $capitalLat;

    /** @var ?double */
    protected $capitalLng;

    /** @var string */
    protected $currency;

    /** @var string */
    protected $currencyName;

    /** @var array */
    protected $languages;

    /** @var string */
    protected $image1Url;

    /** @var string */
    protected $image2Url;

    /** @var string */
    protected $imageUrl;

    /** @var ?\NStack\Models\Timezone */
    protected $capitalTimezone;

    /**
     * parse
     *
     * @param array $data
     * @throws \NStack\Exceptions\FailedToParseException
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function parse(array $data)
    {
        $this->id = (int)$data['id'];
        $this->code = (string)$data['code'];
        $this->codeIso = (string)$data['code_iso'];
        $this->name = (string)$data['name'];
        $this->native = (string)$data['native'];
        $this->phone = (int)$data['phone'];
        $this->capital = !empty($data['capital']) ? (string)$data['capital'] : null;
        $this->capitalLat = !empty($data['capital_lat']) ? (double)$data['capital_lat'] : null;
        $this->capitalLng = !empty($data['capital_lng']) ? (double)$data['capital_lng'] : null;
        $this->currency = (string)$data['currency'];
        $this->currencyName = (string)$data['currency_name'];
        $this->languages = explode(',', $data['languages']);
        $this->image1Url = (string)$data['image_1_url'];
        $this->image2Url = (string)$data['image_2_url'];
        $this->capitalTimezone = $data['capital_timezone'] ? new Timezone($data['capital_timezone']) : null;
    }

    /**
     * toArray
     *
     * @return array
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function toArray(): array
    {
        return [
            'id'                => $this->id,
            'code'              => $this->code,
            'code_iso'          => $this->codeIso,
            'name'              => $this->name,
            'native'            => $this->native,
            'phone'             => $this->phone,
            'capital'           => $this->capital,
            'capital_lat'       => $this->capitalLat,
            'capital_lng'       => $this->capitalLng,
            'currency'          => $this->currency,
            'currencyName'      => $this->currencyName,
            'languages'         => $this->languages,
            'image_1_url'       => $this->image1Url,
            'image_2_url'       => $this->image2Url,
            'capital_time_zone' => $this->capitalTimezone->toArray(),
        ];
    }

    /**
     * @return int
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getCodeIso(): string
    {
        return $this->codeIso;
    }

    /**
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getNative(): string
    {
        return $this->native;
    }

    /**
     * @return int
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getPhone(): int
    {
        return $this->phone;
    }

    /**
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getContinent(): string
    {
        return $this->continent;
    }

    /**
     * @return mixed
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * @return mixed
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getCapitalLat()
    {
        return $this->capitalLat;
    }

    /**
     * @return mixed
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getCapitalLng()
    {
        return $this->capitalLng;
    }

    /**
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getCurrencyName(): string
    {
        return $this->currencyName;
    }

    /**
     * @return array
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getLanguages(): array
    {
        return $this->languages;
    }

    /**
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getImage1Url(): string
    {
        return $this->image1Url;
    }

    /**
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getImage2Url(): string
    {
        return $this->image2Url;
    }

    /**
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * getCapitalTimezone
     *
     * @return \NStack\Models\Timezone|null
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getCapitalTimezone(): ?\NStack\Models\Timezone
    {
        return $this->capitalTimezone;
    }
}