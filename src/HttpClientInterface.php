<?php

namespace Saxulum\HttpClient;

interface HttpClientInterface
{
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_100 = 'Continue';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_101 = 'Switching Protocols';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_102 = 'Processing';

    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_200 = 'OK';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_201 = 'Created';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_202 = 'Accepted';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_203 = 'Non-Authoritative Information';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_204 = 'No Content';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_205 = 'Reset Content';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_206 = 'Partial Content';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_207 = 'Multi-Status';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_208 = 'Already Reported';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_226 = 'IM Used';

    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_300 = 'Multiple Choices';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_301 = 'Moved Permanently';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_302 = 'Found';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_303 = 'See Other';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_304 = 'Not Modified';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_305 = 'Use Proxy';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_306 = '(reserviert)';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_307 = 'Temporary Redirect';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_308 = 'Permanent Redirect';

    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_400 = 'Bad Request';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_401 = 'Unauthorized';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_402 = 'Payment Required';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_403 = 'Forbidden';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_404 = 'Not Found';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_405 = 'Method Not Allowed';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_406 = 'Not Acceptable';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_407 = 'Proxy Authentication Required';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_408 = 'Request Time-out';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_409 = 'Conflict';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_410 = 'Gone';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_411 = 'Length Required';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_412 = 'Precondition Failed';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_413 = 'Request Entity Too Large';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_414 = 'Request-URL Too Long';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_415 = 'Unsupported Media Type';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_416 = 'Requested range not satisfiable';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_417 = 'Expectation Failed';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_418 = 'I’m a teapot';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_420 = 'Policy Not Fulfilled';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_421 = 'There are too many connections from your internet address';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_422 = 'Unprocessable Entity';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_423 = 'Locked';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_424 = 'Failed Dependency';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_425 = 'Unordered Collection';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_426 = 'Upgrade Required';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_428 = 'Precondition Required';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_429 = 'Too Many Requests';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_431 = 'Request Header Fields Too Large';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_444 = 'No Response';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_449 = 'The request should be retried after doing the appropriate action';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_451 = 'Unavailable For Legal Reasons';

    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_500 = 'Internal Server Error';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_501 = 'Not Implemented';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_502 = 'Bad Gateway';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_503 = 'Service Unavailable';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_504 = 'Gateway Time-out';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_505 = 'HTTP Version not supported';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_506 = 'Variant Also Negotiates';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_507 = 'Insufficient Storage';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_508 = 'Loop Detected';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_509 = 'Bandwidth Limit Exceeded';
    /** @deprecated use Response::STATUS_MESSAGE_ */
    const CODE_510 = 'Not Extended';

    /**
     * @param  Request  $request
     * @return Response
     */
    public function request(Request $request);
}
