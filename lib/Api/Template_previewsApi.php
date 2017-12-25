<?php
/**
 * Template_previewsApi
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * コーデンベルク APIリファレンス
 *
 * 印刷APIプラットフォーム「[コーデンベルク](https://codenberg.io/)」はさまざまなシステムと連携することができるように、WebAPIを公開しています。コーデンベルク APIを使って、印刷物の注文はもちろん、テンプレートの登録や可変領域の設定ができます。コーデンベルク APIは、RESTfulな設計なのでかんたんにシステム連携できます。
 *
 * OpenAPI spec version: 1.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Api;

use \Swagger\Client\ApiClient;
use \Swagger\Client\ApiException;
use \Swagger\Client\Configuration;
use \Swagger\Client\ObjectSerializer;

/**
 * Template_previewsApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Template_previewsApi
{
    /**
     * API Client
     *
     * @var \Swagger\Client\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \Swagger\Client\ApiClient|null $apiClient The api client to use
     */
    public function __construct(\Swagger\Client\ApiClient $apiClient = null)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \Swagger\Client\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \Swagger\Client\ApiClient $apiClient set the API client
     *
     * @return Template_previewsApi
     */
    public function setApiClient(\Swagger\Client\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation createTemplatePreview
     *
     * Request creating template preview
     *
     * @param \Swagger\Client\Model\PreviewRequest $body プレビューの生成条件を指定します。 (required)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\TemplatePreview
     */
    public function createTemplatePreview($body)
    {
        list($response) = $this->createTemplatePreviewWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation createTemplatePreviewWithHttpInfo
     *
     * Request creating template preview
     *
     * @param \Swagger\Client\Model\PreviewRequest $body プレビューの生成条件を指定します。 (required)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\TemplatePreview, HTTP status code, HTTP response headers (array of strings)
     */
    public function createTemplatePreviewWithHttpInfo($body)
    {
        // verify the required parameter 'body' is set
        if ($body === null) {
            throw new \InvalidArgumentException('Missing the required parameter $body when calling createTemplatePreview');
        }
        // parse inputs
        $resourcePath = "/template_previews";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType([]);

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires OAuth (access token)
        if (strlen($this->apiClient->getConfig()->getAccessToken()) !== 0) {
            $headerParams['Authorization'] = 'Bearer ' . $this->apiClient->getConfig()->getAccessToken();
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\TemplatePreview',
                '/template_previews'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\TemplatePreview', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 202:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\TemplatePreview', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getTemplatePreview
     *
     * Get preview
     *
     * @param int $template_preview_id プレビューのIDを指定 (required)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\TemplatePreview
     */
    public function getTemplatePreview($template_preview_id)
    {
        list($response) = $this->getTemplatePreviewWithHttpInfo($template_preview_id);
        return $response;
    }

    /**
     * Operation getTemplatePreviewWithHttpInfo
     *
     * Get preview
     *
     * @param int $template_preview_id プレビューのIDを指定 (required)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\TemplatePreview, HTTP status code, HTTP response headers (array of strings)
     */
    public function getTemplatePreviewWithHttpInfo($template_preview_id)
    {
        // verify the required parameter 'template_preview_id' is set
        if ($template_preview_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $template_preview_id when calling getTemplatePreview');
        }
        // parse inputs
        $resourcePath = "/template_previews/{template_preview_id}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType([]);

        // path params
        if ($template_preview_id !== null) {
            $resourcePath = str_replace(
                "{" . "template_preview_id" . "}",
                $this->apiClient->getSerializer()->toPathValue($template_preview_id),
                $resourcePath
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires OAuth (access token)
        if (strlen($this->apiClient->getConfig()->getAccessToken()) !== 0) {
            $headerParams['Authorization'] = 'Bearer ' . $this->apiClient->getConfig()->getAccessToken();
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\TemplatePreview',
                '/template_previews/{template_preview_id}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\TemplatePreview', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\TemplatePreview', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}