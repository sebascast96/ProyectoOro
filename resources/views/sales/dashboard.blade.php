@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Ventas
                        </div>
                        <form action="{{ route('sales.finished') }}">
                            <div class="card-body">
                                <div class="row">
                                    <label class="col-3 text-center">Fecha:</label>
                                    <h5 class="col-3">{{ date('d-m-Y') }}</h5>
                                    <label class="col-3 text-center">Vendedor:</label>
                                    <h5 class="col-3">{{ Auth::user()->name }}</h5>
                                </div>

                                <div class="row">
                                    <label class="col-3 text-center">Productos:</label>
                                    <select class="select2client form-control col-5" name="clients"></select>

                                    <button class=" btn-outline-add btn-sm" href="{{ route('clients.create') }}">
                                        <span>
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    </button>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Precio unitario</th>
                                            <th scope="col">Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td><input type="text"></td>
                                        </tr>
                                        <tr>
                                            <th>3</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td><input type="text"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p class="text-right">Total: $0.00</p>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                </div>
                            </div>
                        </form>
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
                    url: '/fill-products',
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
