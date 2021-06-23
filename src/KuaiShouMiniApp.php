<?php declare(strict_types=1);


namespace KuaiShouMiniApp;


use KuaiShouMiniApp\Handlers\Encryptor\Manager as EncryptorManager;
use KuaiShouMiniApp\Handlers\Login\Manager as LoginManager;
use KuaiShouMiniApp\Kernel\Config;
use KuaiShouMiniApp\Kernel\Http\HttpClientInterface;
use KuaiShouMiniApp\Support\ProviderStore;
use Psr\SimpleCache\CacheInterface;

class KuaiShouMiniApp
{
    protected ProviderStore $providers;

    public function __construct(
        Config $config,
        ?HttpClientInterface $httpClient = null,
        ?CacheInterface $cache = null
    )
    {
        $this->providers = (new ProviderStore())
            ->registerFromArray(
                $config,
                [
                    'encryptor' => EncryptorManager::class,
                    'login' => LoginManager::class,
                ],
                $httpClient,
                $cache,
            );
    }

    public function encryptor(): EncryptorManager
    {
        return $this->providers->get('encryptor');
    }

    public function login(): LoginManager
    {
        return $this->providers->get('login');
    }
}