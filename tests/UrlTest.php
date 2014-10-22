<?php

namespace Saxulum\Tests\HttpClient;

use Saxulum\HttpClient\Url;

class UrlTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $url
     * @param array  $expected
     * @dataProvider urlProvider
     */
    public function testUrl($url, array $expected)
    {
        $url = new Url($url);

        $this->assertEquals($expected['scheme'], $url->getScheme());
        $this->assertEquals($expected['user'], $url->getUser());
        $this->assertEquals($expected['password'], $url->getPassword());
        $this->assertEquals($expected['hostName'], $url->getHostName());
        $this->assertEquals($expected['port'], $url->getPort());
        $this->assertEquals($expected['path'], $url->getPath());
        $this->assertEquals($expected['query'], $url->getQuery());
        $this->assertEquals($expected['fragment'], $url->getFragment());
        $this->assertEquals($expected['host'], $url->getHost());
        $this->assertEquals($expected['resource'], $url->getResource());
        $this->assertEquals($expected['url'], (string) $url);
    }

    public function testInvalidUrl()
    {
        $this->setExpectedException(
            '\InvalidArgumentException',
            'The url "test://" is invalid.'
        );

        new Url('test://');
    }

    public function testUrlWithNoHost()
    {
        $this->setExpectedException(
            '\InvalidArgumentException',
            'Url has to contain a host!'
        );

        new Url('test');
    }

    /**
     * @return array
     */
    public function urlProvider()
    {
        return array(
            array(
                'http://user:password@hostname:80/path?query=1#fragement',
                array(
                    'scheme' => 'http',
                    'user' => 'user',
                    'password' => 'password',
                    'hostName' => 'hostname',
                    'port' => 80,
                    'path' => '/path',
                    'query' => 'query=1',
                    'fragment' => 'fragement',
                    'host' => 'http://user:password@hostname:80',
                    'resource' => '/path?query=1#fragement',
                    'url' => 'http://user:password@hostname:80/path?query=1#fragement'
                ),
            ),
            array(
                'http://hostname/path?query=1#fragement',
                array(
                    'scheme' => 'http',
                    'user' => null,
                    'password' => null,
                    'hostName' => 'hostname',
                    'port' => 80,
                    'path' => '/path',
                    'query' => 'query=1',
                    'fragment' => 'fragement',
                    'host' => 'http://hostname:80',
                    'resource' => '/path?query=1#fragement',
                    'url' => 'http://hostname:80/path?query=1#fragement'
                ),
            ),
            array(
                'https://hostname',
                array(
                    'scheme' => 'http',
                    'user' => null,
                    'password' => null,
                    'hostName' => 'hostname',
                    'port' => 80,
                    'path' => '/',
                    'query' => null,
                    'fragment' => null,
                    'host' => 'https://hostname:80',
                    'resource' => '/',
                    'url' => 'https://hostname:80/'
                ),
            ),
        );
    }
}
