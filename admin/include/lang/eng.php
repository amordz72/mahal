<?php


function _lang($phrase)
{
    static $lang = array(
        'html' => '<html lang="en" dir="ltr>"',
        'bootstrap' =>   'layout/css/bootstrap.min.css',

        'lang' => 'english',
        'author' => 'amor',
        'HOME' => 'HOME',

    );
    echo $lang[$phrase];
}
