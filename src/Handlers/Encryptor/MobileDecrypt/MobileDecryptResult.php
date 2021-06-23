<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Handlers\Encryptor\MobileDecrypt;


class MobileDecryptResult
{
    /**
     * @var string 手机号码
     */
    protected string $phoneNumber;

    /**
     * @var string 区号
     */
    protected string $countryCode;

    public function __construct(string $phoneNumber, string $countryCode)
    {
        $this->phoneNumber = $phoneNumber;
        $this->countryCode = $countryCode;
    }

    /**
     * @param array $result
     * @return $this
     */
    public static function createFromArray(array $result): MobileDecryptResult
    {
        return new static(
            $result['phoneNumber'],
            $result['countryCode'],
        );
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }
}