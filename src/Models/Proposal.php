<?php

namespace NStack\Models;

/**
 * Class Proposal
 *
 * @package NStack\Models
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class Proposal extends Model
{
    /** @var int */
    protected $id;

    /** @var int */
    protected $applicationId;

    /** @var string */
    protected $key;

    /** @var string */
    protected $section;

    /** @var string */
    protected $locale;

    /** @var string */
    protected $value;

    /** @var string */
    protected $canDelete;

    /**
     * parse
     *
     * @param array $data
     */
    public function parse(array $data)
    {
        $this->id               = (int)$data['id'];
        $this->applicationId    = (int)$data['application_id'];
        $this->key              = (string)$data['key'];
        $this->section          = (string)$data['section'];
        $this->locale           = (string)$data['locale'];
        $this->value            = (string)$data['value'];
        $this->canDelete        = (string)$data['can_delete'];
    }

    /**
     * toArray
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id'                => $this->id,
            'application_id'    => $this->applicationId,
            'key'               => $this->key,
            'section'           => $this->section,
            'locale'            => $this->locale,
            'value'             => $this->value,
            'can_delete'        => $this->canDelete,
        ];
    }

}