<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Handlers\Encryptor\MobileDecrypt;


use KuaiShouMiniApp\Handlers\Encryptor\UserDecrypt;

class MobileDecrypt
{
    public function handle(
        string $encrypted,
        string $iv,
        string $sessionKey
    ): MobileDecryptResult
    {
        return MobileDecryptResult::createFromArray(
            UserDecrypt::decryptToArray(
                $encrypted,
                $iv,
                $sessionKey
            )
        );
    }
}