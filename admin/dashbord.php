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
    <h1 class="text-center">فاتورة بيع</h1>

    <form action="" method="post">
      <table class="table table-hover ">
        <thead>
          <tr>

            <th scope="col">usName</th>
            <th scope="col">usLast</th>

          </tr>
        </thead>
        <tbody>
          <tr>

            <td>user3</td>
            <td>lem</td>
          </tr>

        </tbody>
      </table>

      <button type="submit" class="btn btn-info" name="btnOk">ok</button>


    </form>
  </div>
</div>






<?php include $compPublic . "footer.php"; ?>


<script>
  document.getElementById('id_title').innerText = "<?php echo $_SESSION['usName']; ?>";





</script>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mahal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `users2`( `usName`, `usLast`) VALUES ('usName-2','usLast-2')";




  if (isset($_POST['btnOk'])) {
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
alert('btnOk');
}
?>