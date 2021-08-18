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
                            <div class="row">
                                <label class="col-3 text-center">Fecha:</label>
                                <h5 class="col-3">{{ date('d-m-Y') }}</h5>
                                <label class="col-3 text-center">Vendedor:</label>
                                <h5 class="col-3">{{ Auth::user()->name }}</h5>
                            </div>

                            <div class="row">
                                <label class="col-3 text-center">Cliente:</label>
                                <select class="select2client col-5" name="clients"></select>
                                @can('create-clients')
                                    <a class="btn btn-success col-1" href="{{ route('clients.create') }}">
                                        <span>
                                            <i class="fas fa-user-plus"></i>
                                        </span>
                                    </a>
                                @endcan
                            </div>


                            @foreach ($products as $product)
                                <div class="card" class="col-4">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">{{ $product->description }}</p>
                                        <p class="card-text" id="price {{ $product->id }}">Precio unitario:
                                            {{ $product->price_perunit }}</p>
                                        <p class="card/text">En existencia: {{ $product->amount }}</p>
                                        <div class="row">
                                            <p class="col-2">Cantidad:</p>
                                            <input type="number"
                                                onkeyup="calc({{ $product->id }},{{ $product->price_perunit }})"
                                                id="text {{ $product->id }}" class="form-control col-3">
                                            <p class="text-right col-7" id="total {{ $product->id }}">Total: </p>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                            <p class="text-right" id="total">Subtotal: $0.00</p>
                            <p class="text-right">Iva: $0.00</p>
                            <p class="text-right">Total: $0.00</p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary">Finalizar venta</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function calc(id, price) {
            if (document.getElementById("text " + id).value == "Nan") {
                document.getElementById("total " + id).innerHTML = "Total:  "
            } else {
                document.getElementById("total " + id).innerHTML = "Total: " +
                    parseInt(document.getElementById("text " + id).value) * price
            }



        };
        $(document).ready(function() {


            function format(item) {
                return item.name;
            };

            $select2client = $('.select2client').select2({
                placeholder: "¿Que cliente esta comprando?",
                ajax: {
                    url: '/fill-clients',
                    dataType: 'json',
                    type: 'GET',
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(obj) {
                                return {
                                    id: obj.id,
                                    text: obj.name
                                };
                            })
                        };
                    }
                },
            });



        });
    </script>
@endsection
