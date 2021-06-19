var  application_type = new Vue({
 el:'#App_type',
 data:{
  allData:'',
ALL: "",
  myModel:false,
  actionButton:'Insert',
  dynamicTitle:'Add Data',
vif_msg: false,
 msg: '',
 hiddenId: '',
 col_desp: false,
 date: new Date().toISOString().substr(0, 10),  
 TYID: '',
 TYNAME: '',
 },
 methods:{
 clear: function () {
//    application_type.TYID = 0;
application_type.TYNAME ="";
  application_type.max();

// لجلب قريد حسب المعرف
 // application_type.GetDataById_type( application_type.TYID);

// لجلب قريد  
 application_type.fetchAllData_type();

 },
 max:function( ){
   axios.post('action.php', {
    action:'max_type'
 }).then(function(response){
  application_type.TYID = response.data.tyId;
 // application_type.myModel = true;
   });
  }
   ,  
  fetchAllData_type:function(){
   axios.post('action.php', {
    action:'g_type'
   }).then(function(response){
     application_type.allData = response.data;
   });
  },
openModel_type:function(){
 application_type.actionButton = "Insert";
 application_type.dynamicTitle = "Add Data";

 application_type.clear();
  },
submitData_type:function(){
if( application_type.TYID  !='' && application_type.TYNAME  !='' )
   {
    if( application_type.actionButton == 'Insert')
    {
     axios.post('action.php', {
      action:'i_type',
_tyId: application_type.TYID, 
_tyName: application_type.TYNAME, 
}).then(function(response){
 application_type.myModel = false;
 // alert(response.data.message);
 application_type.msg = response.data.message;
  application_type.vif_msg=true;
  application_type.clear();
     });
    }
    if( application_type.actionButton == 'Update')
    {
     axios.post('action.php', {
      action:'u_type',
_tyId :  application_type.TYID,
_tyName :  application_type.TYNAME,
      hiddenId :  application_type.hiddenId
     }).then(function(response){
       application_type.myModel = false;
 application_type.hiddenId = '';
 application_type.msg = response.data.message;
  application_type.vif_msg=true;
  application_type.clear();
     });
    }
   }
   else
   {
    alert("Fill All Field");
   }
  },
  fetchData_type:function(id){
   axios.post('action.php', {
    action:'s_type',
_tyId:id
   }).then(function(response){
  application_type.TYID = response.data.tyId;
  application_type.TYNAME = response.data.tyName;
     application_type.hiddenId = response.data.tyId;
     application_type.actionButton = 'Update';
     application_type.dynamicTitle = 'Edit Data';
 // application_type.myModel = true;
   });
  },
add_all_type: function () {
var tbl_type = document.getElementById("tbl_type");
for (i = 1; i < tbl_type.rows.length; i++) {
 const __tyId= tbl_type.rows[i].cells.namedItem("row_tyId").innerHTML;
 const __tyName= tbl_type.rows[i].cells.namedItem("row_tyName").innerHTML;
  application_type.ALL = [ __tyId,__tyName];
        axios
          .post("action.php", {
            action: "add_all_type",
            _all:  application_type.ALL,
          })
          .then(function (response) {
            application.msg = response.data.message; //
          });
      }
       application_type.clear();
       application_type.vif_msg = true;
  application_type.deleteRowsTable();
    }
,
typeSerche :function (ind=1 )  {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input =document.getElementById("txt_serche");
  filter = input.value.toUpperCase();
  table = document.getElementById("tbl_type");
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
}

,
 add_row :function() {
 var tbl_type = document.getElementById("tbl_type");

var _tyId = document.getElementById("tyId").value;
var _tyName = document.getElementById("tyName").value;
 
      if (  _tyId.length < 1) {
 alert("please enter TYID");
 return;
 }
      if (  _tyName.length < 1) {
 alert("please enter TYNAME");
 return;
 }
 
let template=
`<tr  ondblclick='SetOnclick(this)'>
<td  name="row_tyId" id="row_tyId"  >${_tyId}</td>
<td  name="row_tyName" id="row_tyName"  >${_tyName}</td>
<td><button type="button" name="edit" class="btn btn-primary btn-xs edit" @click="fetchData_type(row.tyId)">Edit</button></td>
<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" @click="deleteData_type(row.tyId)">Delete</button></td>
</tr>
`
tbl_type.innerHTML+=template;
 
   // s-reset
    application_type.TYID = '';
    application_type.TYNAME = '';
   // e-reset
    }
,
Reset_txt_serche: function() { 
var btn = document.getElementById("btn_serche"); 
var inputs = document.getElementById("txt_serche"); 
inputs.value = ""; 
  application_type.typeSerche();
} 
,
 GetDataById_type: function (id = 1) 
{
      axios
        .post("action.php", {
          action: "GetDataById_type",
          _tyId: id,
        })
        .then(function (response) {
           application_type.allData = response.data;
        });
    }
,
////تفريغ الجدول من حقول
    deleteRowsTable: function () {
      var tbl_type = document.getElementById("tbl_type");
      for (i =tbl_type.rows.length-1; i >0; i--) {
        tbl_type.deleteRow(i);
      }
    } 
 ,
  deleteData_type:function(id){
   if(confirm("Are you sure you want to remove this data?"))
   {
    axios.post('action.php', {
     action:'d_type',
_tyId:id
    }).then(function(response){
      application_type.fetchAllData_type();
 // alert(response.data.message);
 application_type.msg = response.data.message;
  application_type.vif_msg=true;
  application_type.clear();

    });
   }
  }
  },
  mounted() {
document.addEventListener("DOMContentLoaded", function () {
  application_type.clear();
// لجلب قريد حسب المعرف
  //  application_type.GetDataById_type( application_type.TYID);

// لجلب قريد كل البيانات 
// application_type.fetchAllData_type();

    });
  },
  created: function () {
// لجلب قريد حسب المعرف
//this.GetDataById_type( application_type.TYID);

// لجلب قريد كل البيانات 
 //  this.fetchAllData_type();
  },
});
// <script>
  function SetOnclick(row) {
 document.getElementById('tyId').value=row.cells.namedItem("row_tyId").innerText;
 document.getElementById('tyName').value=row.cells.namedItem("row_tyName").innerText;
   }
// </script>
function DeleteRowFromTableById() {
  var tbl_type = document.getElementById("tbl_type");
  for (i = 1; i < tbl_type.rows.length; i++) 
{
var id = document.getElementById("tyId").value ;
var datas =tbl_type.rows[i].cells.namedItem("row_tyId").innerText ;
 
    if (id == datas) tbl_type.deleteRow(i);
  }
  }
