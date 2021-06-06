<?php

function _lang($phrase)
{
    static $lang = array(
        'html' => '<html lang="ar" dir="rtl>"',
        'bootstrap' =>   'layout/css/bootstrap.rtl.min.css',
        'lang' => 'العربية',
        'author' => 'عمر',
        'HOME' => 'الرئيسة',
    );
    echo $lang[$phrase];
}
