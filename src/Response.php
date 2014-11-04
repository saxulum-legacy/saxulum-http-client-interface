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

    const STATUS_MESSAGE_100 = 'Continue';
    const STATUS_MESSAGE_101 = 'Switching Protocols';
    const STATUS_MESSAGE_102 = 'Processing';

    const STATUS_MESSAGE_200 = 'OK';
    const STATUS_MESSAGE_201 = 'Created';
    const STATUS_MESSAGE_202 = 'Accepted';
    const STATUS_MESSAGE_203 = 'Non-Authoritative Information';
    const STATUS_MESSAGE_204 = 'No Content';
    const STATUS_MESSAGE_205 = 'Reset Content';
    const STATUS_MESSAGE_206 = 'Partial Content';
    const STATUS_MESSAGE_207 = 'Multi-Status';
    const STATUS_MESSAGE_208 = 'Already Reported';
    const STATUS_MESSAGE_226 = 'IM Used';

    const STATUS_MESSAGE_300 = 'Multiple Choices';
    const STATUS_MESSAGE_301 = 'Moved Permanently';
    const STATUS_MESSAGE_302 = 'Found';
    const STATUS_MESSAGE_303 = 'See Other';
    const STATUS_MESSAGE_304 = 'Not Modified';
    const STATUS_MESSAGE_305 = 'Use Proxy';
    const STATUS_MESSAGE_306 = '(reserved)';
    const STATUS_MESSAGE_307 = 'Temporary Redirect';
    const STATUS_MESSAGE_308 = 'Permanent Redirect';

    const STATUS_MESSAGE_400 = 'Bad Request';
    const STATUS_MESSAGE_401 = 'Unauthorized';
    const STATUS_MESSAGE_402 = 'Payment Required';
    const STATUS_MESSAGE_403 = 'Forbidden';
    const STATUS_MESSAGE_404 = 'Not Found';
    const STATUS_MESSAGE_405 = 'Method Not Allowed';
    const STATUS_MESSAGE_406 = 'Not Acceptable';
    const STATUS_MESSAGE_407 = 'Proxy Authentication Required';
    const STATUS_MESSAGE_408 = 'Request Time-out';
    const STATUS_MESSAGE_409 = 'Conflict';
    const STATUS_MESSAGE_410 = 'Gone';
    const STATUS_MESSAGE_411 = 'Length Required';
    const STATUS_MESSAGE_412 = 'Precondition Failed';
    const STATUS_MESSAGE_413 = 'Request Entity Too Large';
    const STATUS_MESSAGE_414 = 'Request-URL Too Long';
    const STATUS_MESSAGE_415 = 'Unsupported Media Type';
    const STATUS_MESSAGE_416 = 'Requested range not satisfiable';
    const STATUS_MESSAGE_417 = 'Expectation Failed';
    const STATUS_MESSAGE_418 = 'I’m a teapot';
    const STATUS_MESSAGE_420 = 'Policy Not Fulfilled';
    const STATUS_MESSAGE_421 = 'There are too many connections from your internet address';
    const STATUS_MESSAGE_422 = 'Unprocessable Entity';
    const STATUS_MESSAGE_423 = 'Locked';
    const STATUS_MESSAGE_424 = 'Failed Dependency';
    const STATUS_MESSAGE_425 = 'Unordered Collection';
    const STATUS_MESSAGE_426 = 'Upgrade Required';
    const STATUS_MESSAGE_428 = 'Precondition Required';
    const STATUS_MESSAGE_429 = 'Too Many Requests';
    const STATUS_MESSAGE_431 = 'Request Header Fields Too Large';
    const STATUS_MESSAGE_444 = 'No Response';
    const STATUS_MESSAGE_449 = 'The request should be retried after doing the appropriate action';
    const STATUS_MESSAGE_451 = 'Unavailable For Legal Reasons';

    const STATUS_MESSAGE_500 = 'Internal Server Error';
    const STATUS_MESSAGE_501 = 'Not Implemented';
    const STATUS_MESSAGE_502 = 'Bad Gateway';
    const STATUS_MESSAGE_503 = 'Service Unavailable';
    const STATUS_MESSAGE_504 = 'Gateway Time-out';
    const STATUS_MESSAGE_505 = 'HTTP Version not supported';
    const STATUS_MESSAGE_506 = 'Variant Also Negotiates';
    const STATUS_MESSAGE_507 = 'Insufficient Storage';
    const STATUS_MESSAGE_508 = 'Loop Detected';
    const STATUS_MESSAGE_509 = 'Bandwidth Limit Exceeded';
    const STATUS_MESSAGE_510 = 'Not Extended';

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

    /**
     * @return string
     */
    public function __toString()
    {
        $response = "HTTP/{$this->getProtocolVersion()} {$this->getStatusCode()} {$this->getStatusMessage()}\r\n";
        foreach ($this->getHeaders() as $headerName => $headerValue) {
            $response .= "{$headerName}: {$headerValue}\r\n";
        }

        if (null !== $this->getContent()) {
            $response .= "\r\n{$this->getContent()}\r\n";
        }

        $response .= "\r\n";

        return $response;
    }
}
