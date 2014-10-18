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
