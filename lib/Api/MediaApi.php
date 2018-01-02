<?php

class MediaApi
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
     * Operation getMedia
     *
     * Get media list
     *
     * @param  string $q 指定して文字でファイル名を対象に検索します。 (optional)
     * @param  string $sort 並び順の基準とする項目を指定します。 (optional, default to id)
     * @param  string $direction 項目の並び順を指定します。 (optional, default to desc)
     * @param  int $perPage 1ページあたりの取得項目数。最大50件 (optional, default to 10)
     * @param  int $page ページ番号を指定します。 (optional, default to 1)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Kanekoelastic\PhpCodenberg\Model\MediaList
     */
    public function getMedia($q = null, $sort = 'id', $direction = 'desc', $perPage = '10', $page = '1')
    {
        list($response) = $this->getMediaWithHttpInfo($q, $sort, $direction, $perPage, $page);
        return $response;
    }

    /**
     * Operation getMediaWithHttpInfo
     *
     * Get media list
     *
     * @param  string $q 指定して文字でファイル名を対象に検索します。 (optional)
     * @param  string $sort 並び順の基準とする項目を指定します。 (optional, default to id)
     * @param  string $direction 項目の並び順を指定します。 (optional, default to desc)
     * @param  int $perPage 1ページあたりの取得項目数。最大50件 (optional, default to 10)
     * @param  int $page ページ番号を指定します。 (optional, default to 1)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Kanekoelastic\PhpCodenberg\Model\MediaList, HTTP status code, HTTP response headers (array of strings)
     */
    public function getMediaWithHttpInfo($q = null, $sort = 'id', $direction = 'desc', $perPage = '10', $page = '1')
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\MediaList';
        $request = $this->getMediaRequest($q, $sort, $direction, $perPage, $page);

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
                        '\Kanekoelastic\PhpCodenberg\Model\MediaList',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getMediaAsync
     *
     * Get media list
     *
     * @param  string $q 指定して文字でファイル名を対象に検索します。 (optional)
     * @param  string $sort 並び順の基準とする項目を指定します。 (optional, default to id)
     * @param  string $direction 項目の並び順を指定します。 (optional, default to desc)
     * @param  int $perPage 1ページあたりの取得項目数。最大50件 (optional, default to 10)
     * @param  int $page ページ番号を指定します。 (optional, default to 1)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMediaAsync($q = null, $sort = 'id', $direction = 'desc', $perPage = '10', $page = '1')
    {
        return $this->getMediaAsyncWithHttpInfo($q, $sort, $direction, $perPage, $page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMediaAsyncWithHttpInfo
     *
     * Get media list
     *
     * @param  string $q 指定して文字でファイル名を対象に検索します。 (optional)
     * @param  string $sort 並び順の基準とする項目を指定します。 (optional, default to id)
     * @param  string $direction 項目の並び順を指定します。 (optional, default to desc)
     * @param  int $perPage 1ページあたりの取得項目数。最大50件 (optional, default to 10)
     * @param  int $page ページ番号を指定します。 (optional, default to 1)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMediaAsyncWithHttpInfo($q = null, $sort = 'id', $direction = 'desc', $perPage = '10', $page = '1')
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\MediaList';
        $request = $this->getMediaRequest($q, $sort, $direction, $perPage, $page);

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
     * Create request for operation 'getMedia'
     *
     * @param  string $q 指定して文字でファイル名を対象に検索します。 (optional)
     * @param  string $sort 並び順の基準とする項目を指定します。 (optional, default to id)
     * @param  string $direction 項目の並び順を指定します。 (optional, default to desc)
     * @param  int $perPage 1ページあたりの取得項目数。最大50件 (optional, default to 10)
     * @param  int $page ページ番号を指定します。 (optional, default to 1)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getMediaRequest($q = null, $sort = 'id', $direction = 'desc', $perPage = '10', $page = '1')
    {

        $resourcePath = '/media';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($q !== null) {
            $queryParams['q'] = ObjectSerializer::toQueryValue($q);
        }
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
     * Operation getMediaById
     *
     * Get media information by ID
     *
     * @param  int $mediaId 取得するメディアIDを指定します (required)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Kanekoelastic\PhpCodenberg\Model\Medium
     */
    public function getMediaById($mediaId)
    {
        list($response) = $this->getMediaByIdWithHttpInfo($mediaId);
        return $response;
    }

    /**
     * Operation getMediaByIdWithHttpInfo
     *
     * Get media information by ID
     *
     * @param  int $mediaId 取得するメディアIDを指定します (required)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Kanekoelastic\PhpCodenberg\Model\Medium, HTTP status code, HTTP response headers (array of strings)
     */
    public function getMediaByIdWithHttpInfo($mediaId)
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\Medium';
        $request = $this->getMediaByIdRequest($mediaId);

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
                        '\Kanekoelastic\PhpCodenberg\Model\Medium',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getMediaByIdAsync
     *
     * Get media information by ID
     *
     * @param  int $mediaId 取得するメディアIDを指定します (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMediaByIdAsync($mediaId)
    {
        return $this->getMediaByIdAsyncWithHttpInfo($mediaId)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMediaByIdAsyncWithHttpInfo
     *
     * Get media information by ID
     *
     * @param  int $mediaId 取得するメディアIDを指定します (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMediaByIdAsyncWithHttpInfo($mediaId)
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\Medium';
        $request = $this->getMediaByIdRequest($mediaId);

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
     * Create request for operation 'getMediaById'
     *
     * @param  int $mediaId 取得するメディアIDを指定します (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getMediaByIdRequest($mediaId)
    {
        // verify the required parameter 'mediaId' is set
        if ($mediaId === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $mediaId when calling getMediaById'
            );
        }

        $resourcePath = '/media/{media_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($mediaId !== null) {
            $resourcePath = str_replace(
                '{' . 'media_id' . '}',
                ObjectSerializer::toPathValue($mediaId),
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
