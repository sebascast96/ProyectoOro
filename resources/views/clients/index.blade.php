@extends('layouts.app')

@section('content') 

<div class="py-12">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Agregar Cliente
                      <a class="btn btn-success" href="{{ route('clients.create') }}">
                        Agregar
                      </a>
                    </div>
    
                    <div class="card-body">
                        @if (session()->has('message'))
                        <div class="alert alert-primary" role="alert">
                            {{session()->get('message') }}
                          </div>
                        @endif
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Razon Social</th>
                                <th scope="col">Nombre comercial</th>
                                <th scope="col">Correo</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                              <tr>
                                <th scope="row">{{$client->id}}</th>
                                <td>{{$client->name}}</td>
                                <td>{{$client->rs}}</td>
                                <td>{{$client->commercial_name}}</td>
                                <td>{{$client->email}}</td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

@endsection

@include('clients.modals')
