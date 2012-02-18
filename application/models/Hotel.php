<?php

class Booking_Model_Hotel
{
    protected $_id;
    protected $_hoteltype_id;
    protected $_name;
    protected $_address;
    protected $_city_id;
    protected $_city;
    protected $_district;
    protected $_countrycode;
    protected $_zip;
    protected $_minrate;
    protected $_maxrate;
    protected $_currencycode;
    protected $_class;
    protected $_lng;
    protected $_lat;
    protected $_ranking;
    protected $_url;
    protected $_nr_rooms;
    protected $_preferred;
    protected $_review_nr;
    protected $_review_score;


    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid location property');
        }
        $this->$method($value);
    }

    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid location property');
        }
        return $this->$method();
    }

    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    public function setId($id)
    {
        $this->_id = (int) $id;
        return $this;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setTypeId($hoteltype_id)
    {
        $this->_hoteltype_id = (int) $hoteltype_id;
        return $this;
    }

    public function getTypeId()
    {
        return $this->_hoteltype_id;
    }

   public function setCityId($city_id)
    {
        $this->_city_id = (int) $city_id;
        return $this;
    }

    public function getCityId()
    {
        return $this->_city_id;
    }

    public function setName($name)
    {
        $this->_name = (string) $name;
        return $this;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function setAddress($address)
    {
        $this->_address = (string) $address;
        return $this;
    }

    public function getAddress()
    {
        return $this->_address;
    }

    public function setCity($city)
    {
        $this->_city = (string) $city;
        return $this;
    }

    public function getCity()
    {
        return $this->_city;
    }

    public function setDistrict($district)
    {
        $this->_district = (string) $district;
        return $this;
    }

    public function getDistrict()
    {
        return $this->_district;
    }

    public function setCountryCode($countrycode)
    {
        $this->_countrycode = (string) $countrycode;
        return $this;
    }

    public function getCountryCode()
    {
        return $this->_countrycode;
    }

    public function setZip($zip)
    {
        $this->_zip = (string) $zip;
        return $this;
    }

    public function getZip()
    {
        return $this->_zip;
    }

    public function setMinRate($minrate)
    {
        $this->_minrate = (real) $minrate;
        return $this;
    }

    public function getMinRate()
    {
        return $this->_minrate;
    }

    public function setMaxRate($maxrate)
    {
        $this->_maxrate = (real) $maxrate;
        return $this;
    }

    public function getMaxRate()
    {
        return $this->_maxrate;
    }

    public function setCurrencyCode($currencycode)
    {
        $this->_currencycode = (string) $currencycode;
        return $this;
    }

    public function getCurrencyCode()
    {
        return $this->_currencycode;
    }

   public function setClass($class)
    {
        $this->_class = (int) $class;
        return $this;
    }

    public function getClass()
    {
        return $this->_class;
    }

    public function setLng($lng)
    {
        $this->_lng = (real) $lng;
        return $this;
    }

    public function getLng()
    {
        return $this->_lng;
    }

    public function setLat($lat)
    {
        $this->_lat = (real) $lat;
        return $this;
    }

    public function getLat()
    {
        return $this->_lat;
    }

   public function setRanking($ranking)
    {
        $this->_ranking = (int) $ranking;
        return $this;
    }

    public function getRanking()
    {
        return $this->_ranking;
    }

    public function setUrl($url)
    {
        $this->_url = (string) $url;
        return $this;
    }

    public function getUrl()
    {
        return $this->_url;
    }

   public function setNrRooms($nr_rooms)
    {
        $this->_nr_rooms = (int) $nr_rooms;
        return $this;
    }

    public function getNrRooms()
    {
        return $this->_nr_rooms;
    }

    public function setPreferred($preferred)
    {
        $this->_preferred = (bool) $preferred;
        return $this;
    }

    public function getPreferred()
    {
        return $this->_preferred;
    }

   public function setReviewNr($review_nr)
    {
        $this->_review_nr = (int) $review_nr;
        return $this;
    }

    public function getReviewNr()
    {
        return $this->_review_nr;
    }

    public function setReviewScore($review_score)
    {
        $this->_review_score = (string) $review_score;
        return $this;
    }

    public function getReviewScore()
    {
        return $this->_review_score;
    }
}