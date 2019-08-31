<?php


namespace MX13\Accept;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\StreamInterface;


class ApiContext
{
    const AUTH_TOKEN_URI = 'auth/tokens';

    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $merchantId;

    /**
     * @var string
     */
    private $iframeId;

    /**
     * @var string
     */
    private $integrationId;
    /**
     * @var string
     */
    private $authToken;

    /**
     * ApiContext constructor.
     *
     * @param array|null $options
     */
    public function __construct(array $options = null)
    {
        $this->client = new Client([
            'base_uri' => config('accept.base_uri'),
        ]);

        if ($options !== null && is_array($options) && !empty($options)) {
            foreach($options as $property => $value) {
                $this->{$property} = $value;
            }
        } else {
            $this->apiKey = config('accept.api_key');
            $this->merchantId = config('accept.merchant_id');
            $this->iframeId = config('accept.iframe_id');
            $this->integrationId = config('accept.integration_id');
        }
    }

    /**
     * @return string
     */
    public function getMerchantId(): string
    {
        return $this->merchantId;
    }

    /**
     * @return string
     */
    public function getIframeId(): string
    {
        return $this->iframeId;
    }

    /**
     * @return string
     */
    public function getIntegrationId(): string
    {
        return $this->integrationId;
    }

    /**
     * @param array $body
     * @param string $uri
     *
     * @return mixed|null
     * @throws \Exception
     */
    public function getData(array $body, string $uri)
    {
        if ($this->apiKey === null) {
            throw new \Exception('Api key can not be null');
        }

        if ($this->authToken === null) {
            $this->getAuthToken();
        }

        $authToken = ['auth_token' => $this->authToken];

        $result = $this->client->post($uri, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept'       => 'application/json',
            ],
            'json'    => array_merge($authToken, $body)
        ]);

        if ($result->getStatusCode() === 201) {
            return $this->parseData($result->getBody());
        }

        return null;
    }

    /**
     * @param StreamInterface $data
     *
     * @return mixed
     */
    private function parseData(StreamInterface $data)
    {
        return \GuzzleHttp\json_decode($data);
    }

    /**
     * @throws \Exception
     */
    private function getAuthToken(): void
    {
        $response = $this->client->post(self::AUTH_TOKEN_URI, [
            'json' => [
                'api_key' => $this->apiKey,
            ]
        ]);

        if ($response->getStatusCode() === 201) {
            $this->authToken = $this->parseData($response->getBody())->token;
            return;
        }

        throw new \Exception('Failed to retrieve auth token');
    }
}