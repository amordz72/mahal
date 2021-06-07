<?php
// $_lang='ar';
include "ini.php";
if (!isset($_SESSION['usName'])) {
    redirect('index.php');
}

?>
<?php  ?>

<?php include_once $compPublic."footer.php"; ?>


