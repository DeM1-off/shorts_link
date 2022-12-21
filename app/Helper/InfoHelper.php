<?php

namespace App\Helper;

use App\Events\StatsEvent;
use App\Models\ShortLink;

class InfoHelper
{

    const SUCCESS = 'success';
    const ERROR = 'error';
    const NOT_LINK = 404;
    const CREATE_SUCCESS = 'Скорочене посилання створено успішно!';


    /**
     * @param $request
     * @return string
     */
    public static function getDeleteDate($request)
    {
        $hours = explode(":", $request);
        return date('Y-m-d H:i:s',
            strtotime(" +" . $hours['0'] . " hour +" . $hours['1'] . " minutes"));
    }


    /**
     * @param $link
     * @return bool
     */
    public static function checkink($link)
    {
        return ShortLink::where([
            ['date_del', '>', self::dateNow()],
            ['stats', '>', 2],
            ['code', self::cutLick($link)]
        ])->orWhere([
                ['date_del', '>', self::dateNow()],
                ['stats', '=', 0],
                ['code', self::cutLick($link)]]
        )->first();
    }


    /**
     * @param $link
     * @return array|false|int|string|string[]|null
     */
    public static function cutLick($link)
    {
        return str_replace('/', '', parse_url($link, PHP_URL_PATH));
    }

    public static function dateNow()
    {
        return date('Y-m-d h:i:s', strtotime("now"));
    }


}
