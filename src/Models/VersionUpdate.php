<?php

namespace NStack\Models;

/**
 * Class VersionUpdate
 *
 * @package NStack\Models
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class VersionUpdate extends Model
{
    /** @var int */
    protected $id;

    /** @var String */
    protected $version;

    /** @var String */
    protected $update;

    /** @var bool */
    protected $newInVersion;

    /** @var String */
    protected $changeLog;

    /** @var String */
    protected $fileUrl;

    /**
     * parse
     *
     * @param array $data
     */
    public function parse(array $data)
    {
        $this->id = (String)$data['id'];
        $this->version = (array)$data['version'];
        $this->update = (string)$data['update'];
        $this->newInVersion = (array)$data['new_in_version'];
        $this->changeLog = (array)$data['change_log'];
        $this->fileUrl = (array)$data['file_url'];
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
            'id' => $this->id,
            'version' => $this->version,
            'update' => $this->update,
            'new_in_version' => $this->newInVersion,
            'change_log' => $this->changeLog,
            'file_url' => $this->fileUrl,
        ];
    }


}