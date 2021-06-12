<!--

<?php
session_start();
include_once 'db.php';
$mydb = new amor_db('localhost', 'root', '', 'newstor', 1);
$tool = new amor_tools();
?> 

-->

<!--

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
}
?>
-->

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/types_style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>types</title>
</head>

<body>



  <!--START-NAVBAR-->
  <div class="container-fluid">
    <nav class="navbar  fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <spane>A</span>mor<spane>T</span>ec
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul>
          <!-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
        </div>
      </div>
    </nav>
  </div>
  <!--END-NAVBAR-->

  <!--START-CONTAINER-BODY-->
  <div class="container-fluid" id='App_types'>

    <!--START-DATA-->
    <div class="row " id="data">

      <!--START-COL-MD-4-->
      <div class="col-md-4">

        <!--START-FORM-->
        <form class="row" method="POST" id="frmtypes">

          <!-- s-  text tyId -->

          <div class="form-group " id="form-group-tyId">
            <label for="tyId">TYID:</label>
            <input type="text" class="form-control" id="tyId" v-model="TYID" name="tyId">
          </div>


          <!-- e-  text tyId -->

          <!-- s-  text tyName -->

          <div class="form-group " id="form-group-tyName">
            <label for="tyName">TYNAME:</label>
            <input type="text" class="form-control" id="tyName" v-model="TYNAME" name="tyName">
          </div>


          <!-- e-  text tyName -->

          <!--START-BUTTON-->
          <div id="btn-div">
            <input type='button' id="btn_add_types" name="btn_add_types" class='btn btn-success' v-model='actionButton' @click='submitData_types' />
            <input type='button' class="btn btn-danger" id="btn_del_types" name="btn_del_types" @click='deleteData_types(TYID)' value="DELETE :" />
            <input type='button' id="btn_add_db_types" name="btn_add_db_types" class='btn btn-success' @click="add_row()" value="To dgv :" />
            <input type='button' id="btn_add_dgv_types" name="btn_add_dgv_types" class='btn btn-success' @click='add_all_types()' value="DgvToBb  :" />
            <input type="button" class="btn btn-success btn-xs" @click="openModel_types" value="New" />
            <input type="button" class="btn btn-success btn-xs" onclick="DeleteRowFromTableById()" value="DeleteRowFromTableById" />
          </div>
          <!--END-BUTTON-->

        </form>
        <!--END-FORM-->

      </div>
      <!--END-COL-MD-4-->
      <!--START-COL-MD-8-->
      <div class="col-md-8">
        <div class="container" id="App_types">
          <br />
          <h3 align="center"> TYPES</h3>
          <br />
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-6">
                  <h3 class="panel-title"><i class="fas fa-phone"></i> &spar; TYPES Data</h3>
                </div>
                <div class="col-md-6" align="right">
                  <input type="button" class="btn btn-success btn-xs" @click="openModel_types" value="Add" />
                </div>
              </div>
            </div>
            <!--START-SERCHE-->
            <div class="container pb-4  ">
              <div class="row"><input class="col-9" type="text" id="txt_serche" @change='typesSerche()' placeholder="Search for names.." title="Type in a name">
                <input class="col-3 btn btn-primary mx-4" type="button" id="btn_serche" title="Reset text" value="Reset text" @click='Reset_txt_serche()'>
              </div>
            </div>
            <!--END-SERCHE-->

            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover fs-12 " id="tbl_types" name="tbl_types">
                  <tr>
                    <th scope="col" name="col_tyId" id="col_tyId">TYID</th>
                    <th scope="col" name="col_tyName" id="col_tyName">TYNAME</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  <tr v-for="row in allData" ondblclick='SetOnclick(this)'>
                    <td name="row_tyId" id="col_tyId">{{ row.tyId }}</td>
                    <td name="row_tyName" id="col_tyName">{{ row.tyName }}</td>
                    <td><button type="button" name="edit" class="btn btn-primary btn-xs edit" @click="fetchData_types(row.tyId)">Edit</button></td>
                    <td><button type="button" name="delete" class="btn btn-danger btn-xs delete" @click="deleteData_types(row.tyId)">Delete</button></td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- alert-primary -->
            <div class="alert alert-primary" role="alert" v-if="vif_msg">
              {{msg}}
            </div>
          </div>
          <div v-if="myModel">
            <transition name="model">
              <div class="modal-mask">
                <div class="modal-wrapper">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" @click="myModel=false"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">{{ dynamicTitle }}</h4>
                      </div>
                      <div class="modal-body">
                        <div class='row'>
                          <!-- s-texttyId-->
                          <div class='col-md-4'>
                            <div class="form-group">
                              <label for="tyId">TYID:</label>
                              <input type="text" class="form-control" v-model="TYID" id="tyId" name="tyId" />
                            </div>
                          </div>
                          <!-- e-texttyId-->
                          <!-- s-texttyName-->
                          <div class='col-md-4'>
                            <div class="form-group">
                              <label for="tyName">TYNAME:</label>
                              <input type="text" class="form-control" v-model="TYNAME" id="tyName" name="tyName" />
                            </div>
                          </div>
                          <!-- e-texttyName-->
                          <br />
                          <div align="center">
                            <input type="hidden" v-model="hiddenId" />
                            <input type="button" class="btn btn-success btn-xs" v-model="actionButton" @click="submitData" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </transition>
          </div>
        </div>

        <!--END-COL-MD-2-->

      </div>
      <!--START-FOOTER-->

      <!--   footer -->
      <div class="container-fluid">
        <nav class="navbar  fixed-bottom navbar-expand-lg  navbar-dark bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Homme</a>

            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
              </ul>
            </nav>

          </div>
        </nav>
      </div>
      <!-- end footer -->
      <!--END-FOOTER-->

    </div>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>-->


  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
  <script src="../data/vue/vue.js"></script>
  <script src="../data/axios/cdnjs/axios.min.js"></script>
  <script src="../data/js/jquery-3.5.1.min.js"></script>

  <script src="js/types_js.js"></script>
  <script src="js/js.js"></script>

</body>

</html>