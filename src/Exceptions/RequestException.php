<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Exceptions;


use Throwable;

class RequestException extends Exception
{
    public function __construct(array $response)
    {
        parent::__construct(
            $this->createMessageFromResponse($response)
        );
    }

    protected function createMessageFromResponse(array $response): string
    {
        return sprintf(
            'invalid request. response params: %s',
            json_encode($response, JSON_UNESCAPED_UNICODE)
        );
    }
}