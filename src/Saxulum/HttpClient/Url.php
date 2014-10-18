<?php

namespace Saxulum\HttpClient;

class Url
{
    /**
     * @var string
     */
    protected $scheme;

    const SCHEME_HTTP = 'http';
    const SCHEME_HTTPS = 'https';

    /**
     * @var string
     */
    protected $hostName;

    /**
     * @var int
     */
    protected $port;

    const PORT_HTTP = 80;
    const PORT_HTTPS = 443;

    /**
     * @var string|null
     */
    protected $user;

    /**
     * @var string|null
     */
    protected $password;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var string|null
     */
    protected $query;

    /**
     * @var string|null
     */
    protected $fragment;

    /**
     * @param string $url
     */
    public function __construct($url)
    {
        $urlParts = parse_url($url);

        if (false === $urlParts) {
            throw new \InvalidArgumentException(sprintf('The url "%s" is invalid.', $url));
        }

        $this->setUrlPart($urlParts, 'scheme', static::SCHEME_HTTP);
        $this->setUrlPart($urlParts, 'host', function () {
            throw new \Exception('Url has to contain a host!');
        }, 'hostName');
        $this->setUrlPart($urlParts, 'port', function (array $urlParts) {
            if (isset($urlParts['scheme']) && static::SCHEME_HTTPS === $urlParts['scheme']) {
                return static::PORT_HTTPS;
            }

            return static::PORT_HTTP;
        });
        $this->setUrlPart($urlParts, 'user');
        $this->setUrlPart($urlParts, 'pass', null, 'password');
        $this->setUrlPart($urlParts, 'path', '/');
        $this->setUrlPart($urlParts, 'query');
        $this->setUrlPart($urlParts, 'fragment');
    }

    /**
     * @param array                    $urlParts
     * @param string                   $partName
     * @param \Closure|string|int|null $default
     * @param string|null              $property
     */
    protected function setUrlPart($urlParts, $partName, $default = null, $property = null)
    {
        $property = null !== $property ? $property : $partName;

        if (isset($urlParts[$partName])) {
            $this->$property = $urlParts[$partName];

            return;
        }

        if ($default instanceof \Closure) {
            $default = $default($urlParts);
        }

        $this->$property = $default;
    }

    /**
     * @return string
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * @return string
     */
    public function getHostName()
    {
        return $this->hostName;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return string|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string|null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string|null
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @return string|null
     */
    public function getFragment()
    {
        return $this->fragment;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        $host = $this->getScheme() . '://';
        if (null !== $this->getUser()) {
            $host .= $this->getUser() . ':' . $this->getPassword() . '@';
        }
        $host .= $this->getHostName();
        $host .= ':' . $this->getPort();

        return $host;
    }

    /**
     * @return string
     */
    public function getResource()
    {
        $resource = $this->getPath();
        if (null !== $this->getQuery()) {
            $resource .= '?' . $this->getQuery();
        }
        if (null !== $this->getFragment()) {
            $resource .= '#' . $this->getFragment();
        }

        return $resource;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getHost() . $this->getResource();
    }
}
