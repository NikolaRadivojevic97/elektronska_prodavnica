
<?php include("admin_header.html");?>
  <div class="container box">
   <h1 >Mobilni telefoni</h1>
   <br />
   <div class="table-responsive">
    <br />
    <div >
     <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Dodaj telefon</button>
    </div>
    <br /><br />
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th width="5%">Proizvodjac</th>
       <th width="5%">Model</th>
       <th width="2%">Masa</th>
       <th width="10%">Dimenzije</th>
       <th width="25%">Kamera</th>
       <th width="5%">Procesor</th>
       <th width="15%">Baterija</th>
       <th width="5%">Operativni sistem</th>
       <th width="5%">Memorija</th>
       <th width="5%">Slika</th>
       <th width="5%">Cena</th>
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
     <h4 class="modal-title">Dodaj telefon</h4>
    </div>
    <div class="modal-body">
     <label>Proizvodjac</label>
     <input type="text" name="proizvodjac" id="proizvodjac" class="form-control" />
     <br />
     <label>Naziv</label>
     <input type="text" name="naziv" id="naziv" class="form-control" />
     <br />
     <label>Masa</label>
     <input type="text" name="masa" id="masa" class="form-control" />
     <br />
     <label>Dimenzije</label>
     <input type="text" name="dimenzije" id="dimenzije" class="form-control" />
     <br />
     <label>Kamera</label>
     <input type="text" name="kamera" id="kamera" class="form-control" />
     <br />
     <label>Procesor</label>
     <input type="text" name="procesor" id="procesor" class="form-control" />
     <br />
     <label>Baterija</label>
     <input type="text" name="baterija" id="baterija" class="form-control" />
     <br />
     <label>Operativni sistem</label>
     <input type="text" name="oprativni_sistem" id="oprativni_sistem" class="form-control" />
     <br />
     <label>Memorija</label>
     <input type="text" name="memorija" id="memorija" class="form-control" />
     <br />
     <label>Slika</label>
     <input type="text" name="slika" id="slika" class="form-control" />
     <br />
     <label>Cena</label>
     <input type="text" name="cena" id="cena" class="form-control" />
     
    </div>
    <div class="modal-footer">
     <input type="hidden" name="model_id" id="model_id" />
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
  $('.modal-title').text("Dodaj telefon");
  $('#action').val("Dodaj");
  $('#operation').val("Dodaj");
  
 });
 
 var dataTable = $('#user_data').DataTable({
     language: {
        search: "Pretrazi po modelu: "
     },
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"fetch.php",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0,1,2,3,4,5,6,7,8,9,10,11,12],
    "orderable":false,
   },
  ],

 });

 $(document).on('submit', '#user_form', function(event){
  event.preventDefault();
  var proizvodjac = $('#proizvodjac').val();
  var naziv = $('#naziv').val();
  var masa = $('#masa').val();
  var dimenzije = $('#dimenzije').val();
  var kamera = $('#kamera').val();
  var procesor = $('#procesor').val();
  var baterija = $('#baterija').val();
  var operativniSistem = $('#oprativni_sistem').val();
  var memorija = $('#memorija').val();
  var slika = $('#slika').val();
  var cena = $('#cena').val();
  

  if(proizvodjac != '' && naziv != '' && masa != '' && dimenzije != '' && kamera != '' && procesor != '' && baterija != '' && operativniSistem != '' && memorija != '' && slika != '' && cena != '')
  {
   $.ajax({
    url:"insert.php",
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
  var model_id = $(this).attr("id");
  $.ajax({
   url:"fetch_single.php",
   method:"POST",
   data:{model_id:model_id},
   dataType:"json",
   success:function(data)
   {
    $('#userModal').modal('show');
    $('#proizvodjac').val(data.proizvodjac);
    $('#naziv').val(data.naziv);
    $('#masa').val(data.masa);
    $('#dimenzije').val(data.dimenzije);
    $('#kamera').val(data.kamera);;
    $('#procesor').val(data.procesor);;
    $('#baterija').val(data.baterija);
    $('#oprativni_sistem').val(data.oprativni_sistem);
    $('#memorija').val(data.memorija);
    $('#slika').val(data.slika);
    $('#cena').val(data.cena);
    $('.modal-title').text("Izmeni");
    $('#model_id').val(model_id);
    $('#action').val("Izmeni");
    $('#operation').val("Izmeni");
   }
  })
 });
 
 $(document).on('click', '.delete', function(){
  var model_id = $(this).attr("id");
  if(confirm("Da li ste sigurni da zelite obrisati?"))
  {
   $.ajax({
    url:"delete.php",
    method:"POST",
    data:{model_id:model_id},
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


<br><br>