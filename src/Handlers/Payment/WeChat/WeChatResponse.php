<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Handlers\Payment\WeChat;


use KuaiShouMiniApp\Handlers\Payment\Signature\SignatureFactory;
use KuaiShouMiniApp\Kernel\Config;

class WeChatResponse
{
    /**
     * @var int 13位时间戳 发送请求的 unix 时间戳，精确到毫秒
     */
    public int $timestamp;

    /**
     * @var string 商户订单号
     */
    public string $outOrderNo;

    /**
     * @var int 金额，整型，单位：分（不能有小数）
     */
    public int $totalAmount;

    /**
     * @var string 商户订单名称
     */
    public string $subject;

    /**
     * @var string 商户订单详情
     */
    public string $body;

    /**
     * @var int 下单时间 unix 时间戳戳，精确到毫秒
     */
    public int $tradeTime;

    /**
     * @var int 订单有效时间（单位 秒） 10位
     */
    public int $validTime;

    /**
     * @var string 微信H5支付链接
     */
    public string $wxUrl;

    /**
     * @var string|null 用户请求IP
     */
    public ?string $ip;

    public string $signType = 'MD5';
    public string $version = '1.0';
    public string $tradeType = 'H5';
    public string $productCode = 'pay';
    public string $currency = 'CNY';
    public string $wxType = 'MWEB';
    public Config $config;

    public function __construct(
        int $timestamp,
        string $outOrderNo,
        int $totalAmount,
        string $subject,
        string $body,
        int $tradeTime,
        int $validTime,
        string $wxUrl,
        ?string $ip,
        Config $config
    )
    {
        $this->config      = $config;
        $this->timestamp   = $timestamp;
        $this->outOrderNo  = $outOrderNo;
        $this->totalAmount = $totalAmount;
        $this->subject     = $subject;
        $this->body        = $body;
        $this->tradeTime   = $tradeTime;
        $this->validTime   = $validTime;
        $this->wxUrl       = $wxUrl;
        $this->ip          = $ip;
    }


    public function toArray(): array
    {
        $array = [
            'app_id' => $this->config->getAppId(),
            'sign_type' => $this->signType,
            'timestamp' => $this->timestamp,
            'version' => $this->version,
            'trade_type' => $this->tradeType,
            'product_code' => $this->productCode,
            'out_order_no' => $this->outOrderNo,
            'total_amount' => $this->totalAmount,
            'currency' => $this->currency,
            'subject' => $this->subject,
            'body' => $this->body,
            'trade_time' => $this->tradeTime,
            'valid_time' => $this->validTime,
            'wx_url' => $this->wxUrl,
            'wx_type' => $this->wxType,
        ];

        if ($this->ip !== null) {
            $array['risk_info'] = json_encode(['ip' => $this->ip]);
        }

        $array['sign'] = SignatureFactory::createFormSignType($this->signType)
            ->signature($array, $this->config->getAppSecret());

        return $array;
    }
}