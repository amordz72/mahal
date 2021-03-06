<?php
/*Apache/2.4.46 (Win64) OpenSSL/1.1.1j PHP/8.0.3 Server at localhost Port 80*/
// WydCqSTChB2BbW7
//use this to hide all errore
// error_reporting(1);
session_start();
$root = "../";


$_css = $root . "layout/css/";
$_js = $root . "layout/js/";
$_vueApp = $root . "layout/js/vueApp/";

/*s-iclude*/
$comp = $root . "include/comp/";
$compPublic = $comp . "public/";
$func = $root . "include/func/";
$lang = $root . "include/lang/";
/*e-incluse*/


/*s-image*/
$images = $root . "images/";

$about = $images . "about/";
$background = $images . "background/";
$blog = $images . "blog/";
$team = $images . "team/";
$Testimonial = $images . "Testimonial/";
$work = $images . "work/";
/*e-image*/
$bootstrapStyle=$_css."bootstrap.min.css";

$fontGoogleCdn = 'https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap';


include $func . "conn.php";
include $func . "method.php";



if (isset($_lang)) {

  if ($_lang == "ar")
   {
     include  $lang . "ar.php";
     $bootstrapStyle=$_css."bootstrap.rtl.min.css";
  }

  else
    include  $lang . "eng.php";
} else
  include  $lang . "eng.php";

include $compPublic . "header.php";


if (!isset($NonNavBar))
  include $compPublic . "navbar.php";
