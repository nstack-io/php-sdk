<?php

namespace NStack\Models;

/**
 * Class File
 *
 * @package NStack\Models
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class File extends Model
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var string */
    protected $tags;

    /** @var string */
    protected $privacy;

    /** @var string */
    protected $goneAt;

    /** @var string */
    protected $mime;

    /** @var int */
    protected $size;

    /** @var string */
    protected $password;

    /** @var string */
    protected $url;

    /** @var string */
    protected $cdnUrl;

    /** @var string */
    protected $showUrl;

    /** @var string */
    protected $downloadUrl;

    /**
     * parse
     *
     * @param array $data
     */
    public function parse(array $data)
    {
        $this->id = (int)$data['id'];
        $this->name = (string)$data['name'];
        $this->tags = (string)$data['tags'];
        $this->privacy = (string)$data['privacy'];
        $this->goneAt = (string)$data['gone_at'];
        $this->size = (string)$data['size'];
        $this->mime = (string)$data['mime'];
        $this->password = (string)$data['password'];
        $this->url = (string)$data['url'];
        $this->cdnUrl = (string)$data['cdn_url'];
        $this->showUrl = (string)$data['show_url'];
        $this->downloadUrl = (string)$data['download_url'];
    }

    /**
     * toArray
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id'           => $this->id,
            'name'         => $this->name,
            'tags'         => $this->tags,
            'privacy'      => $this->privacy,
            'gone_at'      => $this->goneAt,
            'size'         => $this->size,
            'password'     => $this->password,
            'url'          => $this->url,
            'cdn_url'      => $this->cdnUrl,
            'show_url'     => $this->showUrl,
            'download_url' => $this->downloadUrl,
            'mime'         => $this->mime,
        ];
    }
}