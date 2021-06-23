<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Support;


use KuaiShouMiniApp\Kernel\BaseManager;
use KuaiShouMiniApp\Kernel\Config;
use KuaiShouMiniApp\Kernel\Http\HttpClientInterface;
use Psr\SimpleCache\CacheInterface;

class ProviderStore
{
    /**
     * @var array
     */
    protected array $providers = [];

    public function get(string $alias, $default = null)
    {
        return $this->providers[$alias] ?? null;
    }

    public function registerFromArray(
        Config $config,
        array $configs,
        ?HttpClientInterface $httpClient,
        ?CacheInterface $cache
    ): ProviderStore
    {
        foreach ($configs as $alias => $className) {
            $this->providers[$alias] = new $className($config);

            if ($httpClient !== null) {
                $this->providers[$alias]->setHttp($httpClient);
            }

            if ($cache !== null) {
                $this->providers[$alias]->setCache($cache);
            }
        }

        return $this;
    }

    public function register(string $alias, $value): ProviderStore
    {
        $this->providers[$alias] = $value;
        return $this;
    }
}