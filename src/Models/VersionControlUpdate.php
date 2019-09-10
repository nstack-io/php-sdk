<?php

namespace NStack\Models;

/**
 * Class VersionControlUpdate
 *
 * @package NStack\Models
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class VersionControlUpdate extends Model
{
    /** @var String */
    protected $update;

    /** @var array */
    protected $updateVersions;

    /** @var bool */
    protected $newInVersion;

    /** @var array */
    protected $newInVersions;

    /**
     * parse
     *
     * @param array $data
     */
    public function parse(array $data)
    {
        $this->update = (String)$data['update'];
        $this->updateVersions = (array)$data['update_versions'];
        $this->newInVersion = (string)$data['new_in_version'];
        $this->newInVersions = (array)$data['new_in_versions'];
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
            'update'          => $this->update,
            'update_versions' => $this->updateVersions,
            'new_in_version'  => $this->newInVersion,
            'new_in_versions' => $this->newInVersions,
        ];
    }

    /**
     * @return String
     */
    public function getUpdate(): String
    {
        return $this->update;
    }

    /**
     * @return array
     */
    public function getUpdateVersions(): array
    {
        return $this->updateVersions;
    }

    /**
     * @return bool
     */
    public function isNewInVersion(): bool
    {
        return $this->newInVersion;
    }

    /**
     * @return array
     */
    public function getNewInVersions(): array
    {
        return $this->newInVersions;
    }
}