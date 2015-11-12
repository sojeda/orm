<?php

namespace LaravelDoctrine\ORM\Configuration\Cache;

use Illuminate\Contracts\Cache\Factory;
use LaravelDoctrine\ORM\Configuration\Driver;

class MemcachedCacheProvider implements Driver
{
    /**
     * @var Factory
     */
    protected $cache;

    /**
     * @param Factory $cache
     */
    public function __construct(Factory $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param array $settings
     *
     * @return MemcachedCache
     */
    public function resolve(array $settings = [])
    {
        return new IlluminateCacheAdapter(
            $this->cache->store('memcached')
        );
    }
}
