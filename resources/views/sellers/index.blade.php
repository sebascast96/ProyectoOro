@extends('layouts.app')

@section('content') 

<div class="py-12">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <input type="hidden" name="token" value="{{ csrf_token() }}" id="token">
          <div class="card-header">Vendedores
            <a class="btn btn-success" href="{{ route('sellers.create') }}">
              Agregar
            </a>
          </div>
          <div class="card-body">
            @if (session()->has('message'))
              <div class="alert alert-primary" role="alert">
                {{session()->get('message') }}
              </div>
            @endif
            <table class="table table-striped table-bordered dt-responsive nowrap" id="sellers-table" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Correo</th>
                  <th scope="col">RFC</th>
                  <th scope="col">CURP</th>
                  <th scope="col">Dirección</th>
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
      var table = $('#sellers-table').DataTable({
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
          ajax:'/sellers',
          type:'GET',
          columns: [
              { data: 'id', name: 'id' },
              { data: 'name', name: 'name' },
              { data: 'email', name: 'email' },
              { data: 'rfc', name: 'rfc' },
              { data: 'curp', name: 'curp' },
              { data: 'email', name: 'email' },
              { data: 'actions', name: 'actions' }
          ]
      });


      //Open show modal
      $('body').delegate('.get-seller','click',function(){
            seller_id = $(this).attr('seller_id');
            $.ajax({
                url : '{{ URL::to("/sellers") }}' + '/' + seller_id ,
                type : 'GET',
                dataType: 'json',
                data : {id: seller_id}
            }).done(function(data){
                document.getElementById("name").value = data.name;
                document.getElementById("email").value = data.email;
                document.getElementById("rfc").value = data.rfc;
                document.getElementById("curp").value = data.curp;
                document.getElementById("address").value = data.address;
                document.getElementById("birthdate").value = data.birthdate;
            });
        });


        $('body').delegate('.get-edit','click',function(){
            seller_id = $(this).attr('seller_id');
            $.ajax({
                url : '{{ URL::to("/sellers") }}' + '/' + seller_id ,
                type : 'GET',
                dataType: 'json',
                data : {id: seller_id}
            }).done(function(data){
                document.getElementById("id").value = data.id;
                document.getElementById("name_edit").value = data.name;
                document.getElementById("email_edit").value = data.email;
                document.getElementById("rfc_edit").value = data.rfc;
                document.getElementById("curp_edit").value = data.curp;
                document.getElementById("address_edit").value = data.address;
                document.getElementById("birthdate_edit").value = data.birthdate;
            });
        });


        $('body').delegate('.del-seller','click',function(){
          seller_id = $(this).attr('seller_id');
          var token = $("#token").val();
        swal({
          title: "¿Quieres eliminar este vendedor?",
          text: "Una vez eliminado ya no se puede recuperar la información",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
                        url: '/sellers/'+ seller_id,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'DELETE',
                        dataType: 'json',
                    })
                      table.ajax.reload();
                    
            swal("El vendedor a sido eliminado", {
              icon: "success",
            });
          } else {
            swal("Vendedor no eliminado");
          }
        });
      });

  });
  </script>
@endsection
@include('sellers.modals')



