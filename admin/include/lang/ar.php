<?php

function _lang($phrase)
{
    static $lang = array(
        'html' => '<html lang="ar" dir="rtl>"',
        'lang' => 'العربية',
        'user' => 'عمر',
        'HOME' => 'الرئيسة',
    );
    return $lang[$phrase];
}