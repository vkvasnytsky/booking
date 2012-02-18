<?php

class Booking_Model_Room
{
    protected $_id;
    protected $_hotel_id;
    protected $_roomtype_id;
    protected $_max_persons;
    protected $_min_price;
    protected $_max_price;

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

    public function setHotelId($hotel_id)
    {
        $this->_hotel_id = (int) $hotel_id;
        return $this;
    }

    public function getHotelId()
    {
        return $this->_hotel_id;
    }

   public function setTypeId($roomtype_id)
    {
        $this->_roomtype_id = (int) $roomtype_id;
        return $this;
    }

    public function getTypeId()
    {
        return $this->_roomtype_id;
    }

    public function setMaxPersons($max_persons)
    {
        $this->_max_persons = (int) $max_persons;
        return $this;
    }

    public function getMaxPersons()
    {
        return $this->_max_persons;
    }

    public function setMinPrice($min_price)
    {
        $this->_min_price = (real) $min_price;
        return $this;
    }

    public function getMinPrice()
    {
        return $this->_min_price;
    }

    public function setMaxPrice($max_price)
    {
        $this->_max_price = (real) $max_price;
        return $this;
    }

    public function getMaxPrice()
    {
        return $this->_max_price;
    }
}