<?php

namespace Kanekoelastic\PhpCodenberg;

use Kanekoelastic\PhpCodenberg\Model\AccessToken;

class AccessTokenTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Setup before running each test case.
     */
    public function setUp()
    {
        $data = [
            'tokenType'   => 'foo',
            'accessToken' => 'bar',
            'expires'     => 'baz',
        ];
        $this->model = new AccessToken($data);
    }

    /**
     * Test "getTokenType".
     */
    public function testGetTokenType()
    {
        $this->assertSame('foo', $this->model->getTokenType());
    }

    /**
     * Test attribute "tokenType".
     */
    public function testPropertyTokenType()
    {
    }

    /**
     * Test attribute "accessToken".
     */
    public function testPropertyAccessToken()
    {
    }

    /**
     * Test attribute "expires".
     */
    public function testPropertyExpires()
    {
    }
}
