<?php

namespace NStack\Models;

use NStack\Exceptions\FailedToParseException;

abstract class Model
{
    /**
     * Model constructor.
     *
     * @param array $data
     * @throws \NStack\Exceptions\FailedToParseException
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function __construct(array $data)
    {
        try {
            $this->parse($data);
        } catch (\Throwable $e) {
            throw new FailedToParseException(sprintf('Failed to parse %s: %s', self::class, $e->getMessage()));
        }
    }

    public abstract function parse(array $data);

    public abstract function toArray(): array;
}