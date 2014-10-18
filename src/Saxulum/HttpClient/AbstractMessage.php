<?php

namespace Saxulum\HttpClient;

abstract class AbstractMessage
{
    /**
     * @var string
     */
    protected $protocolVersion;

    /**
     * @var array
     */
    protected $headers;

    /**
     * @var string|null
     */
    protected $content;

    /**
     * @return string
     */
    public function getProtocolVersion()
    {
        return $this->protocolVersion;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param  string      $name
     * @param  string|null $default
     * @return string|null
     */
    public function getHeader($name, $default = null)
    {
        return isset($this->headers[$name]) ? $this->headers[$name] : $default;
    }

    /**
     * @param  string $name
     * @return bool
     */
    public function hasHeader($name)
    {
        return isset($this->headers[$name]);
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}
