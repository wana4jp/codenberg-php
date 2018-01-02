<?php

namespace Kanekoelastic\PhpCodenberg\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Kanekoelastic\PhpCodenberg\ApiException;
use Kanekoelastic\PhpCodenberg\Configuration;
use Kanekoelastic\PhpCodenberg\HeaderSelector;
use Kanekoelastic\PhpCodenberg\ObjectSerializer;

class FormatsApi
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
     * Operation getFormatById
     *
     * Get format informatino by ID
     *
     * @param  int $formatId フォーマットのIDを指定 (required)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Kanekoelastic\PhpCodenberg\Model\Format
     */
    public function getFormatById($formatId)
    {
        list($response) = $this->getFormatByIdWithHttpInfo($formatId);
        return $response;
    }

    /**
     * Operation getFormatByIdWithHttpInfo
     *
     * Get format informatino by ID
     *
     * @param  int $formatId フォーマットのIDを指定 (required)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Kanekoelastic\PhpCodenberg\Model\Format, HTTP status code, HTTP response headers (array of strings)
     */
    public function getFormatByIdWithHttpInfo($formatId)
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\Format';
        $request = $this->getFormatByIdRequest($formatId);

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
                        '\Kanekoelastic\PhpCodenberg\Model\Format',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getFormatByIdAsync
     *
     * Get format informatino by ID
     *
     * @param  int $formatId フォーマットのIDを指定 (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getFormatByIdAsync($formatId)
    {
        return $this->getFormatByIdAsyncWithHttpInfo($formatId)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getFormatByIdAsyncWithHttpInfo
     *
     * Get format informatino by ID
     *
     * @param  int $formatId フォーマットのIDを指定 (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getFormatByIdAsyncWithHttpInfo($formatId)
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\Format';
        $request = $this->getFormatByIdRequest($formatId);

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
     * Create request for operation 'getFormatById'
     *
     * @param  int $formatId フォーマットのIDを指定 (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getFormatByIdRequest($formatId)
    {
        // verify the required parameter 'formatId' is set
        if ($formatId === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $formatId when calling getFormatById'
            );
        }

        $resourcePath = '/formats/{format_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($formatId !== null) {
            $resourcePath = str_replace(
                '{' . 'format_id' . '}',
                ObjectSerializer::toPathValue($formatId),
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
     * Operation getFormats
     *
     * Get format list by query
     *
     * @param  string $q 検索文字列。format名、用途から検索できます。 (optional)
     * @param  string $sort 並び順の基準とする項目を指定します。 (optional, default to id)
     * @param  string $direction 項目の並び順を指定します。 (optional, default to desc)
     * @param  int $perPage 1ページあたりの取得項目数。最大50件 (optional, default to 10)
     * @param  int $page ページ番号を指定します。 (optional, default to 1)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Kanekoelastic\PhpCodenberg\Model\FormatList
     */
    public function getFormats($q = null, $sort = 'id', $direction = 'desc', $perPage = '10', $page = '1')
    {
        list($response) = $this->getFormatsWithHttpInfo($q, $sort, $direction, $perPage, $page);
        return $response;
    }

    /**
     * Operation getFormatsWithHttpInfo
     *
     * Get format list by query
     *
     * @param  string $q 検索文字列。format名、用途から検索できます。 (optional)
     * @param  string $sort 並び順の基準とする項目を指定します。 (optional, default to id)
     * @param  string $direction 項目の並び順を指定します。 (optional, default to desc)
     * @param  int $perPage 1ページあたりの取得項目数。最大50件 (optional, default to 10)
     * @param  int $page ページ番号を指定します。 (optional, default to 1)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Kanekoelastic\PhpCodenberg\Model\FormatList, HTTP status code, HTTP response headers (array of strings)
     */
    public function getFormatsWithHttpInfo($q = null, $sort = 'id', $direction = 'desc', $perPage = '10', $page = '1')
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\FormatList';
        $request = $this->getFormatsRequest($q, $sort, $direction, $perPage, $page);

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
                        '\Kanekoelastic\PhpCodenberg\Model\FormatList',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getFormatsAsync
     *
     * Get format list by query
     *
     * @param  string $q 検索文字列。format名、用途から検索できます。 (optional)
     * @param  string $sort 並び順の基準とする項目を指定します。 (optional, default to id)
     * @param  string $direction 項目の並び順を指定します。 (optional, default to desc)
     * @param  int $perPage 1ページあたりの取得項目数。最大50件 (optional, default to 10)
     * @param  int $page ページ番号を指定します。 (optional, default to 1)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getFormatsAsync($q = null, $sort = 'id', $direction = 'desc', $perPage = '10', $page = '1')
    {
        return $this->getFormatsAsyncWithHttpInfo($q, $sort, $direction, $perPage, $page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getFormatsAsyncWithHttpInfo
     *
     * Get format list by query
     *
     * @param  string $q 検索文字列。format名、用途から検索できます。 (optional)
     * @param  string $sort 並び順の基準とする項目を指定します。 (optional, default to id)
     * @param  string $direction 項目の並び順を指定します。 (optional, default to desc)
     * @param  int $perPage 1ページあたりの取得項目数。最大50件 (optional, default to 10)
     * @param  int $page ページ番号を指定します。 (optional, default to 1)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getFormatsAsyncWithHttpInfo($q = null, $sort = 'id', $direction = 'desc', $perPage = '10', $page = '1')
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\FormatList';
        $request = $this->getFormatsRequest($q, $sort, $direction, $perPage, $page);

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
     * Create request for operation 'getFormats'
     *
     * @param  string $q 検索文字列。format名、用途から検索できます。 (optional)
     * @param  string $sort 並び順の基準とする項目を指定します。 (optional, default to id)
     * @param  string $direction 項目の並び順を指定します。 (optional, default to desc)
     * @param  int $perPage 1ページあたりの取得項目数。最大50件 (optional, default to 10)
     * @param  int $page ページ番号を指定します。 (optional, default to 1)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getFormatsRequest($q = null, $sort = 'id', $direction = 'desc', $perPage = '10', $page = '1')
    {

        $resourcePath = '/formats';
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
