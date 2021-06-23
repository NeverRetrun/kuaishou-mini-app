## Kuai Shou Mini App SDK

---

快手小程序SDK

### Requirement

---

* PHP >= 7.4
* [Composer](https://getcomposer.org/)

### Installation

---

```shell
 $ composer require cvoid/kuaishou-mini-app -vvv
```
### Features

---

|  api   | 实现  |  是否完成  |
|  ----  | ----  | ----  |
| getAccessToken  | login->getAccessToken | ☑️ |
| 登录 - code2Session  | login->code2Session | ☑️ |
| 手机号解密  | encryptor->encryptMobile  | ☑️ |


### Usage

---

```php
require 'vendor/autoload.php';

$app = new \KuaiShouMiniApp\KuaiShouMiniApp(
    new \KuaiShouMiniApp\Kernel\Config('appId', 'appSecret')
);

$response = $app->login()->getAccessToken();

var_dump($response);

```

### License

----

MIT