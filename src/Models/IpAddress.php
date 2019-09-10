<?php

namespace NStack\Models;

/**
 * Class IpAddress
 *
 * @package NStack\Models
 * @author  Tiago Araujo <tiar@nodesagency.com>
 */
class IpAddress extends Model
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $ipStart;

    /** @var string */
    protected $ipEnd;

    /** @var string */
    protected $country;

    /** @var string */
    protected $stateProv;

    /** @var string */
    protected $city;

    /** @var float */
    protected $lat;

    /** @var float */
    protected $lng;

    /** @var string */
    protected $timeZoneOffset;

    /** @var string */
    protected $timeZoneName;

    /** @var string */
    protected $ispName;

    /** @var string */
    protected $connectionType;

    /** @var string */
    protected $type;

    /** @var string */
    protected $requiredIp;

    /**
     * parse
     *
     * @param array $data
     * @author Tiago Araujo <tiar@nodesagency.com>
     */
    public function parse(array $data)
    {
        $this->id = (int)$data['id'];
        $this->ipStart = (string)$data['ip_start'];
        $this->ipEnd = (string)$data['ip_end'];
        $this->country = (string)$data['country'];
        $this->stateProv = (string)$data['state_prov'];
        $this->city = (string)$data['city'];
        $this->lat = (float)$data['lat'];
        $this->lng = (float)$data['lng'];
        $this->timeZoneOffset = (string)$data['time_zone_offset'];
        $this->timeZoneName = (string)$data['time_zone_name'];
        $this->ispName = (string)$data['isp_name'];
        $this->connectionType = (string)$data['connection_type'];
        $this->type = (string)$data['type'];
        $this->requiredIp = (string)$data['required_ip'];
    }

    /**
     * toArray
     *
     * @return array
     * @author Tiago Araujo <tiar@nodesagency.com>
     */
    public function toArray(): array
    {
        return [
            'id'               => $this->id,
            'ip_start'         => $this->ipStart,
            'ip_end'           => $this->ipEnd,
            'country'          => $this->country,
            'state_prov'       => $this->stateProv,
            'city'             => $this->city,
            'lat'              => $this->lat,
            'lng'              => $this->lng,
            'time_zone_offset' => $this->timeZoneOffset,
            'time_zone_name'   => $this->timeZoneName,
            'isp_name'         => $this->ispName,
            'connection_type'  => $this->connectionType,
            'type'             => $this->type,
            'required_ip'      => $this->requiredIp,
        ];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getIpStart(): string
    {
        return $this->ipStart;
    }

    /**
     * @return string
     */
    public function getIpEnd(): string
    {
        return $this->ipEnd;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getStateProv(): string
    {
        return $this->stateProv;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @return float
     */
    public function getLng(): float
    {
        return $this->lng;
    }

    /**
     * @return string
     */
    public function getTimeZoneOffset(): string
    {
        return $this->timeZoneOffset;
    }

    /**
     * @return string
     */
    public function getTimeZoneName(): string
    {
        return $this->timeZoneName;
    }

    /**
     * @return string
     */
    public function getIspName(): string
    {
        return $this->ispName;
    }

    /**
     * @return string
     */
    public function getConnectionType(): string
    {
        return $this->connectionType;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getRequiredIp(): string
    {
        return $this->requiredIp;
    }
}