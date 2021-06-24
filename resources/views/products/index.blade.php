@extends('layouts.app')

@section('content') 

<div class="py-12">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <input type="hidden" name="token" value="{{ csrf_token() }}" id="token">
          <div class="card-header">Productos
            <a class="btn btn-success" href="{{ route('clients.create') }}">
              Agregar
            </a>
          </div>
          <div class="card-body">
            @if (session()->has('message'))
              <div class="alert alert-primary" role="alert">
                {{session()->get('message') }}
              </div>
            @endif
            <table class="table table-striped table-bordered dt-responsive nowrap" id="products-table" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Precio Unitario</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>               
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
      //Datatable
      var table = $('#products-table').DataTable({
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "Ningun registro coincide - lo sentimos",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search":"Buscar",
            "paginate": {
              "first": "Primero",
              "last": "Ultimo",
              "next": "Siguiente",
              "previous": "Anterior"
            },
            "processing":"Procesando.."
        },
        info: true,
         responsive: true,
          processing: true,
          serverSide: true,
          ajax:'/products',
          type:'GET',
          columns: [
              { data: 'id', name: 'id' },
              { data: 'name', name: 'name' },
              { data: 'description', name: 'description' },
              { data: 'amount', name: 'amount' },
              { data: 'price_perunit', name: 'price_perunit' },
              { data: 'actions', name: 'actions' }
          ]
      });


      //Open show modal
     /* $('body').delegate('.get-client','click',function(){
            client_id = $(this).attr('client_id');
            $.ajax({
                url : '{{ URL::to("/clients") }}' + '/' + client_id ,
                type : 'GET',
                dataType: 'json',
                data : {id: client_id}
            }).done(function(data){
                document.getElementById("name").value = data.name;
                document.getElementById("rs").value = data.rs;
                document.getElementById("amount").value = data.amount;
                document.getElementById("rfc").value = data.rfc;
                document.getElementById("address").value = data.address;
                document.getElementById("birthdate").value = data.birthdate;
                document.getElementById("price_perunit").value = data.price_perunit;
                document.getElementById("curp").value = data.curp;
            });
        });


        $('body').delegate('.get-edit','click',function(){
            client_id = $(this).attr('client_id');
            $.ajax({
                url : '{{ URL::to("/clients") }}' + '/' + client_id ,
                type : 'GET',
                dataType: 'json',
                data : {id: client_id}
            }).done(function(data){
                document.getElementById("id").value = data.id;
                document.getElementById("name_edit").value = data.name;
                document.getElementById("rs_edit").value = data.rs;
                document.getElementById("commercial_name_edit").value = data.amount;
                document.getElementById("rfc_edit").value = data.rfc;
                document.getElementById("address_edit").value = data.address;
                document.getElementById("birthdate_edit").value = data.birthdate;
                document.getElementById("email_edit").value = data.price_perunit;
                document.getElementById("curp_edit").value = data.curp;
            });
        });


        $('body').delegate('.del-client','click',function(){
          client_id = $(this).attr('client_id');
          var token = $("#token").val();
        swal({
          title: "¿Quieres eliminar este cliente?",
          text: "Una vez eliminado ya no se puede recuperar la información",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
                        url: '/clients/'+ client_id,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'DELETE',
                        dataType: 'json',
                    })
                      table.ajax.reload();
                    
            swal("El cliente a sido eliminado", {
              icon: "success",
            });
          } else {
            swal("Cliente no eliminado");
          }
        });
      });
*/
  });
  </script>
@endsection



