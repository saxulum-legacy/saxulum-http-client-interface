<?php

namespace Saxulum\HttpClient;

interface HttpClientInterface
{
    const CODE_100 = 'Continue';
    const CODE_101 = 'Switching Protocols';
    const CODE_102 = 'Processing';

    const CODE_200 = 'OK';
    const CODE_201 = 'Created';
    const CODE_202 = 'Accepted';
    const CODE_203 = 'Non-Authoritative';
    const CODE_204 = 'No';
    const CODE_205 = 'Reset';
    const CODE_206 = 'Partial';
    const CODE_207 = 'Multi-Status';
    const CODE_208 = 'Already';
    const CODE_226 = 'IM';

    const CODE_300 = 'Multiple';
    const CODE_301 = 'Moved';
    const CODE_302 = 'Found';
    const CODE_303 = 'See';
    const CODE_304 = 'Not';
    const CODE_305 = 'Use';
    const CODE_306 = '(reserviert)';
    const CODE_307 = 'Temporary';
    const CODE_308 = 'Permanent';

    const CODE_400 = 'Bad';
    const CODE_401 = 'Unauthorized';
    const CODE_402 = 'Payment';
    const CODE_403 = 'Forbidden';
    const CODE_404 = 'Not';
    const CODE_405 = 'Method';
    const CODE_406 = 'Not';
    const CODE_407 = 'Proxy';
    const CODE_408 = 'Request';
    const CODE_409 = 'Conflict';
    const CODE_410 = 'Gone';
    const CODE_411 = 'Length';
    const CODE_412 = 'Precondition';
    const CODE_413 = 'Request';
    const CODE_414 = 'Request-URL';
    const CODE_415 = 'Unsupported';
    const CODE_416 = 'Requested';
    const CODE_417 = 'Expectation';
    const CODE_418 = 'I’m';
    const CODE_420 = 'Policy';
    const CODE_421 = 'There';
    const CODE_422 = 'Unprocessable';
    const CODE_423 = 'Locked';
    const CODE_424 = 'Failed';
    const CODE_425 = 'Unordered';
    const CODE_426 = 'Upgrade';
    const CODE_428 = 'Precondition';
    const CODE_429 = 'Too';
    const CODE_431 = 'Request';
    const CODE_444 = 'No';
    const CODE_449 = 'The';
    const CODE_451 = 'Unavailable';

    const CODE_500 = 'Internal';
    const CODE_501 = 'Not';
    const CODE_502 = 'Bad';
    const CODE_503 = 'Service';
    const CODE_504 = 'Gateway';
    const CODE_505 = 'HTTP';
    const CODE_506 = 'Variant';
    const CODE_507 = 'Insufficient';
    const CODE_508 = 'Loop';
    const CODE_509 = 'Bandwidth';
    const CODE_510 = 'Not';

    /**
     * @param  Request  $request
     * @return Response
     */
    public function request(Request $request);
}
