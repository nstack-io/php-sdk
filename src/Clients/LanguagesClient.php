<?php

namespace NStack\Clients;

use NStack\Exceptions\FailedToParseException;
use NStack\Models\Language;

/**
 * Class LanguagesClient
 *
 * @package NStack\Clients
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class LanguagesClient extends NStackClient
{
    /** @var string */
    protected $path = 'geographic/languages';

    /**
     * index
     *
     * @param int $page
     * @param int $limit
     * @return array
     * @throws FailedToParseException
     */
    public function index($page = 1, $limit = 500): array
    {
        $response = $this->client->get(
            $this->buildPath($this->path)
            . '/?page=' . $page
            . '&limit=' . $limit
        );

        $contents = $response->getBody()->getContents();

        $data = json_decode($contents, true);

        $array = [];
        foreach ($data['data'] as $object) {
            $array[] = new Language($object);
        }

        return $array;
    }

    /**
     * search
     *
     * @param String $term
     * @param int    $page
     * @param int    $limit
     * @return array
     * @throws FailedToParseException
     */
    public function search(String $term, $page = 1, $limit = 500): array
    {
        $response = $this->client->get($this->buildPath(
            $this->path
            . '/?search=' . $term
            . '&page=' . $page
            . '&limit=' . $limit
        ));

        $contents = $response->getBody()->getContents();

        $data = json_decode($contents, true);

        $array = [];
        foreach ($data['data'] as $object) {
            $array[] = new Language($object);
        }

        return $array;
    }
}