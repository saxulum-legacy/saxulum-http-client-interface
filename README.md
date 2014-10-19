# saxulum-http-client-interface

[![Build Status](https://api.travis-ci.org/saxulum/saxulum-http-client-interface.png?branch=master)](https://travis-ci.org/saxulum/saxulum-http-client-interface)
[![Total Downloads](https://poser.pugx.org/saxulum/saxulum-http-client-interface/downloads.png)](https://packagist.org/packages/saxulum/saxulum-http-client-interface)
[![Latest Stable Version](https://poser.pugx.org/saxulum/saxulum-http-client-interface/v/stable.png)](https://packagist.org/packages/saxulum/saxulum-http-client-interface)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/saxulum/saxulum-http-client-interface/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/saxulum/saxulum-http-client-interface/?branch=master)

## Features

 * Provides a simple http client interface
 * Provides a simple request and response object
 * Provides a header converter

## Requirements

 * PHP 5.3+

## Installation

Through [Composer](http://getcomposer.org) as [saxulum/saxulum-http-client-interface][1].

## Usage

``` {.php}
$httpClient = new MyHttpClientImplementation;
$response = $httpClient->request(new Request(
    '1.1',
    Request::METHOD_GET,
    'http://www.wikipedia.org',
    array(
        'Connection' => 'close',
    )
));
```

## Implement

To implement this interface, you need a existing http client and write an adapter for it or use an existing one.

``` {.php}
<?php

namespace Saxulum\HttpClient;

interface HttpInterface
{
    /**
     * @param  Request  $request
     * @return Response
     */
    public function request(Request $request);
}
```


[1]: https://packagist.org/packages/saxulum/saxulum-http-client-interface