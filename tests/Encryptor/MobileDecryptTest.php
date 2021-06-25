<?php declare(strict_types=1);


namespace Tests\Encryptor;


use KuaiShouMiniApp\Handlers\Encryptor\MobileDecrypt\MobileDecryptResult;
use Tests\TestCase;

class MobileDecryptTest extends TestCase
{
    public function testMobileDecrypt()
    {
        $result = $this->mockApp()->encryptor()->encryptMobile(
            'BhwmnJUlu+xsIiARqsoP35GBL4EBQr8cyEbTDUfcO5cvmCbmezs0XHlfq1bOtxkZqA3/RYQ5nNpS4o1StegPRw==',
            '0kga3zotUrMkCvociMF7YQ==',
            'z7CLMhoYKrPoolWP8SoNew==',
        );

        $this->assertInstanceOf(MobileDecryptResult::class, $result);
        $this->assertEquals('19814733741', $result->getPhoneNumber());
        $this->assertEquals('86', $result->getCountryCode());
    }
}