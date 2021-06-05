<?php
$lng = "en";
include "ini.php";


if (!isset($_SESSION['usName'])) {
  redirect('index.php');
}



$do = '';
$do = (isset($_GET['do'])) ? $_GET['do'] : 'Manage';


/*//تحويل*/
if ($do == 'Manage') {
} else if ($do == 'Add') {
} else if ($do == 'edite') {
} else if ($do == 'del') {
} else {
}


?>
<div class="conainer">
  <div class="row">
    <?php include $comp . "breadcrumb.php"; ?>

    <div class="col"><a href="http://www.ifri-dz.com/" target="_blank" rel="noopener noreferrer">www.ifri-dz.com</a></div>
    <div class="col"><a href="siteb.php" target="_blank" rel="noopener noreferrer">siteb</a></div>

  </div>
</div>

<?php include $comp . "footer.php"; ?>


<script>
  document.getElementById('id_title').innerText = "<?php echo $_SESSION['usName']; ?>";
</script>