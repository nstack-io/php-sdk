<?php

namespace NStack\Clients;

use NStack\Exceptions\FailedToParseException;
use NStack\Models\SeenUpdate;
use NStack\Models\VersionControlUpdate;

/**
 * Class NotifyClient
 *
 * @package NStack\Clients
 * @author Tiago Araujo <tiar@nodesagency.com>
 */
class NotifyClient extends NStackClient
{
    /** @var string */
    protected $path = 'notify/updates';

    /**
     * versionControlIndex
     *
     * @param String $platform
     * @param String|null $currentVersion
     * @param String|null $lastVersion
     * @param String|null $test
     * @return VersionControlUpdate
     * @throws FailedToParseException
     * @author Tiago Araujo <tiar@nodesagency.com>
     */
    public function versionControlIndex(
        String $platform,
        String $currentVersion = null,
        String $lastVersion = null,
        String $test = null
    ): VersionControlUpdate
    {
        $path = $this->buildPath($this->path) . "?platform=" . $platform;
        if ($currentVersion) {
            $path = $path . '&current_version=' . $currentVersion;
        }
        if ($lastVersion) {
            $path = $path . '&last_version=' . $lastVersion;
        }
        if ($test) {
            $path = $path . '&test=' . $test;
        }

        $response = $this->client->get($path);
        $contents = $response->getBody()->getContents();
        $data = json_decode($contents, true);
        return new VersionControlUpdate($data);
    }

    /**
     * markUpdateAsSeen
     *
     * @param String $guid
     * @param int $updateId
     * @param String $answer
     * @param String $type
     * @return SeenUpdate
     * @throws FailedToParseException
     */
    public function markUpdateAsSeen(String $guid, int $updateId, String $answer, String $type)
    {
        $response = $this->client->post($this->buildPath($this->path), [
            'form_params' => [
                'guid'      => $guid,
                'update_id' => $updateId,
                'answer'    => $answer,
                'type'      => $type,
            ]
        ]);
        $contents = $response->getBody()->getContents();
        $data = json_decode($contents, true);
        return new SeenUpdate($data['data']);
    }

}