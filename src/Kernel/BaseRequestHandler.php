<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Kernel;


use KuaiShouMiniApp\Kernel\Http\HttpClientInterface;
use Psr\SimpleCache\CacheInterface;

class BaseRequestHandler
{
    protected HttpClientInterface $httpClient;

    protected CacheInterface $cache;

    public function __construct(
        HttpClientInterface $httpClient,
        CacheInterface $cache
    )
    {
        $this->httpClient = $httpClient;
        $this->cache      = $cache;
    }
}