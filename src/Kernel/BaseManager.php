<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Kernel;


use KuaiShouMiniApp\Kernel\Cache\SimpleCache;
use KuaiShouMiniApp\Kernel\Http\HttpClientInterface;
use KuaiShouMiniApp\Kernel\Http\SimpleHttpClient;
use Psr\SimpleCache\CacheInterface;

class BaseManager
{
    /**
     * @var Config 配置信息
     */
    protected Config $config;

    /**
     * @var HttpClientInterface Http客户端
     */
    protected HttpClientInterface $http;

    /**
     * @var CacheInterface 缓存
     */
    protected CacheInterface $cache;

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->http   = new SimpleHttpClient($config);
        $this->cache  = new SimpleCache();
    }

    /**
     * @param HttpClientInterface $http
     * @return $this
     */
    public function setHttp(HttpClientInterface $http)
    {
        $this->http = $http;
        return $this;
    }

    /**
     * @param CacheInterface $cache
     * @return $this
     */
    public function setCache(CacheInterface $cache)
    {
        $this->cache = $cache;
        return $this;
    }
}