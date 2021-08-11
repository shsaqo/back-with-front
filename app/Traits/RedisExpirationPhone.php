<?php


namespace App\Traits;

use Illuminate\Support\Facades\Redis;


trait RedisExpirationPhone
{
    protected $redis;

    public function __construct()
    {
        $this->redis = Redis::connection();
    }

    public function setExpirationNumber($domain, $phone)
    {
        $domainPhone = $domain.'_'.$phone;
        $this->redis->set($domainPhone, $domainPhone, 'EX', 30);
    }

    public function getExpirationNumber($domain, $phone)
    {
        $domainPhone = $domain.'_'.$phone;
        return $this->redis->get($domainPhone);

    }

}
