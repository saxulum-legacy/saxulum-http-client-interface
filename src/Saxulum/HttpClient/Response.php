<?php

namespace Saxulum\HttpClient;

class Response extends AbstractMessage
{
    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $statusMessage;

    /**
     * @param string      $protocolVersion
     * @param int         $statusCode
     * @param string      $statusMessage
     * @param array       $headers
     * @param string|null $content
     */
    public function __construct(
        $protocolVersion,
        $statusCode,
        $statusMessage,
        array $headers,
        $content
    ) {
        $this->protocolVersion = $protocolVersion;
        $this->statusCode = $statusCode;
        $this->statusMessage = $statusMessage;
        $this->headers = $headers;
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getStatusMessage()
    {
        return $this->statusMessage;
    }
}
