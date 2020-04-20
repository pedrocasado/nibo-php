<?php

namespace NiboPhp;

class Nibo
{
    const API_BASE_URL = 'https://api.nibo.com.br/empresas/v1/';

    /**
     * Api token.
     *
     * @var string
     */
    protected $apiToken;

    /**
     * Organization ID.
     *
     * @var string
     */
    protected $organizationId;

    /**
     * Constructor.
     *
     * @param array $config configuration
     *
     * @throws \Exception without config params
     */
    public function __construct(array $config)
    {
        $this->apiToken = isset($config['apiToken']) ? $config['apiToken'] : false;
        $this->organizationId = isset($config['organizationId']) ? $config['organizationId'] : false;

        // Bail if empty.
        if (empty($this->apiToken) || empty($this->organizationId)) {
            throw new \Exception('Required config parameters [apiToken, organizationId] is not set or empty', 1);
        }
    }

    public function getCustomers()
    {
        $route = 'customers';

        return $this->request($route);
    }

    public function getCustomer(string $customerId)
    {
        $route = 'customers/'.$customerId;

        return $this->request($route);
    }

    public function createCustomer(array $data)
    {
        $route = 'customers';

        return $this->request($route, $data, 'POST');
    }

    public function createReceipt(array $data)
    {
        $route = 'receipts/FormatType=json';

        return $this->request($route, $data, 'POST');
    }

    protected function request(string $route, array $parameters = [], $method = 'GET')
    {
        $client = new \GuzzleHttp\Client(['base_uri' => self::API_BASE_URL]);

        $requestParams = [
            'query' => ['Organization' => $this->organizationId],
            'headers' => ['apitoken' => $this->apiToken],
            'http_errors' => false,
        ];

        switch ($method) {
            case 'GET':
                $requestParams['query'] = array_merge($requestParams['query'], $parameters);
                break;

            case 'POST':
                $requestParams['headers'] = array_merge($requestParams['headers'], ['Content-Type' => 'application/json']);
                $requestParams['body'] = json_encode($parameters);
                break;
        }

        $response = $client->request($method, $route, $requestParams);

        return json_decode($response->getBody()->getContents());
    }
}
