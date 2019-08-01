<?php

namespace NStack\Models;

abstract class Model
{
    public function __construct(array $data)
    {
        try {
            $this->parse($data);
        } catch (\Throwable $e) {
            dd($e);
        }
    }

    public abstract function parse(array $data);

    public abstract function toArray(): array;
}