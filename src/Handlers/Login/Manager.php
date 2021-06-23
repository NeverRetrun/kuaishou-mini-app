<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Handlers\Login;


use KuaiShouMiniApp\Handlers\Login\Code2Session\Code2SessionHandler;
use KuaiShouMiniApp\Handlers\Login\Code2Session\Code2SessionResult;
use KuaiShouMiniApp\Handlers\Login\GetAccessToken\GetAccessTokenHandler;
use KuaiShouMiniApp\Handlers\Login\GetAccessToken\GetAccessTokenResult;
use KuaiShouMiniApp\Kernel\BaseManager;

class Manager extends BaseManager
{
    /**
     * @link https://mp.kuaishou.com/docs/develop/server/code2Session.html
     * @param string $code
     * @return Code2SessionResult
     */
    public function code2Session(string $code): Code2SessionResult
    {
        return (new Code2SessionHandler($this->http, $this->cache))
            ->handle($code);
    }

    /**
     * @link https://mp.kuaishou.com/docs/develop/server/getAccessToken.html
     * @return GetAccessTokenResult
     */
    public function getAccessToken(): GetAccessTokenResult
    {
        return (new GetAccessTokenHandler($this->http, $this->cache))
            ->handle();
    }
}