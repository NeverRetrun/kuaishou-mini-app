<?php


namespace KuaiShouMiniApp\Handlers\Payment\Signature;


interface SignatureInterface
{
    /**
     * 签名
     * @param array $requestParams
     * @param string $appSecret
     * @return string
     */
    public function signature(array $requestParams, string $appSecret): string;
}