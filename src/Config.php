<?php

namespace NStack;

/**
 * Class Config
 *
 * @package NStack
 * @author  Casper Rasmussen <cr@nodes.dk>
 */
class Config
{
    /** @var string|null */
    protected $baseUrl = 'https://nstack.io';

    /** @var string */
    protected $version = 'v2';

    /** @var string */
    protected $appId;

    /** @var string */
    protected $restApiKey;

    /** @var string|null */
    protected $masterKey;

    /**
     * Config constructor.
     *
     * @param string      $appId
     * @param string      $restApiKey
     * @param string|null $masterKey
     * @param string|null $baseUrl
     * @param string      $version
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function __construct(
        string $appId,
        string $restApiKey,
        ?string $masterKey = null,
        ?string $baseUrl = null,
        string $version = 'v2'
    ) {
        $this->appId = $appId;
        $this->restApiKey = $restApiKey;
        $this->masterKey = $masterKey;

        if ($baseUrl) {
            $this->baseUrl = $baseUrl;
        }

        $this->version = $version;
    }

    /**
     * createFromArray
     *
     * @param array $data
     * @return \NStack\Config
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public static function createFromArray(array $data): self
    {
        return new self(
            $data['application_id'],
            $data['rest_api_key'],
            $data['master_key'] ?? null,
            $data['base_url'] ?? null,
            $data['version']
        );
    }

    /**
     * getBaseUrl
     *
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * setBaseUrl
     *
     * @param string $baseUrl
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * setAppId
     *
     * @param string $appId
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function setAppId(string $appId): void
    {
        $this->appId = $appId;
    }

    /**
     * getRestApiKey
     *
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getRestApiKey(): string
    {
        return $this->restApiKey;
    }

    /**
     * setRestApiKey
     *
     * @param string $restApiKey
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function setRestApoKey(string $restApiKey): void
    {
        $this->restApiKey = $restApiKey;
    }

    /**
     * getMasterKey
     *
     * @return string|null
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getMasterKey(): ?string
    {
        return $this->masterKey;
    }

    /**
     * setMasterKey
     *
     * @param string|null $masterKey
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function setMasterKey(?string $masterKey): void
    {
        $this->masterKey = $masterKey;
    }

    /**
     * getVersion
     *
     * @return string
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * setVersion
     *
     * @param string $version
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function setVersion(string $version): void
    {
        $this->version = $version;
    }
}
