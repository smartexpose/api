<?php

namespace Dingo\Api\Exception\Allmyhomes\AmhHttpExceptions;

use Dingo\Api\Exception\Allmyhomes\AmhHttpException;

/**
 * @class NotFoundHttpException
 * Exception classes don't need to be tested if there is no logic in it
 * @codeCoverageIgnore
 */
class NotFoundHttpException extends AmhHttpException
{
    /**
     * Constructor
     * @param int                    $errorCode
     * @param AmhHttpException|null $previous
     */
    public function __construct(int $errorCode, ?AmhHttpException $previous = null)
    {
        parent::__construct(404, $errorCode, $previous);
    }
}
