<?php

declare(strict_types=1);

namespace RESTBook\Test\Main;

use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    protected const ROOT_URL = 'http://localhost/rest-book/';

    /** @var Client */
    private $oClient;

    protected function setUp()
    {
        $this->oClient = new Client([
            'base_uri' => self::ROOT_URL,
            'exceptions' => false]
        );
    }

    public function testTestEndpoint(): void
    {
        $oResponse = $this->oClient->post($this->getApiUrl('test'));

        $this->assertSame(200, $oResponse->getStatusCode());
        $this->assertSame(['return' => 'It Works!'], json_decode($oResponse->getBody(), true));
    }
}
