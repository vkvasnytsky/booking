<?php
require_once 'Zend/Service/Abstract.php';

abstract class Booking_Service_Abstract extends Zend_Service_Abstract
{
    public $_client;
    protected $_credentials;
    protected $_loggedIn;

    public function __construct($options = null)
    {
        $this->_credentials = array();
        $this->_loggedIn    = false;

        if ($options instanceof Zend_Config) {
            $options = $options->toArray();
        }

        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    public function setOptions(array $options)
    {
        foreach ($options as $key => $value) {
            $method = 'set' . $key;
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }

        return $this;
    }

    protected function _initXmlRpcClient($endpoint)
    {
        $this->_client = new Zend_XmlRpc_Client($endpoint);
        $this->_client->getHttpClient()->setAuth($this->_credentials['username'], $this->_credentials['password']);
    }

    public function setUsername($username)
    {
        $this->_credentials['username'] = $username;
        return $this;
    }

    public function setPassword($password)
    {
        $this->_credentials['password'] = $password;
        return $this;
    }

    public function getXmlRpcClient()
    {
        return $this->_client;
    }
}