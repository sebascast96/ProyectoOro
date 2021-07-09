@extends('layouts.app')

@section('content')

<div class="py-12">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <input type="hidden" name="token" value="{{ csrf_token() }}" id="token">
          <div class="card-header">Empleados
            <a class="btn btn-success" href="{{ route('employees.create') }}">
              Agregar
            </a>
          </div>
          <div class="card-body">
            @if (session()->has('message'))
              <div class="alert alert-primary" role="alert">
                {{session()->get('message') }}
              </div>
            @endif
            <table class="table table-striped table-bordered dt-responsive nowrap" id="employees-table" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Correo</th>
                  <th scope="col">RFC</th>
                  <th scope="col">CURP</th>
                  <th scope="col">Dirección</th>
                  <th scope="col">Cumpleaños</th>
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
      var table = $('#employees-table').DataTable({
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Ningún registro coincide - lo sentimos",
            "info": "Mostrando página _PAGE_ de _PAGES_",
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
          ajax:'/employees',
          type:'GET',
          columns: [
              { data: 'id', name: 'id' },
              { data: 'name', name: 'name' },
              { data: 'email', name: 'email' },
              { data: 'rfc', name: 'rfc' },
              { data: 'curp', name: 'curp' },
              { data: 'address', name: 'address' },
              { data: 'birthdate', name: 'birthdate' },
              { data: 'actions', name: 'actions' },
          ]
      });


      //Open show modal
      $('body').delegate('.get-employee','click',function(){
            employee_id = $(this).attr('employee_id');
            $.ajax({
                url : '{{ URL::to("/employees") }}' + '/' + employee_id ,
                type : 'GET',
                dataType: 'json',
                data : {id: employee_id}
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
            employee_id = $(this).attr('employee_id');
            $.ajax({
                url : '{{ URL::to("/employees") }}' + '/' + employee_id ,
                type : 'GET',
                dataType: 'json',
                data : {id: employee_id}
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


        $('body').delegate('.del-employee','click',function(){
          employee_id = $(this).attr('employee_id');
          var token = $("#token").val();
        swal({
          title: "¿Quieres eliminar este emploeado?",
          text: "Una vez eliminado ya no se puede recuperar la información",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
                        url: '/employees/'+ employee_id,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'DELETE',
                        dataType: 'json',
                    })
                      table.ajax.reload();

            swal("El empleado a sido eliminado", {
              icon: "success",
            });
          } else {
            swal("Empleado no eliminado");
          }
        });
      });

  });
  </script>
@endsection
@include('employees.modals')



