<?php

namespace Saxulum\HttpClient;

class HistoryEntry
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @param Request  $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $string = '';
        $string .= trim((string) $this->request);
        $string .= "\n-----\n";
        $string .= trim((string) $this->response);

        return $string;
    }
}
