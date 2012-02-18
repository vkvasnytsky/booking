<?php
class Booking_Service_Booking extends Booking_Service_Abstract
{
    protected $_xml_rpc = null;

    public function __construct($options = null)
    {
        $this->_xml_rpc = $options['server'];
        parent::__construct($options);

        if (null === $this->getXmlRpcClient()) {
            $this->_initXmlRpcClient($this->_xml_rpc);
            $this->_client->setSkipSystemLookup(true);
        }
    }

    /**
     * Returns room types
     *
     * @result mixed
     *
     * @see http://xml.booking.com/affiliates/documentation/xml_getroomtypes.html
     */
    public function getRoomTypes()
    {
        try {
            $resultSet = $this->_client->call('bookings.getRoomTypes');

            $entries = array();
            foreach ($resultSet as $row) {
                $entry = new Booking_Model_RoomType();
                $entry->setId($row['roomtype_id'])
                      ->setName($row['name'])
                      ->setLanguageCode($row['languagecode']);
                $entries[] = $entry;
            }
            return $entries;

        } catch (Zend_XmlRpc_Client_HttpException $e) {
            echo "An exception occurred: " . $e->getMessage() . PHP_EOL;
        } catch (Zend_XmlRpc_Client_FaultException $e) {
            echo "Fault exception occurred: " . $e->getMessage() . PHP_EOL;
        }
    }

    /**
     * Returns countrycodes and their translated names. If a country name is not
     * available in the requested language it's English name will be returned
     * instead.
     *
     * @result mixed
     *
     * @see http://xml.booking.com/affiliates/documentation/xml_getcountries.html
     */
    public function getCountries()
    {
        try {
            $resultSet = $this->_client->call('bookings.getCountries');

            $entries = array();
            foreach ($resultSet as $row) {
                $entry = new Booking_Model_Country();
                $entry->setId($row['countrycode'])
                      ->setName($row['name'])
                      ->setArea($row['area'])
                      ->setLanguageCode($row['languagecode']);
                $entries[] = $entry;
            }
            return $entries;

        } catch (Zend_XmlRpc_Client_HttpException $e) {
            echo "An exception occurred: " . $e->getMessage() . PHP_EOL;
        } catch (Zend_XmlRpc_Client_FaultException $e) {
            echo "Fault exception occurred: " . $e->getMessage() . PHP_EOL;
        }
    }

    /**
     * Returns all the regions where Bookings offers hotels.
     *
     * @result mixed
     *
     * @see http://xml.booking.com/affiliates/documentation/xml_getregions.html
     */
    public function getRegions($countrycode = null, $languagecode = null)
    {
        $parameters = array();

        if ($countrycode !== null) {
            $parameters['countrycodes'] = $countrycode;
        }
        if ($languagecode !== null) {
            $parameters['languagecodes'] = $languagecode;
        }

        try {
            $resultSet = $this->_client->call('bookings.getRegions', new Zend_XmlRpc_Value_Struct($parameters));
            $entries = array();
            foreach ($resultSet as $row) {
                $entry = new Booking_Model_Region();
                $entry->setId($row['region_id'])
                      ->setName($row['name'])
                      ->setType($row['region_type'])
                      ->setCountryCode($row['countrycode']);
                $entries[] = $entry;
            }
            return $entries;

        } catch (Zend_XmlRpc_Client_HttpException $e) {
            echo "An exception occurred: " . $e->getMessage() . PHP_EOL;
        } catch (Zend_XmlRpc_Client_FaultException $e) {
            echo "Fault exception occurred: " . $e->getMessage() . PHP_EOL;
        }
    }

    /**
     * Returns a list of hotel chains (in English).
     *
     * @result mixed
     *
     * @see http://xml.booking.com/affiliates/documentation/xml_getchaintypes.html
     */
    public function getChainTypes()
    {
        try {
            $resultSet = $this->_client->call('bookings.getChainTypes');

            $entries = array();
            foreach ($resultSet as $row) {
                $entry = new Booking_Model_Chain();
                $entry->setId($row['chain_id'])
                      ->setName($row['name']);
                $entries[] = $entry;
            }
            return $entries;

        } catch (Zend_XmlRpc_Client_HttpException $e) {
            echo "An exception occurred: " . $e->getMessage() . PHP_EOL;
        } catch (Zend_XmlRpc_Client_FaultException $e) {
            echo "Fault exception occurred: " . $e->getMessage() . PHP_EOL;
        }
    }

    /**
     * Returns hotel facility types.
     *
     * @result mixed
     *
     * @see http://xml.booking.com/affiliates/documentation/xml_gethotelfacilitytypes.html
     */
    public function getHotelFacilityTypes($languagecode = null)
    {
        $parameters = array();

        if ($languagecode !== null) {
            $parameters['languagecodes'] = $languagecode;
        }

        try {
            $resultSet = $this->_client->call('bookings.getHotelFacilityTypes', new Zend_XmlRpc_Value_Struct($parameters));
            $entries = array();
            foreach ($resultSet as $row) {
                $entry = new Booking_Model_HotelFacilityType();
                $entry->setId($row['hotelfacilitytype_id'])
                      ->setFacilityId($row['facilitytype_id'])
                      ->setLanguageCode($row['languagecode'])
                      ->setName($row['name'])
                      ->setType($row['type']);

                $entries[] = $entry;
            }
            return $entries;

        } catch (Zend_XmlRpc_Client_HttpException $e) {
            echo "An exception occurred: " . $e->getMessage() . PHP_EOL;
        } catch (Zend_XmlRpc_Client_FaultException $e) {
            echo "Fault exception occurred: " . $e->getMessage() . PHP_EOL;
        }
    }

    /**
     * Returns room facility types.
     *
     * @result mixed
     *
     * @see http://xml.booking.com/affiliates/documentation/xml_getroomfacilitytypes.html
     */
    public function getRoomFacilityTypes($languagecode = null)
    {
        $parameters = array();

        if ($languagecode !== null) {
            $parameters['languagecodes'] = $languagecode;
        }

        try {
            $resultSet = $this->_client->call('bookings.getRoomFacilityTypes', new Zend_XmlRpc_Value_Struct($parameters));
            $entries = array();
            foreach ($resultSet as $row) {
                $entry = new Booking_Model_RoomFacilityType();
                $entry->setId($row['roomfacilitytype_id'])
                      ->setFacilityId($row['facilitytype_id'])
                      ->setLanguageCode($row['languagecode'])
                      ->setName($row['name'])
                      ->setType($row['type']);

                $entries[] = $entry;
            }
            return $entries;

        } catch (Zend_XmlRpc_Client_HttpException $e) {
            echo "An exception occurred: " . $e->getMessage() . PHP_EOL;
        } catch (Zend_XmlRpc_Client_FaultException $e) {
            echo "Fault exception occurred: " . $e->getMessage() . PHP_EOL;
        }
    }

    /**
     * Returns facility types
     *
     * @result mixed
     *
     * @see http://xml.booking.com/affiliates/documentation/xml_getfacilitytypes.html
     */
    public function getFacilityTypes($languagecode = null)
    {
        $parameters = array();

        if ($languagecode !== null) {
            $parameters['languagecodes'] = $languagecode;
        }

        try {
            $resultSet = $this->_client->call('bookings.getFacilityTypes', new Zend_XmlRpc_Value_Struct($parameters));
            $entries = array();
            foreach ($resultSet as $row) {
                $entry = new Booking_Model_Facility();
                $entry->setId($row['facilitytype_id'])
                      ->setLanguageCode($row['languagecode'])
                      ->setName($row['name']);

                $entries[] = $entry;
            }
            return $entries;

        } catch (Zend_XmlRpc_Client_HttpException $e) {
            echo "An exception occurred: " . $e->getMessage() . PHP_EOL;
        } catch (Zend_XmlRpc_Client_FaultException $e) {
            echo "Fault exception occurred: " . $e->getMessage() . PHP_EOL;
        }
    }

    /**
     * Returns hotel details
     *
     * @result mixed
     *
     * @see http://xml.booking.com/affiliates/documentation/xml_gethotels.html
     */
    public function getHotels($countrycode = null, $offset = 0, $rows = 1000)
    {
        $parameters = array();

        if ($countrycode !== null) {
            $parameters['countrycodes'] = $countrycode;
        }

        $parameters['offset'] = $offset;
        $parameters['rows']   = $rows;

        try {
            $resultSet = $this->_client->call('bookings.getHotels', new Zend_XmlRpc_Value_Struct($parameters));
            $entries = array();
            foreach ($resultSet as $row) {
                $entry = new Booking_Model_Hotel();
                $entry->setId($row['hotel_id'])
                    ->setTypeId($row['hoteltype_id'])
                    ->setName($row['name'])
                    ->setAddress($row['address'])
                    ->setCityId($row['city_id'])
                    ->setCity($row['city'])
                    ->setDistrict($row['district'])
                    ->setCountryCode($row['countrycode'])
                    ->setZip($row['zip'])
                    ->setMinRate($row['minrate'])
                    ->setMaxRate($row['maxrate'])
                    ->setCurrencyCode($row['currencycode'])
                    ->setClass($row['class'])
                    ->setLng($row['location']['longitude'])
                    ->setLat($row['location']['latitude'])
                    ->setRanking($row['ranking'])
                    ->setUrl($row['url'])
                    ->setNrRooms($row['nr_rooms'])
                    ->setPreferred($row['preferred'])
                    ->setReviewNr($row['review_nr'])
                    ->setReviewScore($row['review_score']);

                $entries[] = $entry;
            }
            return $entries;

        } catch (Zend_XmlRpc_Client_HttpException $e) {
            echo "An exception occurred: " . $e->getMessage() . PHP_EOL;
        } catch (Zend_XmlRpc_Client_FaultException $e) {
            echo "Fault exception occurred: " . $e->getMessage() . PHP_EOL;
        }
    }

    /**
     * Returns rooms
     *
     * @result mixed
     *
     * @see http://xml.booking.com/affiliates/documentation/xml_getrooms.html
     */
    public function getRooms($countrycode = null, $offset = 0, $rows = 1000)
    {
        $parameters = array();

        if ($countrycode !== null) {
            $parameters['countrycodes'] = $countrycode;
        }

        $parameters['offset'] = $offset;
        $parameters['rows']   = $rows;

        try {
            $resultSet = $this->_client->call('bookings.getRooms', new Zend_XmlRpc_Value_Struct($parameters));
            $entries = array();
            foreach ($resultSet as $row) {
                $entry = new Booking_Model_Room();
                $entry->setId($row['room_id'])
                    ->setHotelId($row['hotel_id'])
                    ->setTypeId($row['roomtype_id'])
                    ->setMaxPersons($row['max_persons'])
                    ->setMinPrice($row['min_price'])
                    ->setMaxPrice($row['max_price']);

                $entries[] = $entry;
            }
            return $entries;

        } catch (Zend_XmlRpc_Client_HttpException $e) {
            echo "An exception occurred: " . $e->getMessage() . PHP_EOL;
        } catch (Zend_XmlRpc_Client_FaultException $e) {
            echo "Fault exception occurred: " . $e->getMessage() . PHP_EOL;
        }
    }

    /**
     * Returns room facilities
     *
     * @result mixed
     *
     * @see http://xml.booking.com/affiliates/documentation/xml_getroomfacilities.html
     */
    public function getRoomFacilities($countrycode = null, $offset = 0, $rows = 1000)
    {
        $parameters = array();

        if ($countrycode !== null) {
            $parameters['countrycodes'] = $countrycode;
        }

        $parameters['offset'] = $offset;
        $parameters['rows']   = $rows;

        try {
            $resultSet = $this->_client->call('bookings.getRoomFacilities', new Zend_XmlRpc_Value_Struct($parameters));
            $entries = array();
            foreach ($resultSet as $row) {
                $entry = new Booking_Model_RoomFacility();
                $entry->setId($row['roomfacilitytype_id'])
                    ->setRoomId($row['room_id'])
                    ->setHotelId($row['hotel_id'])
                    ->setTypeId($row['facilitytype_id'])
                    ->setValue($row['value']);

                $entries[] = $entry;
            }
            return $entries;

        } catch (Zend_XmlRpc_Client_HttpException $e) {
            echo "An exception occurred: " . $e->getMessage() . PHP_EOL;
        } catch (Zend_XmlRpc_Client_FaultException $e) {
            echo "Fault exception occurred: " . $e->getMessage() . PHP_EOL;
        }
    }

    /**
     * Returns hotel descriptions
     *
     * @result mixed
     *
     * @see http://xml.booking.com/affiliates/documentation/xml_gethotdesctrans.html
     */
    public function getHotelDescriptions($countrycode = null, $languagecode = null, $offset = 0, $rows = 1000)
    {
        $parameters = array();

        if ($countrycode !== null) {
            $parameters['countrycodes'] = $countrycode;
        }
        if ($languagecode !== null) {
            $parameters['languagecodes'] = $languagecode;
        }

        $parameters['offset'] = $offset;
        $parameters['rows']   = $rows;

        try {
            $resultSet = $this->_client->call('bookings.getHotelDescriptionTranslations', new Zend_XmlRpc_Value_Struct($parameters));
            $entries = array();
            foreach ($resultSet as $row) {
                $entry = new Booking_Model_HotelDescription();
                $entry->setId($row['hotel_id'])
                    ->setLanguageCode($row['languagecode'])
                    ->setTypeId($row['descriptiontype_id'])
                    ->setDescription($row['description']);

                $entries[] = $entry;
            }
            return $entries;

        } catch (Zend_XmlRpc_Client_HttpException $e) {
            echo "An exception occurred: " . $e->getMessage() . PHP_EOL;
        } catch (Zend_XmlRpc_Client_FaultException $e) {
            echo "Fault exception occurred: " . $e->getMessage() . PHP_EOL;
        }
    }

    /**
     * Returns hotel photos
     *
     * @result mixed
     *
     * @see http://xml.booking.com/affiliates/documentation/xml_gethotelphotos.html
     */
    public function getHotelPhotos($countrycode = null, $offset = 0, $rows = 1000)
    {
        $parameters = array();

        if ($countrycode !== null) {
            $parameters['countrycodes'] = $countrycode;
        }

        $parameters['offset'] = $offset;
        $parameters['rows']   = $rows;

        try {
            $resultSet = $this->_client->call('bookings.getHotelDescriptionPhotos', new Zend_XmlRpc_Value_Struct($parameters));
            $entries = array();
            foreach ($resultSet as $row) {
                $entry = new Booking_Model_HotelPhoto();
                $entry->setHotelId($row['hotel_id'])
                    ->setTypeId($row['descriptiontype_id'])
                    ->setPhotoId($row['photo_id'])
                    ->setUrlOriginal($row['url_original'])
                    ->setUrl300($row['url_max300'])
                    ->setUrl60($row['url_square60']);

                $entries[] = $entry;
            }
            return $entries;

        } catch (Zend_XmlRpc_Client_HttpException $e) {
            echo "An exception occurred: " . $e->getMessage() . PHP_EOL;
        } catch (Zend_XmlRpc_Client_FaultException $e) {
            echo "Fault exception occurred: " . $e->getMessage() . PHP_EOL;
        }
    }
}