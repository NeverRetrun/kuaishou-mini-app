<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Handlers\Login\Code2Session;


class Code2SessionResult
{
    protected string $sessionKey;

    protected string $openId;

    public function __construct(
        string $sessionKey,
        string $openId
    )
    {
        $this->sessionKey = $sessionKey;
        $this->openId     = $openId;
    }

    public static function createFromArray(array $array): Code2SessionResult
    {
        return new static(
            $array['session_key'],
            $array['open_id'],
        );
    }

    /**
     * @return string
     */
    public function getSessionKey(): string
    {
        return $this->sessionKey;
    }

    /**
     * @param string $sessionKey
     */
    public function setSessionKey(string $sessionKey): void
    {
        $this->sessionKey = $sessionKey;
    }

    /**
     * @return string
     */
    public function getOpenId(): string
    {
        return $this->openId;
    }

    /**
     * @param string $openId
     */
    public function setOpenId(string $openId): void
    {
        $this->openId = $openId;
    }
}