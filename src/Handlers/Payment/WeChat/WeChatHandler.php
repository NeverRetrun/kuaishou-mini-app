<?php declare(strict_types=1);

namespace KuaiShouMiniApp\Handlers\Payment\WeChat;

use KuaiShouMiniApp\Kernel\Config;

class WeChatHandler
{
    protected Config $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function handler(
        int $timestamp,
        string $outOrderNo,
        int $totalAmount,
        string $subject,
        string $body,
        int $tradeTime,
        int $validTime,
        string $wxUrl,
        ?string $ip
    ): WeChatResponse
    {
        return new WeChatResponse(
            $timestamp,
            $outOrderNo,
            $totalAmount,
            $subject,
            $body,
            $tradeTime,
            $validTime,
            $wxUrl,
            $ip,
            $this->config
        );
    }
}