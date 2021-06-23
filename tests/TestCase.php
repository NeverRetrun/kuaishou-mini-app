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
     * @return KuaiShouMiniApp
     */
    public function mockApp(?HttpClientInterface $httpClient = null): KuaiShouMiniApp
    {
        return new KuaiShouMiniApp(
            new Config(
                '',
                ''
            ),
            $httpClient
        );
    }
}