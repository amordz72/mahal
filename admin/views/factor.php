<?php
// $_lang='ar';
include "ini.php";
issetUser($_SESSION['usName']);
?>

<?php

$do = '';
$do = (isset($_GET['do'])) ? $_GET['do'] : 'buy';


/*//تحويل*/
if ($do == 'buy') {
  include_once 'buy/buy.php';
} else if ($do == 'sel') {
  alert('sel');
} else if ($do == 'edite') {
} else if ($do == 'del') {
} else {
}

?>












<?php include_once $compPublic . "footer.php"; ?>