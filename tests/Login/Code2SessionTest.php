<?php declare(strict_types=1);


namespace Tests\Login;


use KuaiShouMiniApp\Handlers\Login\Code2Session\Code2SessionResult;
use KuaiShouMiniApp\Kernel\Http\SimpleHttpClient;
use Tests\TestCase;

class Code2SessionTest extends TestCase
{
    public function testCode2Session()
    {
        $http = $this->createMock(SimpleHttpClient::class);
        $http->expects($this->any())
            ->method('post')
            ->will(
                $this->returnValue([
                    'result' => 1,
                    'session_key' => 'test',
                    'open_id' => 'openid'
                ])
            );

        $result = $this->mockApp($http)->login()->code2Session('code');
        $this->assertInstanceOf(Code2SessionResult::class, $result);

        $this->assertEquals('openid', $result->getOpenId());
        $this->assertEquals('test', $result->getSessionKey());
    }
}