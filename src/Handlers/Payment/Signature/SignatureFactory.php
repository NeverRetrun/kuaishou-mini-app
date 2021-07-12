<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Handlers\Payment\Signature;


use KuaiShouMiniApp\Exceptions\Exception;

class SignatureFactory
{
    public static function createFormSignType(string $signType): SignatureInterface
    {
        switch ($signType) {
            case 'MD5':
                return new MD5();
            default:
                throw new Exception('invalid sign type');
        }
    }
}