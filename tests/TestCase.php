<?php declare(strict_types=1);


namespace Tests;


use KuaiShouMiniApp\Kernel\Config;
use KuaiShouMiniApp\Kernel\Http\HttpClientInterface;
use KuaiShouMiniApp\KuaiShouMiniApp;

class TestCase extends \PHPUnit\Framework\TestCase
{
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    /**
     * mock app
     * @param HttpClientInterface|null $httpClient
     * @param string|null $appId
     * @return KuaiShouMiniApp
     */
    public function mockApp(
        ?HttpClientInterface $httpClient = null,
        ?string $appId = '',
        ?string $appSecret = ''
    ): KuaiShouMiniApp
    {
        return new KuaiShouMiniApp(
            new Config($appId, $appSecret),
            $httpClient
        );
    }
}