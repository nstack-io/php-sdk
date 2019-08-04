<?php

namespace NStack\Models;

/**
 * Class Continent
 *
 * @package NStack\Models
 * @author  Casper Rasmussen <cr@nodes.dk>
 */
class Language extends Model
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var string */
    protected $locale;

    /** @var string */
    protected $direction;

    /** @var bool */
    protected $isDefault;

    /** @var bool */
    protected $isBestFit;

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
        $this->locale = (string)$data['locale'];
        $this->direction = (string)$data['direction'];
        $this->isDefault = (bool)$data['is_default'];
        $this->isBestFit = (bool)$data['is_best_fit'];
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
            'id'          => $this->id,
            'name'        => $this->name,
            'locale'      => $this->locale,
            'direction'   => $this->direction,
            'is_default'  => $this->isDefault,
            'is_best_fit' => $this->isBestFit,
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
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @return bool
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function isDefault(): bool
    {
        return $this->isDefault;
    }

    /**
     * @return bool
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function isBestFit(): bool
    {
        return $this->isBestFit;
    }
}