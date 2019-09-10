<?php

namespace NStack\Clients;

/**
 * Class UgcClient
 *
 * @package NStack\Clients
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class UgcClient extends NStackClient
{
    /** @var string */
    protected $path = 'ugc';

    /**
     * storePushLog
     *
     * @param String      $provider
     * @param String      $key
     * @param String      $type
     * @param bool        $succeeded
     * @param String|null $request
     * @param String|null $response
     * @param int|null    $userId
     * @param String|null $relationType
     * @param int|null    $relationId
     */
    public function storePushLog(
        String $provider,
        String $key,
        String $type,
        bool $succeeded,
        String $request = null,
        String $response = null,
        int $userId = null,
        String $relationType = null,
        int $relationId = null
    ) {
        $this->client->post($this->buildPath($this->path), [
            'body' => '{
                            "provider": "' . $provider . '",
                            "key": "' . $key . '",
                            "type": "' . $type . '",
                            "succeeded": ' . $succeeded . ',
                            "request": { ' . $request . ', },
                            "response": { ' . $response . ', },
                            "user_id": ' . $userId . '
                            "relation_type": "' . $relationType . '",
                            "relation_id": ' . $relationId . '
                        }',
        ]);
    }
}