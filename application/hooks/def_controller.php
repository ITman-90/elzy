<?php

function def_function()
{
    if (isset($_COOKIE['start_session'])) $start_session = ($_COOKIE['start_session']);
    if (empty($start_session))
    {
        $start_session = time();
        SetCookie("start_session",$start_session, time()+7200, "/", "elzy.ru"); // на 2 часа
    }
    if (isset($_COOKIE['user_reff'])) $user_reff = ($_COOKIE['user_reff']);
    if (empty($user_reff))
    {
        $search = 'none';
        if (isset($_SERVER["HTTP_REFERER"])) {
            $reff = urldecode($_SERVER["HTTP_REFERER"]);
            if(strpos($reff,"yandex"))  $search = 'yandex';
            else if(strpos($reff,"google"))  $search = 'google';
            else if(strpos($reff,"rambler")) $search = 'rambler';
            else if(strpos($reff,"mail") && strpos($reff,"search"))   $search = 'mail';
            else if(strpos($reff,"msn") && strpos($reff,"results"))   $search = 'msn';
            else if(strpos($reff,"ask.com"))   $search = 'ask.com';
            else if(strpos($reff,"aport"))   $search = 'aport';
            else if(strpos($reff,"avg.com"))   $search = 'avg.com';
            else if(strpos($reff,"bing"))   $search = 'bing';
            else if(strpos($reff,"yahoo"))   $search = 'yahoo';
            else if(strpos($reff,"gogo"))   $search = 'gogo';
            else if(strpos($reff,"live.com"))   $search = 'live.com';
            else if(strpos($reff,"nigma"))   $search = 'nigma';
            else if(strpos($reff,"webalta"))   $search = 'webalta';
            else if(strpos($reff,"begun.ru"))   $search = 'begun.ru';
            else if(strpos($reff,"tut.by"))   $search = 'tut.by';
            else if(strpos($reff,"qip"))   $search = 'qip';
        }
        SetCookie("user_reff",$search, time()+86400, "/", "elzy.ru"); //на 1 день
    }

}