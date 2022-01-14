@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Finalizar venta
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 buttons-container">
                                    <div class="btn btn-primary btn-xlarge">
                                        <span>
                                            <i class="fas fa-solid fa-credit-card"></i>
                                            <h6>Tarjeta de Crédito/Debito</h6>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-6 buttons-container">
                                    <div class="btn btn-primary btn-xlarge">
                                        <span>
                                            <i class="fas fa-solid fa-money-bill"></i>
                                            <h6>Dinero en efectivo</h6>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h5>¿Cuanto dinero recibiste?</h5>
                                </div>
                                <div class="col-12">
                                    <input type="text">
                                </div>
                                <div class="col-12">
                                    Cambio: $109.20
                                </div>
                            </div>
                            <div class="end-sale-cont">
                                <button class="btn btn-success" disabled>
                                    Finalizar Venta
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
