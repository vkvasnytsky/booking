<?php

class Booking_Model_RoomFacility
{
    protected $_id;
    protected $_room_id;
    protected $_hotel_id;
    protected $_facilitytype_id;
    protected $_value;

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

    public function setRoomId($room_id)
    {
        $this->_room_id = (int) $room_id;
        return $this;
    }

    public function getRoomId()
    {
        return $this->_room_id;
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

    public function setTypeId($type_id)
    {
        $this->_facilitytype_id = (int) $type_id;
        return $this;
    }

    public function getTypeId()
    {
        return $this->_facilitytype_id;
    }

    public function setValue($value)
    {
        $this->_value = (bool) $value;
        return $this;
    }

    public function getValue()
    {
        return $this->_value;
    }
}