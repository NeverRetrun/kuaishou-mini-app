<?php declare(strict_types=1);


namespace Tests\Encryptor;


use KuaiShouMiniApp\Handlers\Encryptor\MobileDecrypt\MobileDecryptResult;
use Tests\TestCase;

class MobileDecryptTest extends TestCase
{
    public function testMobileDecrypt()
    {
        $result = $this->mockApp()->encryptor()->encryptMobile(
            'test',
            'test',
            'test',
        );
        $this->assertInstanceOf(MobileDecryptResult::class, $result);
    }
}