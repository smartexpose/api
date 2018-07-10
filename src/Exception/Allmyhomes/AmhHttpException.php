<?php

namespace Dingo\Api\Exception\Allmyhomes;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Response as BaseResponse;

/**
 * @class AmhHttpException
 * integrationTested through HandlerTest
 * @codeCoverageIgnore
 */
class AmhHttpException extends HttpException
{
    public $errorCode;
    public $statusCode;

    /**
     * Constructor
     * @param int                    $statusCode
     * @param int                    $errorCode
     * @param AmhHttpException|null $previous
     */
    public function __construct(int $statusCode, int $errorCode, ?AmhHttpException $previous = null)
    {
        $this->errorCode = $errorCode;
        $this->statusCode = $statusCode;

        parent::__construct(
            $statusCode,
            null, // message gets inserted later
            $previous,
            [null], // no need for headers here
            $errorCode
        );
    }

    /**
     * Helper method for flattenEXception
     *
     * @return array w/ previous exceptions
     */
    public function getAllPrevious()
    {
        $exceptions = array();
        $e = $this;
        while ($e = $e->getPrevious()) {
            $exceptions[] = $e;
        }

        return $exceptions;
    }

    /**
     * Flattens the exception, de-nesting of previous exceptions
     *
     * @return array with all previous exceptions in one array
     */
    public function flattenException()
    {
        foreach (array_merge([$this], $this->getAllPrevious()) as $ex) {
            $exceptions[] = [
                'file' => $ex->file,
                'line' => $ex->line,
                'status' => $ex->statusCode,
                'code' => $ex->errorCode,
            ];
        }

        return $exceptions;
    }
}
