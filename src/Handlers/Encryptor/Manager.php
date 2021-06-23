<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Handlers\Encryptor;


use KuaiShouMiniApp\Handlers\Encryptor\MobileDecrypt\MobileDecrypt;
use KuaiShouMiniApp\Handlers\Encryptor\MobileDecrypt\MobileDecryptResult;
use KuaiShouMiniApp\Kernel\BaseManager;

class Manager extends BaseManager
{
    /**
     * 解密手机号
     * @param string $encrypted
     * @param string $iv
     * @param string $sessionKey
     * @return MobileDecryptResult
     */
    public function encryptMobile(
        string $encrypted,
        string $iv,
        string $sessionKey
    ): MobileDecryptResult
    {
        return (new MobileDecrypt())->handle($encrypted, $iv, $sessionKey);
    }
}