<?php

namespace Dingo\Api\Exception\Allmyhomes\AmhHttpExceptions;

use Dingo\Api\Exception\Allmyhomes\AmhHttpException;

/**
 * @class UnauthorizedHttpException
 * Exception classes don't need to be tested if there is no logic in it
 * @codeCoverageIgnore
 */
class UnauthorizedHttpException extends AmhHttpException
{
    /**
     * Constructor
     * @param int                 $errorCode
     * @param AmhHttpException|null $previous
     */
    public function __construct(int $errorCode, ?AmhHttpException $previous = null)
    {
        parent::__construct(401, $errorCode, $previous);
    }
}
