<?php
 

    function _lang($phrase)
    {
        static $lang = array(
            'html' => '<html lang="en" dir="ltr>"',
            'lang' => 'english',
            'user' => 'amor',
             'HOME' => 'HOME',
             
        );
        return $lang[$phrase];
    }



 