@extends('layouts.app')

@section('content') 

<div class="py-12">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <input type="hidden" name="token" value="{{ csrf_token() }}" id="token">
          <div class="card-header">Proveedores
            <a class="btn btn-success" href="{{ route('suppliers.create') }}">
              Agregar
            </a>
          </div>
          <div class="card-body">
            @if (session()->has('message'))
              <div class="alert alert-primary" role="alert">
                {{session()->get('message') }}
              </div>
            @endif
            <table class="table table-striped table-bordered dt-responsive nowrap" id="suppliers-table" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Dirección</th>
                  <th scope="col">Teléfono</th>
                  <th scope="col">Información de Contacto</th>
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
      var table = $('#suppliers-table').DataTable({
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
          ajax:'/suppliers',
          type:'GET',
          columns: [
              { data: 'id', name: 'id' },
              { data: 'name', name: 'name' },
              { data: 'address', name: 'address' },
              { data: 'phone', name: 'phone' },
              { data: 'contact_info', name: 'contact_info' },
              { data: 'actions', name: 'actions' },
          ]
      });


      //Open show modal
      $('body').delegate('.get-supplier','click',function(){
            supplier_id = $(this).attr('supplier_id');
            $.ajax({
                url : '{{ URL::to("/suppliers") }}' + '/' + supplier_id ,
                type : 'GET',
                dataType: 'json',
                data : {id: supplier_id}
            }).done(function(data){
                document.getElementById("name").value = data.name;
                document.getElementById("address").value = data.address;
                document.getElementById("phone").value = data.phone;
                document.getElementById("contact_info").value = data.contact_info;
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
                document.getElementById("address_edit").value = data.address;
                document.getElementById("phone_edit").value = data.phone;
                document.getElementById("contact_info_edit").value = data.contact_info;
            });
        });


        $('body').delegate('.del-supplier','click',function(){
          supplier_id = $(this).attr('supplier_id');
          var token = $("#token").val();
        swal({
          title: "¿Quieres eliminar este proveedor?",
          text: "Una vez eliminado ya no se puede recuperar la información",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
                        url: '/supplier/'+ supplier_id,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'DELETE',
                        dataType: 'json',
                    })
                      table.ajax.reload();
                    
            swal("El proveedor a sido eliminado", {
              icon: "success",
            });
          } else {
            swal("Proveedor no eliminado");
          }
        });
      });

  });
  </script>
@endsection
@include('suppliers.modals')



