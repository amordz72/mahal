<?php
// $_lang='ar';
include "ini.php";
issetUser($_SESSION['usName']) ;
?>
<?php  ?>


<form action="" method="post">
      <table class="table table-hover " id="move">
        <thead>
          <tr>

            <th scope="col">usName</th>
            <th scope="col">usLast</th>

          </tr>
        </thead>
        <tbody>
          <tr>

            <td>user3</td>
            <td>lem3</td>
          </tr>
          <tr>
            <td>user4</td>
            <td>lem4</td>
          </tr>

        </tbody>
      </table>

      <button type="submit" class="btn btn-info" name="btnOk">ok</button>


    </form>





<?php include_once $compPublic."footer.php"; ?>


