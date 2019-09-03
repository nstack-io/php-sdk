<?php

namespace NStack\Tests\objects;

use NStack\Models\Model;

/**
 * Class CollectionShow2
 *
 * @package NStack\Tests\objects
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class CollectionShow2 extends Model
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $title;

    /** @var string */
    protected $description;

    /** @var float */
    protected $price;

    /**
     * parse
     *
     * @param array $data
     */
    public function parse(array $data)
    {
        $this->id           = (int)$data['id'];
        $this->title        = (string)$data['Title'];
        $this->description  = (string)$data['Description'];
        $this->price        = (string)$data['Price'];
    }

    /**
     * toArray
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id'            => $this->id,
            'Title'         => $this->title,
            'Description'   => $this->description,
            'Price'         => $this->price,
        ];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

}