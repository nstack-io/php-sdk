<?php

namespace NStack\Clients;

use DateTime;
use NStack\Exceptions\FailedToParseException;
use NStack\Models\File;

/**
 * Class FilesClient
 *
 * @package NStack\Clients
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class FilesClient extends NStackClient
{
    /** @var string */
    protected $path = 'content/files';

    /**
     * store
     *
     * @param String   $name
     * @param array    $tagsArray
     * @param DateTime $goneAt
     * @param String   $privacy
     * @param String   $imagePath
     * @return File
     * @throws FailedToParseException
     */
    public function store(
        String $name,
        String $privacy,
        String $imagePath,
        array $tagsArray = null,
        DateTime $goneAt = null
    ) {
        $response = $this->client->post($this->buildPath($this->path), [
            'form_params' => [
                'name'    => $name,
                'tags'    => is_null($tagsArray) ? null : implode(",", $tagsArray),
                'gone_at' => $goneAt,
                'privacy' => $privacy,
                'file'    => fopen($imagePath, 'r'),
            ],
        ]);
        $contents = $response->getBody()->getContents();
        $data = json_decode($contents, true);

        return new File($data['data']);
    }

    /**
     * storeWithPath
     *
     * @param String        $name
     * @param String        $privacy
     * @param String        $path
     * @param String        $mime
     * @param int           $size
     * @param array|null    $tagsArray
     * @param DateTime|null $goneAt
     * @return File
     * @throws FailedToParseException
     */
    public function storeWithPath(
        String $name,
        String $privacy,
        String $path,
        String $mime,
        int $size,
        array $tagsArray = null,
        DateTime $goneAt = null
    ) {
        $response = $this->client->post($this->buildPath($this->path . '/path'), [
            'form_params' => [
                'name'    => $name,
                'tags'    => is_null($tagsArray) ? null : implode(",", $tagsArray),
                'gone_at' => $goneAt,
                'privacy' => $privacy,
                'path'    => $path,
                'mime'    => $mime,
                'size'    => $size,
            ],
        ]);
        $contents = $response->getBody()->getContents();
        $data = json_decode($contents, true);

        return new File($data['data']);
    }
}