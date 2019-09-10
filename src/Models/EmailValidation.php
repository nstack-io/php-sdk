<?php

namespace NStack\Models;

/**
 * Class EmailValidation
 *
 * @package NStack\Models
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class EmailValidation extends Model
{
    /** @var boolean */
    protected $ok;

    /**
     * parse
     *
     * @param array $data
     * @author Tiago Araujo <tiar@nodesagency.com>
     */
    public function parse(array $data)
    {
        $this->ok = (int)$data['ok'];
    }

    /**
     * toArray
     *
     * @return array
     * @author Tiago Araujo <tiar@nodesagency.com>
     */
    public function toArray(): array
    {
        return ['ok' => $this->ok];
    }

    /**
     * @return bool
     */
    public function isOk(): bool
    {
        return $this->ok;
    }
}