<?php

$NavBar = ' ';
$pgTitle = "ادارة المستخدمين";
include "ini.php";


if (isset($_SESSION['usName'])) {

  $do = '';
  $do = (isset($_GET['do'])) ? $_GET['do'] : 'Manage';


  if ($do == 'Manage') {

?>
    <div id="app">
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


    </div>
<?php
  } else if ($do == 'Add') {
  } else if ($do == 'edit') {

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {

      /*$user = $_GET['usName'];
    $pw = $_GET['usPw'];
    $pwSh = sha1($pw);*/

      /* 
    $stmt = $con->prepare("UPDATE `users` SET `usName`=?,`usPw`=? WHERE `usID`=? ");
    $stmt->execute(array($user, $pwSh, $usID));
    redirect('dashbord.php');
    exit();*/
    } else _print(0);

    include $comp . "frm-change.php";
  } else if ($do == 'del') {
  } else {
    redirect('index.php');
    exit();
  }
} else {
  redirect('index.php');
}

?>



<?php include $comp . "footer.php"; ?>

<script src="<?php echo $_vueApp . "usersApp.js" ?>"></script>