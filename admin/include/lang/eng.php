<?php

$root = "../";
function _lang($phrase,$root="../")
{
    static $lang = array(
        'html' => '<html lang="en" dir="ltr>"',
        'bootstrap' =>   'layout/css/bootstrap.min.css',
        'popper' =>   'layout/js/popper.min.js',

        'lang' => 'english',
        'author' => 'amor',
        'HOME' => 'HOME',
        'loginTitle' => 'LOGIN ADMIN',

    );
    echo $root.$lang[ $phrase];
}
