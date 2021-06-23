<?php declare(strict_types=1);


namespace Tests\Login;


use KuaiShouMiniApp\Handlers\Login\Code2Session\Code2SessionResult;
use KuaiShouMiniApp\Handlers\Login\GetAccessToken\GetAccessTokenResult;
use KuaiShouMiniApp\Kernel\Http\SimpleHttpClient;
use Tests\TestCase;

class GetAccessTokenTest extends TestCase
{
    public function testCode2Session()
    {
        $http = $this->createMock(SimpleHttpClient::class);
        $http->expects($this->any())
            ->method('post')
            ->will(
                $this->returnValue([
                    'result' => 1,
                    'access_token' => 'xxxxxxx',
                    'expires_in' => 23435,
                    'token_type' => 'bearer'
                ])
            );

        $result = $this->mockApp($http)->login()->getAccessToken();
        $this->assertInstanceOf(GetAccessTokenResult::class, $result);

        $this->assertEquals('xxxxxxx', $result->getAccessToken());
        $this->assertEquals(23435, $result->getExpiresIn());
    }
}