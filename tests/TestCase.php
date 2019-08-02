<?php

namespace NStack\Tests;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * getMockAsArray
     *
     * @param string $fileName
     * @return array
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    protected function getMockAsArray(string $fileName): array
    {
        $content = file_get_contents(getcwd() . '/tests/mocks/' . $fileName);

        return json_decode($content, true);
    }
}
