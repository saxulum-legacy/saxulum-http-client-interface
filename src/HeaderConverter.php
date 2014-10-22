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
    public static function convertRawToAssociative(array $rawHeaders)
    {
        $associativeHeaders = array();
        foreach ($rawHeaders as $rawHeader) {
            if (false === $pos = strpos($rawHeader, ':')) {
                continue;
            }

            $headerName = substr($rawHeader, 0, $pos);
            $headerValue = trim(substr($rawHeader, $pos + 1));

            if (!isset($associativeHeaders[$headerName])) {
                $associativeHeaders[$headerName] = $headerValue;
            } else {
                $associativeHeaders[$headerName] .= ', ' . $headerValue;
            }
        }

        return $associativeHeaders;
    }

    /**
     * @param  array $associativeHeaders
     * @return array
     */
    public static function convertAssociativeToRaw(array $associativeHeaders)
    {
        $rawHeaders = array();
        foreach ($associativeHeaders as $headerName => $headerValue) {
            $rawHeaders[] = $headerName . ': ' . $headerValue;
        }

        return $rawHeaders;
    }

    /**
     * @param  array $complexAssociativeHeaders
     * @return array
     */
    public static function convertComplexAssociativeToFlatAssociative(array $complexAssociativeHeaders)
    {
        $associativeHeaders = array();
        foreach ($complexAssociativeHeaders as $headerName => $headerValues) {
            $associativeHeaders[$headerName] = implode(', ', $headerValues);
        }

        return $associativeHeaders;
    }
}
