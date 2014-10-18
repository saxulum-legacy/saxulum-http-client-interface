<?php

namespace Saxulum\Tests\HttpClient;

use Saxulum\HttpClient\HeaderConverter;
use Saxulum\HttpClient\HttpInterface;
use Saxulum\HttpClient\Request;
use Saxulum\HttpClient\Response;
use Saxulum\HttpClient\Url;

class HttpClient implements HttpInterface
{
    public function request(Request $request)
    {
        $requestContext = $this->prepareStreamContext($request);
        $level = error_reporting(0);
        $responseContent = file_get_contents((string) $request->getUrl(), null, $requestContext);
        error_reporting($level);
        if (false === $responseContent) {
            $error = error_get_last();
            throw new \ErrorException($error['message']);
        }

        $rawHeaders = $http_response_header;
        $protocolRow = array_shift($rawHeaders);
        $parsedProtocol = $this->parseProtocolRow($protocolRow);

        return new Response(
            $parsedProtocol['protocolVersion'],
            $parsedProtocol['statusCode'],
            $parsedProtocol['statusMessage'],
            HeaderConverter::convertRawHeaders($rawHeaders),
            $responseContent
        );
    }

    /**
     * @param  Request  $request
     * @return resource
     */
    protected function prepareStreamContext(Request $request)
    {
        $url = $request->getUrl();
        $headers = array_replace(
            $this->getBasicAuthHeader($url),
            $request->getHeaders()
        );

        return stream_context_create(array(
            'http' => array(
                'method' => $request->getMethod(),
                'header' => implode("\r\n", HeaderConverter::convertHeaders($headers)),
                'content' => $request->getContent(),
                'protocol_version' => $request->getProtocolVersion(),
                'ignore_errors' => false,
                'max_redirects' => 10,
                'timeout'=> 5,
            ),
            'ssl' => array(
                'verify_peer' => false,
            ),
        ));
    }

    /**
     * @param  Url   $url
     * @return array
     */
    protected function getBasicAuthHeader(Url $url)
    {
        $headerParts = array();
        if (null !== $url->getUser()) {
            $basicAuth = base64_encode($url->getUser() . ':' . $url->getPassword());
            $headerParts['Authorization'] = 'Basic ' . $basicAuth;
        }

        return $headerParts;
    }

    /**
     * @param  string $protocolRow
     * @return array
     */
    protected function parseProtocolRow($protocolRow)
    {
        $protocolRowParts = explode(' ', $protocolRow);

        if (3 !== count($protocolRowParts)) {
            throw new \InvalidArgumentException(sprintf('The protocol row "%s" is invalid.', $protocolRow));
        }

        $protocol = $protocolRowParts[0];
        $protocolVersion = substr($protocol, strrpos($protocol, '/') + 1);

        return array(
            'protocolVersion' => $protocolVersion,
            'statusCode' => (int) $protocolRowParts[1],
            'statusMessage' => strtoupper($protocolRowParts[2]),
        );
    }
}
