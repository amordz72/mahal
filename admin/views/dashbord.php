<?php
// $_lang='ar';
include "ini.php";

issetUser($_SESSION['usName']);



/*//تحويل
$do = '';
$do = (isset($_GET['do'])) ? $_GET['do'] : 'Manage';



if ($do == 'Manage') {
} else if ($do == 'Add') {
} else if ($do == 'edite') {
} else if ($do == 'del') {
} else {
}
*/

?>

<div class="container">
  <div class="row" class="border mt-5 ">
    <h1 class="text-center">dashboord</h1>

    <a href="<?php go('types.php', 'add', $_SESSION['usId']) ?>" target="_blank" rel="noopener noreferrer">type</a>

    <a href="<?php go('factor.php', 'buy', 'add') ?>" target="_blank" rel="noopener noreferrer">buy</a>

    <a href="<?php go('factor.php', 'sel', 'add') ?>" target="_blank" rel="noopener noreferrer">sel</a>

  </div>
</div>






<?php include $compPublic . "footer.php";
// include_once "db.php";
?>



<?php



?>



<script>
  const tableMath = document.getElementById('move');
  var count = tableMath.rows.length;





  // alert(count);
</script>