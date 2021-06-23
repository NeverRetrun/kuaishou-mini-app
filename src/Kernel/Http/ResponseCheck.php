<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Kernel\Http;


use KuaiShouMiniApp\Exceptions\RequestException;

class ResponseCheck
{
    public static function check(array $response): bool
    {
        if ($response['result'] === 1) {
            return true;
        }

        throw new RequestException($response);
    }
}