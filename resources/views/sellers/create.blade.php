@extends('layouts.app')

@section('content')
    <div class="py-12">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Agregar Vendedor</div>

                        <div class="card-body">
                            <form action="{{route('sellers.store')}}" method="post">
                                @csrf
                                <div class="form-row mb-3">
                                    <div class="col-6">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" class="form-control form-control-sm" name="name" id="name">
                                    </div>
                                    <div class="col-6 ">
                                        <label for="rs" class="form-label">Email</label>
                                        <input type="text" class="form-control form-control-sm" name="email" id="email">
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="col-6">
                                        <label for="name" class="form-label">RFC</label>
                                        <input type="text" class="form-control form-control-sm" name="rfc" id="rfc">
                                    </div>
                                    <div class="col-6">
                                        <label for="name" class="form-label">CURP</label>
                                        <input type="text" class="form-control form-control-sm" name="curp" id="curp">
                                    </div>
                                    <div class="col-6">
                                        <label for="name" class="form-label">Dirección</label>
                                        <input type="text" class="form-control form-control-sm" name="address" id="address">
                                    </div>
                                    <div class="col-6">
                                        <label for="name" class="form-label">Cumpleaños</label>
                                        <input type="date" class="form-control form-control-sm" name="birthdate" id="birthdate">
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
