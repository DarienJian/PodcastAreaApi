<?php


namespace App\Helpers;

use Illuminate\Support\Facades\Redis;

class RedisManager
{
    const REDIS_INDEX = 'index';
    const REDIS_INDEX_EXPIRED = 300; // 五分鐘

    const REDIS_POPULAR_POSTS = 'popularPosts'; // 紀錄熱門文章
    const REDIS_POPULAR_POSTS_EXPIRED = 21600;

    const REDIS_USER_HISTORY = 'userHistory'; // 紀錄用戶歷史紀錄
    const REDIS_SPOTIFY = 'spotify'; // 紀錄後台spotify回傳資料
    const REDIS_SPOTIFY_EXPIRED = 3600;

    const REDIS_MOST_LISTEN = 'mostListen';

    public function __construct()
    {
    }

    /**
     * @param string $key
     * @param string $value
     * @param string|null $expired
     */
    public function setKey(
        string $value,
        string $key,
        string $expired = null
    ) {
        Redis::set($key,$value);
        if (!empty($expired)) {
            Redis::expire($key, $expired);
        }
    }

    /**
     * 取得redis key
     * @param string $key
     * @return mixed
     */
    public function getKey(string $key)
    {
        return Redis::get($key);
    }

    /**
     * 熱門文章排名
     * @param $key
     * @param $model
     */
    public function zincrby($key, $model)
    {
        Redis::zincrby($key, 1, $model->id);
    }

    /**
     * 取出熱門文章排名
     * @param $key
     * @param int $skip
     * @param int $take
     * @return mixed
     */
    public function zrevrange($key, $skip = 0, $take = 4)
    {
        $take = $take -1;
        return Redis::zrevrange($key, $skip, $take);
    }

    /**
     * 取得lpush list
     * @param $key
     * @param int $skip
     * @param int $take
     * @return mixed
     */
    public function leftRange($key, $skip = 0, $take = 4)
    {
        $take = $take -1;
        return Redis::lrange($key, $skip, $take);
    }

    /**
     * 從key的頭push一個元素
     * @param $key
     * @param $value
     */
    public function leftPush($key, $value)
    {
        Redis::lpush($key, $value);
    }

    /**
     * 依照傳入的value 去移除該key中的元素
     * @param $key
     * @param $value
     */
    public function leftRem($key, $value)
    {
        Redis::lrem($key, 1, $value);
    }

    /**
     * 移除全部redis資料
     */
    public function deleteAll() {
        Redis::flushDB();
    }
}
