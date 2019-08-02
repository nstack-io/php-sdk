<?php

namespace NStack\Models;

/**
 * Class Timezone
 *
 * @package NStack\Models
 * @author  Casper Rasmussen <cr@nodes.dk>
 */
class Timezone extends Model
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var string */
    protected $abbr;

    /** @var int */
    protected $offsetSec;

    /** @var string */
    protected $label;

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
        $this->abbr = (string)$data['abbr'];
        $this->offsetSec = (string)$data['offset_sec'];
        $this->label = (string)$data['label'];
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
            'id'         => $this->id,
            'name'       => $this->name,
            'abbr'       => $this->abbr,
            'offset_sec' => $this->offsetSec,
            'label'      => $this->label,
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
    public function getAbbr(): string
    {
        return $this->abbr;
    }

    /**
     * getOffsetSec
     *
     * @return int
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getOffsetSec(): int
    {
        return $this->offsetSec;
    }

    /**
     * getLabel
     *
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getLabel(): string
    {
        return $this->label;
    }
}