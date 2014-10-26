<?php

namespace Saxulum\Tests\HttpClient;

use Saxulum\HttpClient\HttpClientInterface;
use Saxulum\HttpClient\HttpInterface;
use Saxulum\HttpClient\Request;
use Saxulum\HttpClient\Response;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function testClient()
    {
        $client = new Client();
        new UseClient($client);

        $client = new OldClient();
        new UseClient($client);

        $client = new Client();
        new UseOldClient($client);

        $client = new OldClient();
        new UseOldClient($client);
    }
}

class Client implements HttpClientInterface
{
    /**
     * @param  Request  $request
     * @return Response
     */
    public function request(Request $request) {}
}

class OldClient implements HttpInterface
{
    /**
     * @param  Request  $request
     * @return Response
     */
    public function request(Request $request) {}
}

class UseClient
{
    /**
     * @param HttpClientInterface $client
     */
    public function __construct(HttpClientInterface $client) {}
}

class UseOldClient
{
    /**
     * @param HttpInterface $client
     */
    public function __construct(HttpInterface $client) {}
}
