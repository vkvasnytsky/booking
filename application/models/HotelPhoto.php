<?php

class Booking_Model_HotelPhoto
{
    protected $_hotel_id;
    protected $_type_id;
    protected $_photo_id;
    protected $_url_original;
    protected $_url_60;
    protected $_url_300;

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

    public function setHotelId($hotel_id)
    {
        $this->_hotel_id = (int) $hotel_id;
        return $this;
    }

    public function getHotelId()
    {
        return $this->_hotel_id;
    }

    public function setPhotoId($photo_id)
    {
        $this->_photo_id = (int) $photo_id;
        return $this;
    }

    public function getPhotoId()
    {
        return $this->_photo_id;
    }

    public function setTypeId($typeId)
    {
        $this->_type_id = (int) $typeId;
        return $this;
    }

    public function getTypeId()
    {
        return $this->_type_id;
    }

    public function setUrlOriginal($url_original)
    {
        $this->_url_original = (string) $url_original;
        return $this;
    }

    public function getUrlOriginal()
    {
        return $this->_url_original;
    }

    public function setUrl300($url_300)
    {
        $this->_url_300 = (string) $url_300;
        return $this;
    }

    public function getUrl300()
    {
        return $this->_url_300;
    }

    public function setUrl60($url_60)
    {
        $this->_url_60 = (string) $url_60;
        return $this;
    }

    public function getUrl60()
    {
        return $this->_url_60;
    }
}