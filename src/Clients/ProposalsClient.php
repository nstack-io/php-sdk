<?php

namespace NStack\Clients;

use NStack\Exceptions\FailedToParseException;
use NStack\Models\IpAddress;
use NStack\Models\Proposal;
use NStack\Models\ProposalDeleted;

/**
 * Class ProposalsClient
 *
 * @package NStack\Clients
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class ProposalsClient extends NStackClient
{
    /** @var string */
    protected $path = 'localize/proposals';

    /**
     * index
     *
     * @param String|null $guid
     * @return array
     * @throws FailedToParseException
     */
    public function index(String $guid = null): array
    {
        $response = $this->client->get($this->buildPath($this->path . '?guid=' . $guid));
        $contents = $response->getBody()->getContents();
        $data = json_decode($contents, true);

        $array = [];
        foreach ($data['data'] as $object) {
            $array[] = new Proposal($object);
        }

        return $array;
    }

    /**
     * store
     *
     * @param String|null $guid
     * @param String $key
     * @param String $value
     * @param String $platform
     * @param String $locale
     * @param String $section
     * @return Proposal
     * @throws FailedToParseException
     */
    public function store(
        String $guid,
        String $key,
        String $value,
        String $platform,
        String $locale,
        String $section
    )
    {
        $response = $this->client->post($this->buildPath($this->path), [
            'form_params' => [
                'key'       => $key,
                'value'     => $value,
                'locale'    => $locale,
                'platform'  => $platform,
                'guid'      => $guid,
                'section'   => $section,
            ]
        ]);
        $contents = $response->getBody()->getContents();
        $data = json_decode($contents, true);
        return new Proposal($data['data']);
    }

    /**
     * delete
     *
     * @param int $id
     * @param String $guid
     */
    public function delete(int $id, String $guid)
    {
        $this->client->delete($this->buildPath($this->path . '/' . $id . '?guid=' . $guid));
    }

}