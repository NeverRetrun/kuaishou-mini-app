<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Kernel;


class Config
{
    protected string $appId;

    protected string $appSecret;

    public function __construct(
        string $appId,
        string $appSecret
    )
    {
        $this->appId     = $appId;
        $this->appSecret = $appSecret;
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @return string
     */
    public function getAppSecret(): string
    {
        return $this->appSecret;
    }
}