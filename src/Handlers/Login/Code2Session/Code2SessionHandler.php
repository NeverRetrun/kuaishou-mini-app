<?php declare(strict_types=1);

namespace KuaiShouMiniApp\Handlers\Login\Code2Session;


use KuaiShouMiniApp\Kernel\BaseRequestHandler;

class Code2SessionHandler extends BaseRequestHandler
{
    public function handle(string $code): Code2SessionResult
    {
        return Code2SessionResult::createFromArray(
            $this->httpClient->post(
                'https://open.kuaishou.com/oauth2/mp/code2session',
                [
                    'js_code' => $code
                ]
            )
        );
    }
}