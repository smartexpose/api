<?php

namespace Dingo\Api\Exception\Allmyhomes\BaseHttpExceptions;

use Dingo\Api\Exception\Allmyhomes\AmhHttpException;

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
    public function __construct(int $errorCode, ?AmhHttpException $previous = null)
    {
        parent::__construct(400, $errorCode, $previous);
    }
}
