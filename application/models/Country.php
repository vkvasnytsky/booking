<?php

class Booking_Model_Country
{
    protected $_id;
    protected $_languageCode;
    protected $_name;
    protected $_area;

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

    public function setLanguageCode($languageCode)
    {
        $this->_languageCode = (string) $languageCode;
        return $this;
    }

    public function getLanguageCode()
    {
        return $this->_languageCode;
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

    public function setArea($area)
    {
        $this->_area = (string) $area;
        return $this;
    }

    public function getArea()
    {
        return $this->_area;
    }

    public function setId($id)
    {
        $this->_id = (string) $id;
        return $this;
    }

    public function getId()
    {
        return $this->_id;
    }
}

