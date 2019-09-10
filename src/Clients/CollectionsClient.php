<?php

namespace NStack\Clients;

/**
 * Class CollectionsClient
 *
 * @package NStack\Clients
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class CollectionsClient extends NStackClient
{
    /** @var string */
    protected $path = 'content/collections';

    /**
     * view
     *
     * @param int $collectionId
     * @return array
     */
    public function view(int $collectionId): array
    {
        $response = $this->client->get($this->buildPath($this->path . '/' . $collectionId));
        $contents = $response->getBody()->getContents();

        return json_decode($contents, true)['data'];
    }

    /**
     * createItem
     *
     * @param int   $collectionId
     * @param array $params
     * @return array
     */
    public function createItem(int $collectionId, array $params): array
    {
        $response = $this->client->post($this->buildPath($this->path . '/' . $collectionId . '/items'), [
            'form_params' => $params,
        ]);
        $contents = $response->getBody()->getContents();

        return json_decode($contents, true)['data'];
    }

    /**
     * deleteItem
     *
     * @param int $collectionId
     * @param int $itemId
     */
    public function deleteItem(int $collectionId, int $itemId)
    {
        $this->client->delete($this->buildPath($this->path . '/' . $collectionId . '/items/' . $itemId));
    }

    /**
     * updateItem
     *
     * @param int   $collectionId
     * @param int   $itemId
     * @param array $params
     * @return array
     */
    public function updateItem(int $collectionId, int $itemId, array $params): array
    {
        $response = $this->client->post($this->buildPath($this->path . '/' . $collectionId . '/items/' . $itemId .
                                                         '/update'), [
            'form_params' => $params,
        ]);
        $contents = $response->getBody()->getContents();

        return json_decode($contents, true)['data'];
    }

    /**
     * viewItem
     *
     * @param int $collectionId
     * @param int $itemId
     * @return array
     */
    public function viewItem(int $collectionId, int $itemId): array
    {
        $response = $this->client->get($this->buildPath($this->path . '/' . $collectionId . '/items/' . $itemId));
        $contents = $response->getBody()->getContents();

        return json_decode($contents, true)['data'];
    }
}