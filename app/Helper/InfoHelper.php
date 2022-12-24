<?php

namespace App\Helper;

class InfoHelper
{

    const SUCCESS = 'success';
    const ERROR = 'error';
    const NOT_LINK = '/page/404';
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
     * @return array|false|int|string|string[]|null
     */
    public static function cutLink($link)
    {
        return str_replace('/', '', parse_url($link, PHP_URL_PATH));
    }


}
