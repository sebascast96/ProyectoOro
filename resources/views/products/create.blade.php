@extends('layouts.app')

@section('content')
    <div class="py-12">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Agregar Producto</div>

                        <div class="card-body">
                            <form action="{{route('products.store')}}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" class="form-control form-control-sm" name="name" id="name">
                                    </div>
                                    <div class="col-md-6 col-sm-12 ">
                                        <label for="rs" class="form-label">Descripción</label>
                                        <input type="text" class="form-control form-control-sm" name="description" id="description">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 col-sm-12 ">
                                        <label for="name" class="form-label">Cantidad</label>
                                        <input type="text" class="form-control form-control-sm" name="amount" id="amount">
                                    </div>
                                    <div class="col-md-6 col-sm-12 ">
                                        <label for="name" class="form-label">Precio Unitario</label>
                                        <input type="text" class="form-control form-control-sm" name="price_perunit" id="price_perunit">
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

@endsection
