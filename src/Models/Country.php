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

    /** @var ?float */
    protected $capitalLat;

    /** @var ?float */
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

    /**
     * parse
     *
     * @param array $data
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function parse(array $data)
    {
        $this->id = (int)$data['id'];
        $this->name = (string)$data['name'];
        $this->code = (string)$data['code'];
        $this->imageUrl = (string)$data['image_url'];
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
            'id'        => $this->id,
            'name'      => $this->name,
            'code'      => $this->code,
            'image_url' => $this->imageUrl,
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
    public function getName(): string
    {
        return $this->name;
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
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }
}