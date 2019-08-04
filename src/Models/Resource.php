<?php

namespace NStack\Models;

/**
 * Class Continent
 *
 * @package NStack\Models
 * @author  Casper Rasmussen <cr@nodes.dk>
 */
class Resource extends Model
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $url;

    /** @var string */
    protected $lastUpdatedAt;

    /** @var \NStack\Models\Language */
    protected $language;

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
        $this->url = (string)$data['url'];
        $this->lastUpdatedAt = (string)$data['last_updated_at'];
        $this->language = new Language($data['language']);
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
            'id'              => $this->id,
            'url'             => $this->url,
            'last_updated_at' => $this->lastUpdatedAt,
            'language'        => $this->language->toArray(),
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
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getLastUpdatedAt(): string
    {
        return $this->lastUpdatedAt;
    }

    /**
     * @return \NStack\Models\Language
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getLanguage(): \NStack\Models\Language
    {
        return $this->language;
    }
}