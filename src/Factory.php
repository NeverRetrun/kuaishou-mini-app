<?php declare(strict_types=1);


namespace KuaiShouMiniApp;


use KuaiShouMiniApp\Exceptions\Exception;
use KuaiShouMiniApp\Kernel\Config;
use KuaiShouMiniApp\Kernel\Http\HttpClientInterface;
use Psr\SimpleCache\CacheInterface;

class Factory
{
    public static function create(
        string $appId,
        string $appSecret,
        ?HttpClientInterface $httpClient = null,
        ?CacheInterface $cache = null
    ): KuaiShouMiniApp
    {
        return new KuaiShouMiniApp(
            new Config($appId, $appSecret),
            $httpClient,
            $cache
        );
    }

    /**
     * 在Laravel中实例化
     * @param string $appId
     * @param string $appSecret
     * @return KuaiShouMiniApp
     * @throws Exception
     */
    public static function createFromLaravel(string $appId, string $appSecret): KuaiShouMiniApp
    {
        if (
            function_exists('app') === false ||
            class_exists('Illuminate\Cache\CacheManager') === false
        ) {
            throw new Exception('not laravel');
        }

        return new KuaiShouMiniApp(
            new Config($appId, $appSecret),
            null,
            app('Illuminate\Cache\CacheManager')->store(),
        );
    }
}