<?php

namespace NStack;

use NStack\Clients\CollectionsClient;
use NStack\Clients\ContinentsClient;
use NStack\Clients\CountriesClient;
use NStack\Clients\FilesClient;
use NStack\Clients\IpAddressesClient;
use NStack\Clients\LanguagesClient;
use NStack\Clients\LocalizeClient;
use NStack\Clients\ProposalsClient;
use NStack\Clients\PushLogClient;
use NStack\Clients\TimezoneClient;
use NStack\Clients\ValidatorsClient;
use NStack\Clients\VersionControlClient;
use NStack\Exceptions\MissingMasterKeyException;

/**
 * Class NStack
 *
 * @package NStack
 * @author  Casper Rasmussen <cr@nodes.dk>
 */
class NStack
{
    /** @var \NStack\Config */
    protected $config;

    /** @var CollectionsClient */
    protected $collectionClient;

    /** @var ContinentsClient */
    protected $continentsClient;

    /** @var CountriesClient */
    protected $countriesClient;

    /** @var FilesClient */
    protected $filesClient;

    /** @var IpAddressesClient */
    protected $ipAddressClient;

    /** @var LanguagesClient */
    protected $languageClient;

    /** @var LocalizeClient */
    protected $localizeClient;

    /** @var VersionControlClient */
    protected $versionControlClient;

    /** @var ProposalsClient */
    protected $proposalClient;

    /** @var TimezoneClient */
    protected $timezoneClient;

    /** @var PushLogClient */
    protected $pushLogClient;

    /** @var ValidatorsClient */
    protected $validatorClient;

    /**
     * NStack constructor.
     *
     * @param \NStack\Config $config
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->continentsClient = new ContinentsClient($config);
        $this->countriesClient = new CountriesClient($config);
        $this->collectionClient = new CollectionsClient($config);
        $this->filesClient = new FilesClient($config);
        $this->ipAddressClient = new IpAddressesClient($config);
        $this->languageClient = new LanguagesClient($config);
        $this->localizeClient = new LocalizeClient($config);
        $this->versionControlClient = new VersionControlClient($config);
        $this->proposalClient = new ProposalsClient($config);
        $this->timezoneClient = new TimezoneClient($config);
        $this->pushLogClient = new PushLogClient($config);
        $this->validatorClient = new ValidatorsClient($config);
    }

    /**
     * @return \NStack\Config
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

    /**
     * getContinentsClient
     *
     * @return ContinentsClient
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getContinentsClient(): ContinentsClient
    {
        return $this->continentsClient;
    }

    /**
     * getCountriesClient
     *
     * @return CountriesClient
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getCountriesClient(): CountriesClient
    {
        return $this->countriesClient;
    }

    /**
     * @return CollectionsClient
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getCollectionClient(): CollectionsClient
    {
        return $this->collectionClient;
    }

    /**
     * @return FilesClient
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getFilesClient(): FilesClient
    {
        return $this->filesClient;
    }

    /**
     * @return IpAddressesClient
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getIpAddressClient(): IpAddressesClient
    {
        return $this->ipAddressClient;
    }

    /**
     * @return LanguagesClient
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getLanguageClient(): LanguagesClient
    {
        return $this->languageClient;
    }

    /**
     * @return LocalizeClient
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getLocalizeClient(): LocalizeClient
    {
        return $this->localizeClient;
    }

    /**
     * @return VersionControlClient
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getVersionControlClient(): VersionControlClient
    {
        return $this->versionControlClient;
    }

    /**
     * @return ProposalsClient
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getProposalClient(): ProposalsClient
    {
        return $this->proposalClient;
    }

    /**
     * @return TimezoneClient
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getTimezoneClient(): TimezoneClient
    {
        return $this->timezoneClient;
    }

    /**
     * @return PushLogClient
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getPushLogClient(): PushLogClient
    {
        return $this->pushLogClient;
    }

    /**
     * @return ValidatorsClient
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getValidatorClient(): ValidatorsClient
    {
        return $this->validatorClient;
    }

    /**
     * getDeeplink
     *
     * @return string
     * @throws \NStack\Exceptions\MissingMasterKeyException
     * @author Casper Rasmussen <cr@nodes.dk>
     */
    public function getDeeplink(): string
    {
        if (!$this->config->getMasterKey()) {
            throw new MissingMasterKeyException();
        }

        return $this->config->getBaseUrl() . '/deeplink/' . $this->config->getAppId() . '/' .
               $this->config->getMasterKey();
    }
}