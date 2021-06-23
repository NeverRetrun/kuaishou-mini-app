<?php declare(strict_types=1);

namespace KuaiShouMiniApp\Handlers\Encryptor;

use KuaiShouMiniApp\Exceptions\DecryptException;
use KuaiShouMiniApp\Support\AES;
use KuaiShouMiniApp\Support\PKCS5Encoder;

class UserDecrypt
{
    /**
     * 解析数据转数组
     * @param string $encrypted
     * @param string $iv
     * @param string $sessionKey
     * @return array
     * @throws DecryptException
     */
    public static function decryptToArray(
        string $encrypted,
        string $iv,
        string $sessionKey
    ): array
    {
        $tempDecrypted = AES::decrypt(
            base64_decode($encrypted),
            base64_decode($sessionKey),
            base64_decode($iv)
        );

        $decrypted = json_decode(PKCS5Encoder::decode($tempDecrypted), true);
        if ($decrypted === null) {
            throw new DecryptException('The given payload is invalid.');
        }

        return $decrypted;
    }
}