@extends('layouts.app')

@section('content') 

<div class="py-12">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <input type="hidden" name="token" value="{{ csrf_token() }}" id="token">
          <div class="card-header">Agregar Cliente
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
            <table class="table table-striped table-bordered dt-responsive nowrap" id="clients-table" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Razon Social</th>
                  <th scope="col">Nombre comercial</th>
                  <th scope="col">Correo</th>
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
      var table = $('#clients-table').DataTable({
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "Ningun registro coincide - lo sentimos",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search":"Buscar",
            "previous":"Anterior",
            "next":"Siguiente"
        },
         responsive: true,
          processing: true,
          serverSide: true,
          ajax:'/clients',
          type:'GET',
          columns: [
              { data: 'id', name: 'id' },
              { data: 'name', name: 'name' },
              { data: 'rs', name: 'rs' },
              { data: 'commercial_name', name: 'commercial_name' },
              { data: 'email', name: 'email' },
              { data: 'actions', name: 'actions' }
          ]
      });


      //Open show modal
      $('body').delegate('.get-client','click',function(){
            client_id = $(this).attr('client_id');
            $.ajax({
                url : '{{ URL::to("/clients") }}' + '/' + client_id ,
                type : 'GET',
                dataType: 'json',
                data : {id: client_id}
            }).done(function(data){
                document.getElementById("name").value = data.name;
                document.getElementById("rs").value = data.rs;
                document.getElementById("commercial_name").value = data.commercial_name;
                document.getElementById("rfc").value = data.rfc;
                document.getElementById("address").value = data.address;
                document.getElementById("birthdate").value = data.birthdate;
                document.getElementById("email").value = data.email;
                document.getElementById("curp").value = data.curp;
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

  });
  </script>
@endsection
@include('clients.modals')



