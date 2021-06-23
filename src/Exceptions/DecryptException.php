<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Exceptions;


use Throwable;

class DecryptException extends Exception
{
    public function __construct($message = "decrypt error", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}