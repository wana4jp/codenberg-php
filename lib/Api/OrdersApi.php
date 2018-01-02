<?php

class OrdersApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation cancelOrder
     *
     * Cancel order
     *
     * @param  int $id 注文のIDを指定します。 (required)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Kanekoelastic\PhpCodenberg\Model\StatusAndMessage
     */
    public function cancelOrder($id)
    {
        list($response) = $this->cancelOrderWithHttpInfo($id);
        return $response;
    }

    /**
     * Operation cancelOrderWithHttpInfo
     *
     * Cancel order
     *
     * @param  int $id 注文のIDを指定します。 (required)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Kanekoelastic\PhpCodenberg\Model\StatusAndMessage, HTTP status code, HTTP response headers (array of strings)
     */
    public function cancelOrderWithHttpInfo($id)
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\StatusAndMessage';
        $request = $this->cancelOrderRequest($id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Kanekoelastic\PhpCodenberg\Model\StatusAndMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation cancelOrderAsync
     *
     * Cancel order
     *
     * @param  int $id 注文のIDを指定します。 (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cancelOrderAsync($id)
    {
        return $this->cancelOrderAsyncWithHttpInfo($id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation cancelOrderAsyncWithHttpInfo
     *
     * Cancel order
     *
     * @param  int $id 注文のIDを指定します。 (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cancelOrderAsyncWithHttpInfo($id)
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\StatusAndMessage';
        $request = $this->cancelOrderRequest($id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'cancelOrder'
     *
     * @param  int $id 注文のIDを指定します。 (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function cancelOrderRequest($id)
    {
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling cancelOrder'
            );
        }

        $resourcePath = '/orders/{id}/cancel';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createOrder
     *
     * Create new order from template
     *
     * @param  \Kanekoelastic\PhpCodenberg\Model\CreateOrderRequest $body 作成する注文内容を指定します (required)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Kanekoelastic\PhpCodenberg\Model\Order
     */
    public function createOrder($body)
    {
        list($response) = $this->createOrderWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation createOrderWithHttpInfo
     *
     * Create new order from template
     *
     * @param  \Kanekoelastic\PhpCodenberg\Model\CreateOrderRequest $body 作成する注文内容を指定します (required)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Kanekoelastic\PhpCodenberg\Model\Order, HTTP status code, HTTP response headers (array of strings)
     */
    public function createOrderWithHttpInfo($body)
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\Order';
        $request = $this->createOrderRequest($body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Kanekoelastic\PhpCodenberg\Model\Order',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createOrderAsync
     *
     * Create new order from template
     *
     * @param  \Kanekoelastic\PhpCodenberg\Model\CreateOrderRequest $body 作成する注文内容を指定します (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createOrderAsync($body)
    {
        return $this->createOrderAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createOrderAsyncWithHttpInfo
     *
     * Create new order from template
     *
     * @param  \Kanekoelastic\PhpCodenberg\Model\CreateOrderRequest $body 作成する注文内容を指定します (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createOrderAsyncWithHttpInfo($body)
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\Order';
        $request = $this->createOrderRequest($body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createOrder'
     *
     * @param  \Kanekoelastic\PhpCodenberg\Model\CreateOrderRequest $body 作成する注文内容を指定します (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createOrderRequest($body)
    {
        // verify the required parameter 'body' is set
        if ($body === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling createOrder'
            );
        }

        $resourcePath = '/orders';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getCancelStatus
     *
     * Get cancel order status
     *
     * @param  int $id 注文のIDを指定します。 (required)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Kanekoelastic\PhpCodenberg\Model\StatusAndMessage
     */
    public function getCancelStatus($id)
    {
        list($response) = $this->getCancelStatusWithHttpInfo($id);
        return $response;
    }

    /**
     * Operation getCancelStatusWithHttpInfo
     *
     * Get cancel order status
     *
     * @param  int $id 注文のIDを指定します。 (required)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Kanekoelastic\PhpCodenberg\Model\StatusAndMessage, HTTP status code, HTTP response headers (array of strings)
     */
    public function getCancelStatusWithHttpInfo($id)
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\StatusAndMessage';
        $request = $this->getCancelStatusRequest($id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Kanekoelastic\PhpCodenberg\Model\StatusAndMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getCancelStatusAsync
     *
     * Get cancel order status
     *
     * @param  int $id 注文のIDを指定します。 (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCancelStatusAsync($id)
    {
        return $this->getCancelStatusAsyncWithHttpInfo($id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getCancelStatusAsyncWithHttpInfo
     *
     * Get cancel order status
     *
     * @param  int $id 注文のIDを指定します。 (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCancelStatusAsyncWithHttpInfo($id)
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\StatusAndMessage';
        $request = $this->getCancelStatusRequest($id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getCancelStatus'
     *
     * @param  int $id 注文のIDを指定します。 (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getCancelStatusRequest($id)
    {
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getCancelStatus'
            );
        }

        $resourcePath = '/orders/{id}/cancel_status';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getDeliveryStatus
     *
     * Get delivery address status for change
     *
     * @param  int $orderGroupId 注文のグループIDを指定します (required)
     * @param  int $orderId 注文Idを指定します (required)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Kanekoelastic\PhpCodenberg\Model\StatusAndMessage
     */
    public function getDeliveryStatus($orderGroupId, $orderId)
    {
        list($response) = $this->getDeliveryStatusWithHttpInfo($orderGroupId, $orderId);
        return $response;
    }

    /**
     * Operation getDeliveryStatusWithHttpInfo
     *
     * Get delivery address status for change
     *
     * @param  int $orderGroupId 注文のグループIDを指定します (required)
     * @param  int $orderId 注文Idを指定します (required)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Kanekoelastic\PhpCodenberg\Model\StatusAndMessage, HTTP status code, HTTP response headers (array of strings)
     */
    public function getDeliveryStatusWithHttpInfo($orderGroupId, $orderId)
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\StatusAndMessage';
        $request = $this->getDeliveryStatusRequest($orderGroupId, $orderId);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Kanekoelastic\PhpCodenberg\Model\StatusAndMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getDeliveryStatusAsync
     *
     * Get delivery address status for change
     *
     * @param  int $orderGroupId 注文のグループIDを指定します (required)
     * @param  int $orderId 注文Idを指定します (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDeliveryStatusAsync($orderGroupId, $orderId)
    {
        return $this->getDeliveryStatusAsyncWithHttpInfo($orderGroupId, $orderId)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDeliveryStatusAsyncWithHttpInfo
     *
     * Get delivery address status for change
     *
     * @param  int $orderGroupId 注文のグループIDを指定します (required)
     * @param  int $orderId 注文Idを指定します (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDeliveryStatusAsyncWithHttpInfo($orderGroupId, $orderId)
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\StatusAndMessage';
        $request = $this->getDeliveryStatusRequest($orderGroupId, $orderId);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getDeliveryStatus'
     *
     * @param  int $orderGroupId 注文のグループIDを指定します (required)
     * @param  int $orderId 注文Idを指定します (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getDeliveryStatusRequest($orderGroupId, $orderId)
    {
        // verify the required parameter 'orderGroupId' is set
        if ($orderGroupId === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $orderGroupId when calling getDeliveryStatus'
            );
        }
        // verify the required parameter 'orderId' is set
        if ($orderId === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $orderId when calling getDeliveryStatus'
            );
        }

        $resourcePath = '/orders/{order_group_id}/order/{order_id}/status';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($orderGroupId !== null) {
            $resourcePath = str_replace(
                '{' . 'order_group_id' . '}',
                ObjectSerializer::toPathValue($orderGroupId),
                $resourcePath
            );
        }
        // path params
        if ($orderId !== null) {
            $resourcePath = str_replace(
                '{' . 'order_id' . '}',
                ObjectSerializer::toPathValue($orderId),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getOrderById
     *
     * Get order by Id
     *
     * @param  int $id 注文のIDを指定します。 (required)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Kanekoelastic\PhpCodenberg\Model\Order
     */
    public function getOrderById($id)
    {
        list($response) = $this->getOrderByIdWithHttpInfo($id);
        return $response;
    }

    /**
     * Operation getOrderByIdWithHttpInfo
     *
     * Get order by Id
     *
     * @param  int $id 注文のIDを指定します。 (required)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Kanekoelastic\PhpCodenberg\Model\Order, HTTP status code, HTTP response headers (array of strings)
     */
    public function getOrderByIdWithHttpInfo($id)
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\Order';
        $request = $this->getOrderByIdRequest($id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Kanekoelastic\PhpCodenberg\Model\Order',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getOrderByIdAsync
     *
     * Get order by Id
     *
     * @param  int $id 注文のIDを指定します。 (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getOrderByIdAsync($id)
    {
        return $this->getOrderByIdAsyncWithHttpInfo($id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getOrderByIdAsyncWithHttpInfo
     *
     * Get order by Id
     *
     * @param  int $id 注文のIDを指定します。 (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getOrderByIdAsyncWithHttpInfo($id)
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\Order';
        $request = $this->getOrderByIdRequest($id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getOrderById'
     *
     * @param  int $id 注文のIDを指定します。 (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getOrderByIdRequest($id)
    {
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getOrderById'
            );
        }

        $resourcePath = '/orders/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getOrders
     *
     * Get order list
     *
     * @param  string $sort 並び順の基準とする項目を指定します。 (optional, default to id)
     * @param  string $direction 項目の並び順を指定します。 (optional, default to desc)
     * @param  int $perPage 1ページあたりの取得項目数。最大50件 (optional, default to 10)
     * @param  int $page ページ番号を指定します。 (optional, default to 1)
     * @param  string $rangeKey 絞り込みを行う日付を指定します。 (optional, default to created_at)
     * @param  string $from 指定すると指定した日付以降の項目を抽出します。 (optional)
     * @param  string $to 指定すると指定した日付以前の項目を抽出します。 (optional)
     * @param  bool $includingTest テストモードで登録した注文を含めるかどうかを指定します。 (optional, default to false)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Kanekoelastic\PhpCodenberg\Model\OrderList
     */
    public function getOrders($sort = 'id', $direction = 'desc', $perPage = '10', $page = '1', $rangeKey = 'created_at', $from = null, $to = null, $includingTest = 'false')
    {
        list($response) = $this->getOrdersWithHttpInfo($sort, $direction, $perPage, $page, $rangeKey, $from, $to, $includingTest);
        return $response;
    }

    /**
     * Operation getOrdersWithHttpInfo
     *
     * Get order list
     *
     * @param  string $sort 並び順の基準とする項目を指定します。 (optional, default to id)
     * @param  string $direction 項目の並び順を指定します。 (optional, default to desc)
     * @param  int $perPage 1ページあたりの取得項目数。最大50件 (optional, default to 10)
     * @param  int $page ページ番号を指定します。 (optional, default to 1)
     * @param  string $rangeKey 絞り込みを行う日付を指定します。 (optional, default to created_at)
     * @param  string $from 指定すると指定した日付以降の項目を抽出します。 (optional)
     * @param  string $to 指定すると指定した日付以前の項目を抽出します。 (optional)
     * @param  bool $includingTest テストモードで登録した注文を含めるかどうかを指定します。 (optional, default to false)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Kanekoelastic\PhpCodenberg\Model\OrderList, HTTP status code, HTTP response headers (array of strings)
     */
    public function getOrdersWithHttpInfo($sort = 'id', $direction = 'desc', $perPage = '10', $page = '1', $rangeKey = 'created_at', $from = null, $to = null, $includingTest = 'false')
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\OrderList';
        $request = $this->getOrdersRequest($sort, $direction, $perPage, $page, $rangeKey, $from, $to, $includingTest);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Kanekoelastic\PhpCodenberg\Model\OrderList',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getOrdersAsync
     *
     * Get order list
     *
     * @param  string $sort 並び順の基準とする項目を指定します。 (optional, default to id)
     * @param  string $direction 項目の並び順を指定します。 (optional, default to desc)
     * @param  int $perPage 1ページあたりの取得項目数。最大50件 (optional, default to 10)
     * @param  int $page ページ番号を指定します。 (optional, default to 1)
     * @param  string $rangeKey 絞り込みを行う日付を指定します。 (optional, default to created_at)
     * @param  string $from 指定すると指定した日付以降の項目を抽出します。 (optional)
     * @param  string $to 指定すると指定した日付以前の項目を抽出します。 (optional)
     * @param  bool $includingTest テストモードで登録した注文を含めるかどうかを指定します。 (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getOrdersAsync($sort = 'id', $direction = 'desc', $perPage = '10', $page = '1', $rangeKey = 'created_at', $from = null, $to = null, $includingTest = 'false')
    {
        return $this->getOrdersAsyncWithHttpInfo($sort, $direction, $perPage, $page, $rangeKey, $from, $to, $includingTest)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getOrdersAsyncWithHttpInfo
     *
     * Get order list
     *
     * @param  string $sort 並び順の基準とする項目を指定します。 (optional, default to id)
     * @param  string $direction 項目の並び順を指定します。 (optional, default to desc)
     * @param  int $perPage 1ページあたりの取得項目数。最大50件 (optional, default to 10)
     * @param  int $page ページ番号を指定します。 (optional, default to 1)
     * @param  string $rangeKey 絞り込みを行う日付を指定します。 (optional, default to created_at)
     * @param  string $from 指定すると指定した日付以降の項目を抽出します。 (optional)
     * @param  string $to 指定すると指定した日付以前の項目を抽出します。 (optional)
     * @param  bool $includingTest テストモードで登録した注文を含めるかどうかを指定します。 (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getOrdersAsyncWithHttpInfo($sort = 'id', $direction = 'desc', $perPage = '10', $page = '1', $rangeKey = 'created_at', $from = null, $to = null, $includingTest = 'false')
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\OrderList';
        $request = $this->getOrdersRequest($sort, $direction, $perPage, $page, $rangeKey, $from, $to, $includingTest);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getOrders'
     *
     * @param  string $sort 並び順の基準とする項目を指定します。 (optional, default to id)
     * @param  string $direction 項目の並び順を指定します。 (optional, default to desc)
     * @param  int $perPage 1ページあたりの取得項目数。最大50件 (optional, default to 10)
     * @param  int $page ページ番号を指定します。 (optional, default to 1)
     * @param  string $rangeKey 絞り込みを行う日付を指定します。 (optional, default to created_at)
     * @param  string $from 指定すると指定した日付以降の項目を抽出します。 (optional)
     * @param  string $to 指定すると指定した日付以前の項目を抽出します。 (optional)
     * @param  bool $includingTest テストモードで登録した注文を含めるかどうかを指定します。 (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getOrdersRequest($sort = 'id', $direction = 'desc', $perPage = '10', $page = '1', $rangeKey = 'created_at', $from = null, $to = null, $includingTest = 'false')
    {

        $resourcePath = '/orders';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($sort !== null) {
            $queryParams['sort'] = ObjectSerializer::toQueryValue($sort);
        }
        // query params
        if ($direction !== null) {
            $queryParams['direction'] = ObjectSerializer::toQueryValue($direction);
        }
        // query params
        if ($perPage !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($perPage);
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($rangeKey !== null) {
            $queryParams['range_key'] = ObjectSerializer::toQueryValue($rangeKey);
        }
        // query params
        if ($from !== null) {
            $queryParams['from'] = ObjectSerializer::toQueryValue($from);
        }
        // query params
        if ($to !== null) {
            $queryParams['to'] = ObjectSerializer::toQueryValue($to);
        }
        // query params
        if ($includingTest !== null) {
            $queryParams['including_test'] = ObjectSerializer::toQueryValue($includingTest);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateDeliveryStatus
     *
     * Change delivery address
     *
     * @param  int $orderGroupId 注文のグループIDを指定します (required)
     * @param  int $orderId 注文Idを指定します (required)
     * @param  \Kanekoelastic\PhpCodenberg\Model\ChangeDeliveryAddressRequest $body 配送先の変更内容を指定します。 (required)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Kanekoelastic\PhpCodenberg\Model\OrderDetail
     */
    public function updateDeliveryStatus($orderGroupId, $orderId, $body)
    {
        list($response) = $this->updateDeliveryStatusWithHttpInfo($orderGroupId, $orderId, $body);
        return $response;
    }

    /**
     * Operation updateDeliveryStatusWithHttpInfo
     *
     * Change delivery address
     *
     * @param  int $orderGroupId 注文のグループIDを指定します (required)
     * @param  int $orderId 注文Idを指定します (required)
     * @param  \Kanekoelastic\PhpCodenberg\Model\ChangeDeliveryAddressRequest $body 配送先の変更内容を指定します。 (required)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Kanekoelastic\PhpCodenberg\Model\OrderDetail, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateDeliveryStatusWithHttpInfo($orderGroupId, $orderId, $body)
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\OrderDetail';
        $request = $this->updateDeliveryStatusRequest($orderGroupId, $orderId, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Kanekoelastic\PhpCodenberg\Model\OrderDetail',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateDeliveryStatusAsync
     *
     * Change delivery address
     *
     * @param  int $orderGroupId 注文のグループIDを指定します (required)
     * @param  int $orderId 注文Idを指定します (required)
     * @param  \Kanekoelastic\PhpCodenberg\Model\ChangeDeliveryAddressRequest $body 配送先の変更内容を指定します。 (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateDeliveryStatusAsync($orderGroupId, $orderId, $body)
    {
        return $this->updateDeliveryStatusAsyncWithHttpInfo($orderGroupId, $orderId, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateDeliveryStatusAsyncWithHttpInfo
     *
     * Change delivery address
     *
     * @param  int $orderGroupId 注文のグループIDを指定します (required)
     * @param  int $orderId 注文Idを指定します (required)
     * @param  \Kanekoelastic\PhpCodenberg\Model\ChangeDeliveryAddressRequest $body 配送先の変更内容を指定します。 (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateDeliveryStatusAsyncWithHttpInfo($orderGroupId, $orderId, $body)
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\OrderDetail';
        $request = $this->updateDeliveryStatusRequest($orderGroupId, $orderId, $body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'updateDeliveryStatus'
     *
     * @param  int $orderGroupId 注文のグループIDを指定します (required)
     * @param  int $orderId 注文Idを指定します (required)
     * @param  \Kanekoelastic\PhpCodenberg\Model\ChangeDeliveryAddressRequest $body 配送先の変更内容を指定します。 (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateDeliveryStatusRequest($orderGroupId, $orderId, $body)
    {
        // verify the required parameter 'orderGroupId' is set
        if ($orderGroupId === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $orderGroupId when calling updateDeliveryStatus'
            );
        }
        // verify the required parameter 'orderId' is set
        if ($orderId === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $orderId when calling updateDeliveryStatus'
            );
        }
        // verify the required parameter 'body' is set
        if ($body === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling updateDeliveryStatus'
            );
        }

        $resourcePath = '/orders/{order_group_id}/order/{order_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($orderGroupId !== null) {
            $resourcePath = str_replace(
                '{' . 'order_group_id' . '}',
                ObjectSerializer::toPathValue($orderGroupId),
                $resourcePath
            );
        }
        // path params
        if ($orderId !== null) {
            $resourcePath = str_replace(
                '{' . 'order_id' . '}',
                ObjectSerializer::toPathValue($orderId),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
