<?php

namespace NStack\Tests\objects;

use NStack\Models\Model;

/**
 * Class CollectionItem
 *
 * @package NStack\Tests\objects
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class CollectionItem extends Model
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $key;

    /**
     * parse
     *
     * @param array $data
     */
    public function parse(array $data)
    {
        $this->id = (int)$data['id'];
        $this->key = (string)$data['key'];
    }

    /**
     * toArray
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'key' => $this->key,
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
    public function getKey(): string
    {
        return $this->key;
    }

}