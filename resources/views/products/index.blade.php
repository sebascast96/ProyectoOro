@extends('layouts.app')

@section('content')

<div class="py-12">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <input type="hidden" name="token" value="{{ csrf_token() }}" id="token">
          <div class="card-header">Productos
            <a class="btn btn-success" href="{{ route('products.create') }}">
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
    function format(item) { return item.name; };
    $select2 = $('.select2').select2({
      placeholder: "Elige el proveedor que deseas ligar",
      ajax:{
        url:'/fill',
        dataType: 'json',
        type:'GET',
        processResults: function (data) {
          return {
            results: $.map(data, function(obj) {
              return { id: obj.id, text: obj.name };
            })
          };
        }
      },
    });
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
      $('body').delegate('.get-product','click',function(){
            product_id = $(this).attr('product_id');
            $.ajax({
                url : '{{ URL::to("/products") }}' + '/' + product_id ,
                type : 'GET',
                dataType: 'json',
                data : {id: product_id}
            }).done(function(data){
                document.getElementById("name").value = data.name;
                document.getElementById("description").value = data.description;
                document.getElementById("amount").value = data.amount;
                document.getElementById("price_perunit").value = data.price_perunit;
            });
        });





        $('body').delegate('.get-edit','click',function(){
            product_id = $(this).attr('product_id');
            $.ajax({
                url : '{{ URL::to("/products") }}' + '/' + product_id ,
                type : 'GET',
                dataType: 'json',
                data : {id: product_id}
            }).done(function(data){
                document.getElementById("id").value = data.id;
                document.getElementById("name_edit").value = data.name;
                document.getElementById("description_edit").value = data.description;
                document.getElementById("amount_edit").value = data.amount;
                document.getElementById("price_perunit_edit").value = data.price_perunit;
            });
        });

        $('body').delegate('.get-prov','click',function(){
            product_id = $(this).attr('product_id');
            document.getElementById("idl").value = $(this).attr('product_id');
              var table2 = $('#prov-table').DataTable();
              table2.destroy();
              table2 = $('#prov-table').DataTable({
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
                ajax:'/products-prov' + '/' + product_id,
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
          });

        function form_submit() {
          document.getElementById("update_prod").submit();
        }

        $('body').delegate('.del-product','click',function(){
          product_id = $(this).attr('product_id');
          var token = $("#token").val();
        swal({
          title: "¿Quieres eliminar este producto?",
          text: "Una vez eliminado ya no se puede recuperar la información",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
                        url: '/products/'+ product_id,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'DELETE',
                        dataType: 'json',
                    })
                      table.ajax.reload();

            swal("El producto a sido eliminado", {
              icon: "success",
            });
          } else {
            swal("Producto no eliminado");
          }
        });
      });


      $('body').delegate('.del-product-sup','click',function(){
          supplier_id = $(this).attr('supplier_id');
          var token = $("#token").val();
        swal({
          title: "¿Remover proveedor del producto?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
                        url: '/products/supplier/'+ supplier_id,
                        headers: {'X-CSRF-TOKEN': token},
                        data: {product_id: product_id},
                        type: 'DELETE',
                        dataType: 'json',
                    })
                    var table2 = $('#prov-table').DataTable();
                      table2.ajax.reload();

            swal("El proveedor a sido eliminado de este producto", {
              icon: "success",
            });
          } else {
            swal("Producto no eliminado");
          }
        });
      });
  });
  </script>
@endsection
@include('products.modals')

