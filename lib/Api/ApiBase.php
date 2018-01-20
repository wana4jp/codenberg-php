<?php

namespace Kanekoelastic\PhpCodenberg\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;
use Kanekoelastic\PhpCodenberg\Configuration;

abstract class ApiBase
{
    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @param Configuration   $config
     * @param ClientInterface $client
     */
    public function __construct(
        Configuration $config,
        ClientInterface $client = null
    ) {
        $this->config = $config;
        $this->client = $client ?: new Client();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
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
