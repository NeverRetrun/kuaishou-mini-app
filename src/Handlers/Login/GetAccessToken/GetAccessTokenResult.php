<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Handlers\Login\GetAccessToken;


class GetAccessTokenResult
{
    /**
     * @var string token
     */
    protected string $accessToken;

    /**
     * @var int 过期时间(秒)
     */
    protected int $expiresIn;

    public function __construct(
        string $accessToken,
        int $expiresIn
    )
    {
        $this->accessToken = $accessToken;
        $this->expiresIn   = $expiresIn;
    }

    public static function createFromArray(array $array)
    {
        return new static(
            $array['access_token'],
            $array['expires_in'],
        );
    }

    public static function createFromJson(string $json)
    {
        return self::createFromArray(json_decode($json, true));
    }

    public function toArray(): array
    {
        return [
            'access_token' => $this->accessToken,
            'expires_in' => $this->expiresIn,
        ];
    }

    public function toJson():string
    {
        return json_encode($this->toArray());
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @return int
     */
    public function getExpiresIn(): int
    {
        return $this->expiresIn;
    }
}