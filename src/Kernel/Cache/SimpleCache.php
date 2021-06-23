<?php declare(strict_types=1);


namespace KuaiShouMiniApp\Kernel\Cache;


use Psr\SimpleCache\CacheInterface;

class SimpleCache implements CacheInterface
{
    protected array $store = [];

    public function get($key, $default = null)
    {
        return $this->store[$key] ?? $default;
    }

    public function set($key, $value, $ttl = null)
    {
        $this->store[$key] = $value;
    }

    public function delete($key)
    {
        unset($this->store[$key]);
    }

    public function clear()
    {
        $this->store = [];
    }

    public function getMultiple($keys, $default = null)
    {
        $result = [];
        foreach ($keys as $key) {
            $result[$key] = $this->get($key, $default);
        }
        return $result;
    }

    public function setMultiple($values, $ttl = null)
    {

    }

    public function deleteMultiple($keys)
    {
        foreach ($keys as $key) {
            $this->delete($key);
        }
    }

    public function has($key)
    {
        return isset($this->store[$key]);
    }
}