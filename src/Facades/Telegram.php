<?php

namespace CloudCastle\LaravelTelegramBot\Facades;

use Illuminate\Support\Facades\Facade;
use CloudCastle\LaravelTelegramBot\LaravelTelegramBot;

class Telegram extends Facade
{
    protected static function getFacadeAccessor()
    {
        return LaravelTelegramBot::class;
    }
}