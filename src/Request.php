<?php

namespace Saxulum\HttpClient;

class Request extends AbstractMessage
{
    /**
     * @var string
     */
    protected $method;

    const METHOD_OPTIONS = 'OPTIONS';
    const METHOD_GET = 'GET';
    const METHOD_HEAD = 'HEAD';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';
    const METHOD_PATCH = 'PATCH';

    /**
     * @var Url
     */
    protected $url;

    /**
     * @param string      $protocolVersion
     * @param string      $method
     * @param string      $url
     * @param array       $headers
     * @param string|null $content
     */
    public function __construct(
        $protocolVersion,
        $method,
        $url,
        array $headers = array(),
        $content = null
    ) {
        $this->protocolVersion = $protocolVersion;
        $this->method = strtoupper($method);
        $this->url = new Url($url);
        $this->headers = $headers;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return Url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $request = "{$this->getMethod()} {$this->getUrl()->getResource()} HTTP/{$this->getProtocolVersion()}\r\n";
        $request .= "Host: {$this->getUrl()->getHost()}\r\n";
        foreach ($this->getHeaders() as $headerName => $headerValue) {
            $request .= "{$headerName}: {$headerValue}\r\n";
        }

        if (null !== $this->getContent()) {
            $request .= "\r\n{$this->getContent()}\r\n";
        }

        $request .= "\r\n";

        return $request;
    }
}
