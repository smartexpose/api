<?php

namespace Dingo\Api\Exception\Exceptions\BaseHttpExceptions;

use Dingo\Api\Exception\Exceptions\AmhHttpException;

/**
 * @class BadRequestHttpException
 *
 * Exception classes don't need to be tested if there is no logic in it
 * @codeCoverageIgnore
 */
class BadRequestHttpException extends BaseHttpException
{
    /**
     * Constructor
     * @param int                    $errorCode
     * @param BaseHttpException|null $previous
     */
    public function __construct(int $errorCode, ?BaseHttpException $previous = null)
    {
        parent::__construct(400, $errorCode, $previous);
    }
}
