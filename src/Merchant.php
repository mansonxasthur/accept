<?php


namespace MX13\Accept;


class Merchant
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $created_at;

    /**
     * @var array
     */
    private $phones;

    /**
     * @var array
     */
    private $company_emails;

    /**
     * @var string
     */
    private $company_name;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $postal_code;

    /**
     * @var string
     */
    private $street;

    public function setData(array $data): void
    {
        if (is_array($data) && !empty($data)) {
            foreach($data as $property => $value) {
                if (property_exists($this, $property)) {
                    $this->{$property} = $value;
                }
            }
        }
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @return array
     */
    public function getPhones(): array
    {
        return $this->phones;
    }

    /**
     * @return array
     */
    public function getCompanyEmails(): array
    {
        return $this->company_emails;
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->company_name;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
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
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postal_code;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }
}