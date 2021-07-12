<?php declare(strict_types=1);


namespace Tests\Payment;


use Tests\TestCase;

class WeChatTest extends TestCase
{
    public function testWechat()
    {
        $result = $this->mockApp(null, 'ks00001', 'test111')
            ->payment()
            ->wechat(
                1566720681000,
                'MicroApp00001',
                1000,
                'subject',
                'body',
                1566720681000,
                300,
                'https://wx.tenpay.com/XXXXXX',
                '10.10.10.1'
            )
            ->toArray();
        $this->assertEquals(
            'c05ce624dec0896ce8cdec10ca86c0b7',
            $result['sign']
        );
    }
}