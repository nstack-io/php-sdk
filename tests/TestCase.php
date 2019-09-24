<?php

namespace NStack\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use NStack\Config;

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

    /**
     * getClientWithMockedGet
     *
     * @param string $filename
     * @return \GuzzleHttp\Client
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    protected function getClientWithMockedGet(string $filename): Client
    {
        $response = new Response(200, ['Content-Type' => 'application/json'],
            $this->getMockAsString($filename));

        $guzzle = \Mockery::mock(\GuzzleHttp\Client::class);
        $guzzle->shouldReceive('get')->once()->andReturn($response);

        return $guzzle;
    }

    /**
     * getClientWithMockedPost
     *
     * @param string $filename
     * @return Client
     * @author Tiago Araujo <tiar@nodesagency.com>
     */
    protected function getClientWithMockedPost(string $filename): Client
    {
        $response = new Response(200, ['Content-Type' => 'application/json'],
            $this->getMockAsString($filename));

        $guzzle = \Mockery::mock(Client::class);
        $guzzle->shouldReceive('post')->once()->andReturn($response);

        return $guzzle;
    }

    /**
     * getClientWithMockedDelete
     *
     * @param string $filename
     * @return Client
     * @author Tiago Araujo <tiar@nodesagency.com>
     */
    protected function getClientWithMockedDelete(string $filename): Client
    {
        $response = new Response(200, ['Content-Type' => 'application/json'],
            $this->getMockAsString($filename));

        $guzzle = \Mockery::mock(Client::class);
        $guzzle->shouldReceive('delete')->once()->andReturn($response);

        return $guzzle;
    }

    /**
     * getMockAsString
     *
     * @param string $fileName
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    protected function getMockAsString(string $fileName): string
    {
        return file_get_contents(getcwd() . '/tests/mocks/' . $fileName);
    }

    /**
     * getConfig
     *
     * @return \NStack\Config
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getConfig(): Config
    {
        return new Config('', '');
    }

}
