@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">Consulta de pedido #{{$sale->id}}
            </div>

            <div class="card-body">
                @if($sale->seller != null)
                <div class="card-header">Detalles del Vendedor
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12 ">
                        Nombre:
                    </div>
                    <div class="col-md-6 col-sm-12 ">
                        {{$sale->seller->name}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12 ">
                        Email:
                    </div>
                    <div class="col-md-6 col-sm-12 ">
                        {{$sale->seller->email}}
                    </div>
                </div>


                @elseif($sale->employee!=null)
                <div class="card-header">Detalles del Empleado
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12 ">
                        Nombre:
                    </div>
                    <div class="col-md-6 col-sm-12 ">
                        {{$sale->employee->name}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12 ">
                        Email:
                    </div>
                    <div class="col-md-6 col-sm-12 ">
                        {{$sale->employee->email}}
                    </div>
                </div>
                @endif

                <div class="card-header">Detalles del Cliente
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12 ">
                        Nombre:
                    </div>
                    <div class="col-md-6 col-sm-12 ">
                        {{$sale->client->name}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12 ">
                        Email:
                    </div>
                    <div class="col-md-6 col-sm-12 ">
                        {{$sale->client->email}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12 ">
                        Razón Social:
                    </div>
                    <div class="col-md-6 col-sm-12 ">
                        {{$sale->client->rs}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12 ">
                        Nombre Comercial:
                    </div>
                    <div class="col-md-6 col-sm-12 ">
                        {{$sale->client->commercial_name}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12 ">
                        RFC:
                    </div>
                    <div class="col-md-6 col-sm-12 ">
                        {{$sale->client->rfc}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12 ">
                        CURP:
                    </div>
                    <div class="col-md-6 col-sm-12 ">
                        {{$sale->client->curp}}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12 ">
                        Dirección:
                    </div>
                    <div class="col-md-6 col-sm-12 ">
                        {{$sale->client->address}}
                    </div>
                </div>

                <div class="card-header">Productos adquiridos
                </div>
                <table class="table table-striped table-bordered dt-responsive nowrap" id="products-table" style="width:100%">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio Unitario</th>
                        <th scope="col">Costo Total</th>
                      </tr>
                    </thead>
                </table>
            </div>
      <script>
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
          ajax:'/sales/prod/'+{{$sale->id}},
          type:'GET',
          columns: [
              { data: 'id', name: 'id' },
              { data: 'sale_date', name: 'sale_date' },
              { data: 'total_cost', name: 'total_cost' },
              { data: 'actions', name: 'actions' },
          ]
      });


        </script>
      @endsection
