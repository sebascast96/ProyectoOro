@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">Ventas
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                    <div class="alert alert-primary" role="alert">
                        {{session()->get('message') }}
                    </div>
                    @endif

                    <table class="table table-striped table-bordered dt-responsive nowrap" id="sales-table" style="width:100%">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Costo Total</th>
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
      var table = $('#sales-table').DataTable({
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
          ajax:'/sales',
          type:'GET',
          columns: [
              { data: 'id', name: 'id' },
              { data: 'sale_date', name: 'sale_date' },
              { data: 'total_cost', name: 'total_cost' },
              { data: 'actions', name: 'actions' },
          ]
      });


      //Open show modal
      $('body').delegate('.get-sale','click',function(){
            sale_id = $(this).attr('sale_id');
            $.ajax({
                url : '{{ URL::to("/sale") }}' + '/' + sale_id ,
                type : 'GET',
                dataType: 'json',
                data : {id: sale_id}
            }).done(function(data){
                document.getElementById("sale_date").value = data.sale_date;
                document.getElementById("total_codt").value = data.total_cost;
            });
        });


        $('body').delegate('.get-edit','click',function(){
            sale_id = $(this).attr('sale_id');
            $.ajax({
                url : '{{ URL::to("/sales") }}' + '/' + sale_id ,
                type : 'GET',
                dataType: 'json',
                data : {id: sale_id}
            }).done(function(data){
                document.getElementById("id").value = data.id;
                document.getElementById("sale_date_edit").value = data.name;
                document.getElementById("total_cost_edit").value = data.total_cost;
            });
        });


        $('body').delegate('.del-sale','click',function(){
          seller_id = $(this).attr('sale_id');
          var token = $("#token").val();
        swal({
          title: "¿Quieres eliminar esta venta?",
          text: "Una vez eliminado ya no se puede recuperar la información",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
                        url: '/sale/'+ sale_id,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'DELETE',
                        dataType: 'json',
                    })
                      table.ajax.reload();

            swal("La venta a sido eliminada", {
              icon: "success",
            });
          } else {
            swal("Venta no eliminada");
          }
        });
      });

  });
  </script>
@endsection


