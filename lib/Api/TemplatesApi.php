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

class TemplatesApi
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
     * Operation getTemplateById.
     *
     * Find template by ID
     *
     * @param int  $templateId            テンプレートのIDを指定します。 (required)
     * @param bool $includingCustomFields 可変領域の情報を含めるかを設定します。 (optional, default to true)
     * @param bool $includingFormats      フォーマットの情報を含めるかを設定します。 (optional, default to false)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Kanekoelastic\PhpCodenberg\Model\Template
     */
    public function getTemplateById($templateId, $includingCustomFields = 'true', $includingFormats = 'false')
    {
        list($response) = $this->getTemplateByIdWithHttpInfo($templateId, $includingCustomFields, $includingFormats);
        return $response;
    }

    /**
     * Operation getTemplateByIdWithHttpInfo.
     *
     * Find template by ID
     *
     * @param int  $templateId            テンプレートのIDを指定します。 (required)
     * @param bool $includingCustomFields 可変領域の情報を含めるかを設定します。 (optional, default to true)
     * @param bool $includingFormats      フォーマットの情報を含めるかを設定します。 (optional, default to false)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Kanekoelastic\PhpCodenberg\Model\Template, HTTP status code, HTTP response headers (array of strings)
     */
    public function getTemplateByIdWithHttpInfo($templateId, $includingCustomFields = 'true', $includingFormats = 'false')
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\Template';
        $request = $this->getTemplateByIdRequest($templateId, $includingCustomFields, $includingFormats);

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
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Kanekoelastic\PhpCodenberg\Model\Template',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getTemplateByIdAsync.
     *
     * Find template by ID
     *
     * @param int  $templateId            テンプレートのIDを指定します。 (required)
     * @param bool $includingCustomFields 可変領域の情報を含めるかを設定します。 (optional, default to true)
     * @param bool $includingFormats      フォーマットの情報を含めるかを設定します。 (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTemplateByIdAsync($templateId, $includingCustomFields = 'true', $includingFormats = 'false')
    {
        return $this->getTemplateByIdAsyncWithHttpInfo($templateId, $includingCustomFields, $includingFormats)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTemplateByIdAsyncWithHttpInfo.
     *
     * Find template by ID
     *
     * @param int  $templateId            テンプレートのIDを指定します。 (required)
     * @param bool $includingCustomFields 可変領域の情報を含めるかを設定します。 (optional, default to true)
     * @param bool $includingFormats      フォーマットの情報を含めるかを設定します。 (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTemplateByIdAsyncWithHttpInfo($templateId, $includingCustomFields = 'true', $includingFormats = 'false')
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\Template';
        $request = $this->getTemplateByIdRequest($templateId, $includingCustomFields, $includingFormats);

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
                        $response->getHeaders(),
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
     * Operation getTemplates.
     *
     * Get template list by query.
     *
     * @param string $q                     検索文字列を指定します。template名、キーワードが対象となります。 (optional)
     * @param string $sort                  id/format_id/name/keywords/created_atを指定できます。 (optional, default to id)
     * @param string $direction             項目の並び順を指定します。asc(昇順)/desc(降順) (optional, default to desc)
     * @param int    $perPage               1ページあたりの取得項目数。最大:50件 (optional, default to 10)
     * @param int    $page                  ページ番号を指定。 (optional, default to 1)
     * @param bool   $includingPrivate      非公開のテンプレートを含めるかどうかを指定します。 (optional, default to false)
     * @param bool   $includingCustomFields 可変領域の情報を含めるかを設定します。 (optional, default to false)
     * @param bool   $includingFormats      フォーマットの情報を含めるかを設定します。 (optional, default to false)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Kanekoelastic\PhpCodenberg\Model\TemplateList
     */
    public function getTemplates($q = null, $sort = 'id', $direction = 'desc', $perPage = '10', $page = '1', $includingPrivate = 'false', $includingCustomFields = 'false', $includingFormats = 'false')
    {
        list($response) = $this->getTemplatesWithHttpInfo($q, $sort, $direction, $perPage, $page, $includingPrivate, $includingCustomFields, $includingFormats);
        return $response;
    }

    /**
     * Operation getTemplatesWithHttpInfo.
     *
     * Get template list by query.
     *
     * @param string $q                     検索文字列を指定します。template名、キーワードが対象となります。 (optional)
     * @param string $sort                  id/format_id/name/keywords/created_atを指定できます。 (optional, default to id)
     * @param string $direction             項目の並び順を指定します。asc(昇順)/desc(降順) (optional, default to desc)
     * @param int    $perPage               1ページあたりの取得項目数。最大:50件 (optional, default to 10)
     * @param int    $page                  ページ番号を指定。 (optional, default to 1)
     * @param bool   $includingPrivate      非公開のテンプレートを含めるかどうかを指定します。 (optional, default to false)
     * @param bool   $includingCustomFields 可変領域の情報を含めるかを設定します。 (optional, default to false)
     * @param bool   $includingFormats      フォーマットの情報を含めるかを設定します。 (optional, default to false)
     *
     * @throws \Kanekoelastic\PhpCodenberg\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Kanekoelastic\PhpCodenberg\Model\TemplateList, HTTP status code, HTTP response headers (array of strings)
     */
    public function getTemplatesWithHttpInfo($q = null, $sort = 'id', $direction = 'desc', $perPage = '10', $page = '1', $includingPrivate = 'false', $includingCustomFields = 'false', $includingFormats = 'false')
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\TemplateList';
        $request = $this->getTemplatesRequest($q, $sort, $direction, $perPage, $page, $includingPrivate, $includingCustomFields, $includingFormats);

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
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Kanekoelastic\PhpCodenberg\Model\TemplateList',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getTemplatesAsync.
     *
     * Get template list by query.
     *
     * @param string $q                     検索文字列を指定します。template名、キーワードが対象となります。 (optional)
     * @param string $sort                  id/format_id/name/keywords/created_atを指定できます。 (optional, default to id)
     * @param string $direction             項目の並び順を指定します。asc(昇順)/desc(降順) (optional, default to desc)
     * @param int    $perPage               1ページあたりの取得項目数。最大:50件 (optional, default to 10)
     * @param int    $page                  ページ番号を指定。 (optional, default to 1)
     * @param bool   $includingPrivate      非公開のテンプレートを含めるかどうかを指定します。 (optional, default to false)
     * @param bool   $includingCustomFields 可変領域の情報を含めるかを設定します。 (optional, default to false)
     * @param bool   $includingFormats      フォーマットの情報を含めるかを設定します。 (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTemplatesAsync($q = null, $sort = 'id', $direction = 'desc', $perPage = '10', $page = '1', $includingPrivate = 'false', $includingCustomFields = 'false', $includingFormats = 'false')
    {
        return $this->getTemplatesAsyncWithHttpInfo($q, $sort, $direction, $perPage, $page, $includingPrivate, $includingCustomFields, $includingFormats)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTemplatesAsyncWithHttpInfo.
     *
     * Get template list by query.
     *
     * @param string $q                     検索文字列を指定します。template名、キーワードが対象となります。 (optional)
     * @param string $sort                  id/format_id/name/keywords/created_atを指定できます。 (optional, default to id)
     * @param string $direction             項目の並び順を指定します。asc(昇順)/desc(降順) (optional, default to desc)
     * @param int    $perPage               1ページあたりの取得項目数。最大:50件 (optional, default to 10)
     * @param int    $page                  ページ番号を指定。 (optional, default to 1)
     * @param bool   $includingPrivate      非公開のテンプレートを含めるかどうかを指定します。 (optional, default to false)
     * @param bool   $includingCustomFields 可変領域の情報を含めるかを設定します。 (optional, default to false)
     * @param bool   $includingFormats      フォーマットの情報を含めるかを設定します。 (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTemplatesAsyncWithHttpInfo($q = null, $sort = 'id', $direction = 'desc', $perPage = '10', $page = '1', $includingPrivate = 'false', $includingCustomFields = 'false', $includingFormats = 'false')
    {
        $returnType = '\Kanekoelastic\PhpCodenberg\Model\TemplateList';
        $request = $this->getTemplatesRequest($q, $sort, $direction, $perPage, $page, $includingPrivate, $includingCustomFields, $includingFormats);

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
                        $response->getHeaders(),
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
     * Create request for operation 'getTemplateById'.
     *
     * @param int  $templateId            テンプレートのIDを指定します。 (required)
     * @param bool $includingCustomFields 可変領域の情報を含めるかを設定します。 (optional, default to true)
     * @param bool $includingFormats      フォーマットの情報を含めるかを設定します。 (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTemplateByIdRequest($templateId, $includingCustomFields = 'true', $includingFormats = 'false')
    {
        // verify the required parameter 'templateId' is set
        if ($templateId === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $templateId when calling getTemplateById'
            );
        }

        $resourcePath = '/templates/{template_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($includingCustomFields !== null) {
            $queryParams['including_custom_fields'] = ObjectSerializer::toQueryValue($includingCustomFields);
        }
        // query params
        if ($includingFormats !== null) {
            $queryParams['including_formats'] = ObjectSerializer::toQueryValue($includingFormats);
        }

        // path params
        if ($templateId !== null) {
            $resourcePath = str_replace(
                '{' . 'template_id' . '}',
                ObjectSerializer::toPathValue($templateId),
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
                        'contents' => $formParamValue,
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
     * Create request for operation 'getTemplates'.
     *
     * @param string $q                     検索文字列を指定します。template名、キーワードが対象となります。 (optional)
     * @param string $sort                  id/format_id/name/keywords/created_atを指定できます。 (optional, default to id)
     * @param string $direction             項目の並び順を指定します。asc(昇順)/desc(降順) (optional, default to desc)
     * @param int    $perPage               1ページあたりの取得項目数。最大:50件 (optional, default to 10)
     * @param int    $page                  ページ番号を指定。 (optional, default to 1)
     * @param bool   $includingPrivate      非公開のテンプレートを含めるかどうかを指定します。 (optional, default to false)
     * @param bool   $includingCustomFields 可変領域の情報を含めるかを設定します。 (optional, default to false)
     * @param bool   $includingFormats      フォーマットの情報を含めるかを設定します。 (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTemplatesRequest($q = null, $sort = 'id', $direction = 'desc', $perPage = '10', $page = '1', $includingPrivate = 'false', $includingCustomFields = 'false', $includingFormats = 'false')
    {
        $resourcePath = '/templates';
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
        // query params
        if ($includingPrivate !== null) {
            $queryParams['including_private'] = ObjectSerializer::toQueryValue($includingPrivate);
        }
        // query params
        if ($includingCustomFields !== null) {
            $queryParams['including_custom_fields'] = ObjectSerializer::toQueryValue($includingCustomFields);
        }
        // query params
        if ($includingFormats !== null) {
            $queryParams['including_formats'] = ObjectSerializer::toQueryValue($includingFormats);
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
                        'contents' => $formParamValue,
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
     * Create http client option.
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
