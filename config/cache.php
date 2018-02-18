<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Cache Store
    |--------------------------------------------------------------------------
    |
    | This option controls the default cache connection that gets used while
    | using this caching library. This connection is used when another is
    | not explicitly specified when executing a given caching function.
    |
    */

    'default' => env('CACHE_DRIVER', 'file'),
    //'default' => env('CACHE_DRIVER', 'redis'),

    /*
    |--------------------------------------------------------------------------
    | Cache Stores
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the cache "stores" for your application as
    | well as their drivers. You may even define multiple stores for the
    | same cache driver to group types of items stored in your caches.
    |
    */

    'stores' => [

        'apc' => [
            'driver' => 'apc'
        ],

        'array' => [
            'driver' => 'array'
        ],

        'database' => [
            'driver' => 'database',
            'table'  => 'cache',
            'connection' => null,
        ],

        'file' => [
            'driver' => 'file',
            'path'   => storage_path().'/framework/cache',
        ],

        'memcached' => [
            'driver'  => 'memcached',
            'servers' => [
                [
                    'host'   => env('CACHE_MEMCACHED_HOST', '127.0.0.1'),
                    'port'   => env('CACHE_MEMCACHED_PORT', 11211),
                    'weight' => env('CACHE_MEMCACHED_WEIGHT', 100),
               ],
            ],
        ],

        'redis' => [
            'driver' => 'redis',
             'connection' => 'default',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Key Prefix
    |--------------------------------------------------------------------------
    |
    | When utilizing a RAM based store such as APC or Memcached, there might
    | be other applications utilizing the same cache. So, we'll specify a
    | value to get prefixed to all our keys so we can avoid collisions.
    |
    */
    // Redisのキャッシュキーはアプリ名_(CACHE_PREFIX_NUMBER)_となる
    // 例) laravel5-base_1_
    'prefix' => env('APP_NAME', 'ApplicationName') . '_' . env('CACHE_PREFIX_NUMBER', ''),

];
