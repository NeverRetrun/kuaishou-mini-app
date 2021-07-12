<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Handlers\Payment;


use KuaiShouMiniApp\Handlers\Payment\WeChat\WeChatHandler;
use KuaiShouMiniApp\Handlers\Payment\WeChat\WeChatResponse;
use KuaiShouMiniApp\Kernel\BaseManager;

class Manager extends BaseManager
{
    /**
     * @link https://mp.kuaishou.com/docs/develop/api/openApi/payment/requestPayment.html
     * @param int $timestamp
     * @param string $outOrderNo
     * @param int $totalAmount
     * @param string $subject
     * @param string $body
     * @param int $tradeTime
     * @param int $validTime
     * @param string $wxUrl
     * @param string|null $ip
     * @return WeChatResponse
     */
    public function wechat(
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
        return (new WeChatHandler($this->config))
            ->handler(
                $timestamp,
                $outOrderNo,
                $totalAmount,
                $subject,
                $body,
                $tradeTime,
                $validTime,
                $wxUrl,
                $ip
            );
    }
}