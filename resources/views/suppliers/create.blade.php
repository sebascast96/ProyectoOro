@extends('layouts.app')

@section('content') 
    <div class="py-12">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Agregar Proveedor</div>
        
                        <div class="card-body">
                            <form action="{{route('suppliers.store')}}" method="post">
                                @csrf
                                <div class="form-row mb-3">
                                    <div class="col-6">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" class="form-control form-control-sm" name="name" id="name">
                                    </div>
                                    <div class="col-6">
                                        <label for="name" class="form-label">Dirección</label>
                                        <input type="text" class="form-control form-control-sm" name="address" id="address">
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="col-6">
                                        <label for="name" class="form-label">Teléfono</label>
                                        <input type="text" class="form-control form-control-sm" name="phone" id="phone">
                                    </div>
                                    <div class="col-6">
                                        <label for="name" class="form-label">Información de Contacto</label>
                                        <input type="text" class="form-control form-control-sm" name="contact_info" id="contact_info">
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