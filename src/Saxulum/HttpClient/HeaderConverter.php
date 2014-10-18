<?php

/**
 * This converter is written based on the http header specification
 * http://www.w3.org/Protocols/rfc2616/rfc2616-sec4.html#sec4.2
 */

namespace Saxulum\HttpClient;

class HeaderConverter
{
    /**
     * @param  array $rawHeaders
     * @return array
     */
    public static function convertRawHeaders(array $rawHeaders)
    {
        $headers = array();
        foreach ($rawHeaders as $rawHeader) {
            if (false === $pos = strpos($rawHeader, ':')) {
                continue;
            }

            $headerName = substr($rawHeader, 0, $pos);
            $headerValue = trim(substr($rawHeader, $pos + 1));

            if (!isset($headers[$headerName])) {
                $headers[$headerName] = $headerValue;
            } else {
                $headers[$headerName] .= ', ' . $headerValue;
            }
        }

        return $headers;
    }

    /**
     * @param  array $headers
     * @return array
     */
    public static function convertHeaders(array $headers)
    {
        $rawHeaders = array();
        foreach ($headers as $headerName => $headerValue) {
            $rawHeaders[] = $headerName . ': ' . $headerValue;
        }

        return $rawHeaders;
    }
}
