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
            $message = sprintf('Failed to parse %s: %s', get_called_class(), $e->getMessage());

            if (!empty($data['id'])) {
                $message .= ' ID: ' . $data['id'];
            }

            throw new FailedToParseException($message);
        }
    }

    public abstract function parse(array $data);

    public abstract function toArray(): array;
}