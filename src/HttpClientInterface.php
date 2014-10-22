<?php

namespace Saxulum\HttpClient;

interface HttpClientInterface
{
    /**
     * @param  Request  $request
     * @return Response
     */
    public function request(Request $request);
}
