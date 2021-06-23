<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Handlers\Login\GetAccessToken;


use KuaiShouMiniApp\Kernel\BaseRequestHandler;

class GetAccessTokenHandler  extends BaseRequestHandler
{
    const CACHE_KEY = 'kuaishou_mini_app_access_token';

    public function handle(): GetAccessTokenResult
    {
        if (($result = $this->cache->get(self::CACHE_KEY)) !== null) {
            return GetAccessTokenResult::createFromJson($result);
        }

        $result = GetAccessTokenResult::createFromArray(
            $this->httpClient->post(
                'https://open.kuaishou.com/oauth2/access_token',
                [
                    'grant_type' => 'client_credentials'
                ]
            )
        );

        $this->cache->set(
            self::CACHE_KEY,
            $result->toJson(),
            $result->getExpiresIn() - 5
        );

        return $result;
    }
}