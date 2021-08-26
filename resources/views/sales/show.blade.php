@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Consulta de pedido #{{ $sale->id }}
                        </div>

                        <div class="card-body">
                            @if ($sale->seller != null)
                                <div class="card-header">Detalles del Vendedor
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 col-sm-12 ">
                                        Nombre:
                                    </div>
                                    <div class="col-md-6 col-sm-12 ">
                                        {{ $sale->seller->name }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 col-sm-12 ">
                                        Email:
                                    </div>
                                    <div class="col-md-6 col-sm-12 ">
                                        {{ $sale->seller->email }}
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
                                        {{ $sale->employee->name }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 col-sm-12 ">
                                        Email:
                                    </div>
                                    <div class="col-md-6 col-sm-12 ">
                                        {{ $sale->employee->email }}
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
                                    {{ $sale->client->name }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12 ">
                                    Email:
                                </div>
                                <div class="col-md-6 col-sm-12 ">
                                    {{ $sale->client->email }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12 ">
                                    Razón Social:
                                </div>
                                <div class="col-md-6 col-sm-12 ">
                                    {{ $sale->client->rs }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12 ">
                                    Nombre Comercial:
                                </div>
                                <div class="col-md-6 col-sm-12 ">
                                    {{ $sale->client->commercial_name }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12 ">
                                    RFC:
                                </div>
                                <div class="col-md-6 col-sm-12 ">
                                    {{ $sale->client->rfc }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12 ">
                                    CURP:
                                </div>
                                <div class="col-md-6 col-sm-12 ">
                                    {{ $sale->client->curp }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-12 ">
                                    Dirección:
                                </div>
                                <div class="col-md-6 col-sm-12 ">
                                    {{ $sale->client->address }}
                                </div>
                            </div>

                            <div class="card-header">Productos adquiridos
                            </div>
                            <table class="table" id="products-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sale->products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->pivot->amount_sold }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <script>
                            $(document).ready(function() {

                            });
                        </script>
                    @endsection
