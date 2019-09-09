<?php

namespace NStack\Models;

use DateTime;
use Exception;

/**
 * Class SeenUpdate
 *
 * @package NStack\Models
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class SeenUpdate extends Model
{
    /** @var int */
    protected $id;

    /** @var String */
    protected $guid;

    /** @var string */
    protected $answer;

    /** @var string */
    protected $type;

    /** @var DateTime */
    protected $created;

    /**
     * parse
     *
     * @param array $data
     * @throws Exception
     */
    public function parse(array $data)
    {
        $this->id       = (int)$data['id'];
        $this->guid     = (int)$data['guid'];
        $this->answer   = (string)$data['answer'];
        $this->type     = (string)$data['type'];
        $this->created  = new DateTime($data['created']);
    }

    /**
     * toArray
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id'      => $this->id,
            'guid'    => $this->guid,
            'answer'  => $this->answer,
            'type'    => $this->type,
            'created' => $this->created,
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
     * @return String
     */
    public function getGuid(): String
    {
        return $this->guid;
    }

    /**
     * @return string
     */
    public function getAnswer(): string
    {
        return $this->answer;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

}