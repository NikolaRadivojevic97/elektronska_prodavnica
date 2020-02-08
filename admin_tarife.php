<?php include("admin_header.html");?>
<html>
 <head>
  <title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:98%;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
  </style>
 </head>
 <body>
  <div class="container box">
   <h1 >Tarife</h1>
   <br />
   <div class="table-responsive">
    <br />
    <div >
     <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Dodaj tarifu</button>
    </div>
    <br /><br />
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th width="15%">Naziv</th>
       <th width="15%">Broj minuta</th>
       <th width="15%">Broj poruka</th>
       <th width="15%">Broj MB</th>
       <th width="10%">Cena</th>
       <th width="20%">Slika</th>
       <th width="5%">Izmeni</th>
       <th width="5%">Obrisi</th>
      </tr>
     </thead>
    </table>
    
   </div>
  </div>
 </body>
</html>

<div id="userModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="user_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Dodaj tarifu</h4>
    </div>
    <div class="modal-body">
     <label>Naziv</label>
     <input type="text" name="naziv_paketa" id="naziv_paketa" class="form-control" />
     <br />
     <label>Broj minuta</label>
     <input type="text" name="broj_minuta" id="broj_minuta" class="form-control" />
     <br />
     <label>Broj poruka</label>
     <input type="text" name="broj_sms" id="broj_sms" class="form-control" />
     <br />
     <label>Broj MB</label>
     <input type="text" name="broj_mb" id="broj_mb" class="form-control" />
     <br />
     <label>Cena</label>
     <input type="text" name="cena" id="cena" class="form-control" />
     <br />
     <label>Slika</label>
     <input type="text" name="url" id="url" class="form-control" />
     
    </div>
    <div class="modal-footer">
     <input type="hidden" name="paket_id" id="paket_id" />
     <input type="hidden" name="operation" id="operation" />
     <input type="submit" name="action" id="action" class="btn btn-success" value="Dodaj" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
    </div>
   </div>
  </form>
 </div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('#add_button').click(function(){
  $('#user_form')[0].reset();
  $('.modal-title').text("Dodaj tarifu");
  $('#action').val("Dodaj");
  $('#operation').val("Dodaj");
  
 });
 
 var dataTable = $('#user_data').DataTable({
     language: {
        search: "Pretrazi po nazivu: "
     },
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"fetch_tarife.php",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0,1,2,3,4,5,6,7],
    "orderable":false,
   },
  ],

 });

 $(document).on('submit', '#user_form', function(event){
  event.preventDefault();
  
  var naziv_paketa = $('#naziv_paketa').val();
  var broj_minuta = $('#broj_minuta').val();
  var broj_sms = $('#broj_sms').val();
  var broj_mb = $('#broj_mb').val();
  var cena = $('#cena').val();
  var url = $('#url').val();
 
  

  if(naziv_paketa != '' && broj_minuta != '' && broj_sms != '' && broj_mb != '' && cena != '' && url != '')
  {
   $.ajax({
    url:"insert_tarife.php",
    method:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
     alert(data);
     $('#user_form')[0].reset();
     $('#userModal').modal('hide');
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   alert("Sva polja moraju biti popunjena");
  }
 });
 
 $(document).on('click', '.update', function(){
  var paket_id = $(this).attr("id");
  $.ajax({
   url:"fetch_single_tarife.php",
   method:"POST",
   data:{paket_id:paket_id},
   dataType:"json",
   success:function(data)
   {
    $('#userModal').modal('show');
    $('#naziv_paketa').val(data.naziv_paketa);
    $('#broj_minuta').val(data.broj_minuta);
    $('#broj_sms').val(data.broj_sms);
    $('#broj_mb').val(data.broj_mb);
    $('#cena').val(data.cena);;
    $('#url').val(data.url);;
    $('.modal-title').text("Izmeni");
    $('#paket_id').val(paket_id);
    $('#action').val("Izmeni");
    $('#operation').val("Izmeni");
   }
  })
 });
 
 $(document).on('click', '.delete', function(){
  var paket_id = $(this).attr("id");
  if(confirm("Da li ste sigurni da zelite obrisati?"))
  {
   $.ajax({
    url:"delete_tarife.php",
    method:"POST",
    data:{paket_id:paket_id},
    success:function(data)
    {
     alert(data);
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   return false; 
  }
 });
 
 
});
</script>