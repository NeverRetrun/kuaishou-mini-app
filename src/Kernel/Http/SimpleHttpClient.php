<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Kernel\Http;


use KuaiShouMiniApp\Kernel\Config;

class SimpleHttpClient implements HttpClientInterface
{
    protected Config $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function post(string $url, array $body = [], array $headers = []): array
    {
        $headers[] = 'Content-type: application/x-www-form-urlencoded';

        $body['app_id'] = $this->config->getAppId();
        $body['app_secret'] = $this->config->getAppSecret();


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($body));

        $output = curl_exec($ch);
        curl_close($ch);

        ResponseCheck::check($result = json_decode($output, true));
        return $result;
    }

}