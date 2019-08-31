<?php


namespace App;


class ShipmentData
{
    /**
     * @var string
     */
    private $apartment;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $floor;
    /**
     * @var string
     */
    private $first_name;
    /**
     * @var string
     */
    private $street;
    /**
     * @var string
     */
    private $building;
    /**
     * @var string
     */
    private $phone_number;
    /**
     * @var string
     */
    private $shipping_method;
    /**
     * @var string
     */
    private $postal_code;
    /**
     * @var string
     */
    private $city;
    /**
     * @var string
     */
    private $country;
    /**
     * @var string
     */
    private $last_name;
    /**
     * @var string
     */
    private $state;

    /**
     * @param string $apartment
     *
     * @return BillingData
     */
    public function setApartment(string $apartment): BillingData
    {
        $this->apartment = $apartment;
        return $this;
    }

    /**
     * @param string $email
     *
     * @return BillingData
     */
    public function setEmail(string $email): BillingData
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param string $floor
     *
     * @return BillingData
     */
    public function setFloor(string $floor): BillingData
    {
        $this->floor = $floor;
        return $this;
    }

    /**
     * @param string $firstName
     *
     * @return BillingData
     */
    public function setFirstName(string $firstName): BillingData
    {
        $this->first_name = $firstName;
        return $this;
    }

    /**
     * @param string $street
     *
     * @return BillingData
     */
    public function setStreet(string $street): BillingData
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @param string $building
     *
     * @return BillingData
     */
    public function setBuilding(string $building): BillingData
    {
        $this->building = $building;
        return $this;
    }

    /**
     * @param string $phoneNumber
     *
     * @return BillingData
     */
    public function setPhoneNumber(string $phoneNumber): BillingData
    {
        $this->phone_number = $phoneNumber;
        return $this;
    }

    /**
     * @param string $shippingMethod
     *
     * @return BillingData
     */
    public function setShippingMethod(string $shippingMethod): BillingData
    {
        $this->shipping_method = $shippingMethod;
        return $this;
    }

    /**
     * @param string $postalCode
     *
     * @return BillingData
     */
    public function setPostalCode(string $postalCode): BillingData
    {
        $this->postal_code = $postalCode;
        return $this;
    }

    /**
     * @param string $city
     *
     * @return BillingData
     */
    public function setCity(string $city): BillingData
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @param string $country
     *
     * @return BillingData
     */
    public function setCountry(string $country): BillingData
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @param string $lastName
     *
     * @return BillingData
     */
    public function setLastName(string $lastName): BillingData
    {
        $this->last_name = $lastName;
        return $this;
    }

    /**
     * @param string $state
     *
     * @return BillingData
     */
    public function setState(string $state): BillingData
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->{$key} = $value;
                }
            }
        }
    }

    public function toArray(): array
    {
        return [
            'apartment'       => $this->apartment,
            'email'           => $this->email,
            'floor'           => $this->floor,
            'first_name'      => $this->first_name,
            'street'          => $this->street,
            'building'        => $this->building,
            'phone_number'    => $this->phone_number,
            'shipping_method' => $this->shipping_method,
            'postal_code'     => $this->postal_code,
            'city'            => $this->city,
            'country'         => $this->country,
            'last_name'       => $this->last_name,
            'state'           => $this->state,
        ];
    }
}