<?php


namespace CloudCastle\LaravelTelegramBot\Facades;


use Illuminate\Support\Facades\Facade;

class CallbackButton extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \CloudCastle\LaravelTelegramBot\Factories\CallbackButton::class;
    }
}
