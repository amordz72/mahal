<?php
// $_lang='ar';
include "ini.php";

issetUser($_SESSION['usName']);




$do = '';
$do = (isset($_GET['do'])) ? $_GET['do'] : 'Manage';


/*//تحويل
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

 <a href="types/types.php" target="_blank" 
  rel="noopener noreferrer">type</a>
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

  for (let line = 1; line < count; line++) {





  }



  // alert(count);
</script>
<?php
if (isset($_POST['btnOk'])) {
  $sql = "delete from `users2`;";
  $sql = "INSERT INTO `users2`( `usName`, `usLast`) VALUES  (' `usName`',' `usLast`')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
  alert('btnOk');


  // if ($conn->query($sql) === TRUE) {
  //   echo "New record created successfully";
  // } else {
  //   echo "Error: " . $sql . "<br>" . $conn->error;
  // }

  // $conn->close();
  // alert('btnOk');
}
?>