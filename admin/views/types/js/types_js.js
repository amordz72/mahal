var application_types = new Vue({
  el: "#App_types",
  data: {
    allData: "",
    ALL: "",
    myModel: false,
    actionButton: "Insert",
    dynamicTitle: "Add Data",
    vif_msg: false,
    msg: "",
    hiddenId: "",
    col_desp: false,
    date: new Date().toISOString().substr(0, 10),
    TYID: "",
    TYNAME: "",
  },
  methods: {
    clear: function () {
      //    application_types.TYID = 0;
      application_types.TYNAME = "";
      application_types.max();

      // لجلب قريد حسب المعرف
      // application_types.GetDataById_types( application_types.TYID);

      // لجلب قريد
      application_types.fetchAllData_types();
    },
    max: function () {
      axios
        .post("types/action.php", {
          action: "max_types",
        })
        .then(function (response) {
          application_types.TYID = response.data.tyId;
          // application_types.myModel = true;
        });
    },
    fetchAllData_types: function () {
      axios
        .post("types/action.php", {
          action: "g_types",
        })
        .then(function (response) {
          application_types.allData = response.data;
        });
    },
    openModel_types: function () {
      application_types.actionButton = "Insert";
      application_types.dynamicTitle = "Add Data";

      application_types.clear();
    },
    submitData_types: function () {
      if (application_types.TYID != "" && application_types.TYNAME != "") {
        if (application_types.actionButton == "Insert") {
          axios
            .post("types/action.php", {
              action: "i_types",
              _tyId: application_types.TYID,
              _tyName: application_types.TYNAME,
            })
            .then(function (response) {
              application_types.myModel = false;
              // alert(response.data.message);
              application_types.msg = response.data.message;
              application_types.vif_msg = true;
              application_types.clear();
            });
        }
        if (application_types.actionButton == "Update") {
          axios
            .post("types/action.php", {
              action: "u_types",
              _tyId: application_types.TYID,
              _tyName: application_types.TYNAME,
              hiddenId: application_types.hiddenId,
            })
            .then(function (response) {
              application_types.myModel = false;
              application_types.hiddenId = "";
              application_types.msg = response.data.message;
              application_types.vif_msg = true;
              application_types.clear();
            });
        }
      } else {
        alert("Fill All Field");
      }
    },
    fetchData_types: function (id) {
      axios
        .post("types/action.php", {
          action: "s_types",
          _tyId: id,
        })
        .then(function (response) {
          application_types.TYID = response.data.tyId;
          application_types.TYNAME = response.data.tyName;
          application_types.hiddenId = response.data.tyId;
          application_types.actionButton = "Update";
          application_types.dynamicTitle = "Edit Data";
          // application_types.myModel = true;
        });
    },
    add_all_types: function () {
      var tbl_types = document.getElementById("tbl_types");
      for (i = 1; i < tbl_types.rows.length; i++) {
        const __tyId = tbl_types.rows[i].cells.namedItem("row_tyId").innerHTML;
        const __tyName =
          tbl_types.rows[i].cells.namedItem("row_tyName").innerHTML;
        application_types.ALL = [__tyId, __tyName];
        axios
          .post("types/action.php", {
            action: "add_all_types",
            _all: application_types.ALL,
          })
          .then(function (response) {
            application.msg = response.data.message; //
          });
      }
      application_types.clear();
      application_types.vif_msg = true;
      application_types.deleteRowsTable();
    },
    typesSerche: function (ind = 1) {
      // Declare variables
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("txt_serche");
      filter = input.value.toUpperCase();
      table = document.getElementById("tbl_types");
      tr = table.getElementsByTagName("tr");
      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[ind];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    },

    add_row: function () {
      var tbl_types = document.getElementById("tbl_types");

      var _tyId = document.getElementById("tyId").value;
      var _tyName = document.getElementById("tyName").value;

      if (_tyId.length < 1) {
        alert("please enter TYID");
        return;
      }
      if (_tyName.length < 1) {
        alert("please enter TYNAME");
        return;
      }

      let template = `<tr  ondblclick='SetOnclick(this)'>
<td  name="row_tyId" id="row_tyId"  >${_tyId}</td>
<td  name="row_tyName" id="row_tyName"  >${_tyName}</td>
<td><button type="button" name="edit" class="btn btn-primary btn-xs edit" @click="fetchData_types(row.tyId)">Edit</button></td>
<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" @click="deleteData_types(row.tyId)">Delete</button></td>
</tr>
`;
      tbl_types.innerHTML += template;

      // s-reset
      application_types.TYID = "";
      application_types.TYNAME = "";
      // e-reset
    },
    Reset_txt_serche: function () {
      var btn = document.getElementById("btn_serche");
      var inputs = document.getElementById("txt_serche");
      inputs.value = "";
      application_types.typesSerche();
    },
    GetDataById_types: function (id = 1) {
      axios
        .post("types/action.php", {
          action: "GetDataById_types",
          _tyId: id,
        })
        .then(function (response) {
          application_types.allData = response.data;
        });
    },
    ////تفريغ الجدول من حقول
    deleteRowsTable: function () {
      var tbl_types = document.getElementById("tbl_types");
      for (i = tbl_types.rows.length - 1; i > 0; i--) {
        tbl_types.deleteRow(i);
      }
    },
    deleteData_types: function (id) {
      if (confirm("Are you sure you want to remove this data?")) {
        axios
          .post("types/action.php", {
            action: "d_types",
            _tyId: id,
          })
          .then(function (response) {
            application_types.fetchAllData_types();
            // alert(response.data.message);
            application_types.msg = response.data.message;
            application_types.vif_msg = true;
            application_types.clear();
          });
      }
    },
  },
  mounted() {
    document.addEventListener("DOMContentLoaded", function () {
      application_types.clear();
      // لجلب قريد حسب المعرف
      //  application_types.GetDataById_types( application_types.TYID);

      // لجلب قريد كل البيانات
      // application_types.fetchAllData_types();
    });
  },
  created: function () {
    // لجلب قريد حسب المعرف
    //this.GetDataById_types( application_types.TYID);
    // لجلب قريد كل البيانات
    //  this.fetchAllData_types();
  },
});
// <script>
function SetOnclick(row) {
  document.getElementById("tyId").value =
    row.cells.namedItem("row_tyId").innerText;
  document.getElementById("tyName").value =
    row.cells.namedItem("row_tyName").innerText;
}
// </script>
function DeleteRowFromTableById() {
  var tbl_types = document.getElementById("tbl_types");
  for (i = 1; i < tbl_types.rows.length; i++) {
    var id = document.getElementById("tyId").value;
    var datas = tbl_types.rows[i].cells.namedItem("row_tyId").innerText;

    if (id == datas) tbl_types.deleteRow(i);
  }
}
