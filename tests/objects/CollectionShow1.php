<?php

namespace NStack\Tests\objects;

use NStack\Models\Model;

/**
 * Class CollectionShow1
 *
 * @package NStack\Tests\objects
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class CollectionShow1 extends Model
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $text;

    /** @var string */
    protected $image;

    /**
     * parse
     *
     * @param array $data
     */
    public function parse(array $data)
    {
        $this->id       = (int)$data['id'];
        $this->text     = (string)$data['text'];
        $this->image    = (string)$data['image'];
    }

    /**
     * toArray
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id'     => $this->id,
            'text'   => $this->text,
            'image'  => $this->image,
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
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

}