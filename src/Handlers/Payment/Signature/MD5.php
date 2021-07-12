<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Handlers\Payment\Signature;


class MD5 implements SignatureInterface
{
    public function signature(array $requestParams, string $appSecret): string
    {
        unset($requestParams['risk_info']);
        $requestParams = array_filter(
            $requestParams,
            function ($value) {
                return !empty($value);
            }
        );

        ksort($requestParams);
        $string = '';
        foreach ($requestParams as $key => $value) {
            $string .= "&$key=$value";
        }

        return md5(substr($string, 1) . $appSecret);
    }
}