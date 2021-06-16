@extends('layouts.app')

@section('content') 

<div class="py-12">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
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
            <table class="table" id="clients-table">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Razon Social</th>
                  <th scope="col">Nombre comercial</th>
                  <th scope="col">Correo</th>
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

      $('#clients-table').DataTable({
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "Ningun registro coincide - lo sentimos",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search":"Buscar"
        },
          processing: true,
          serverSide: true,
          ajax:'/clients',
          columns: [
              { data: 'id', name: 'id' },
              { data: 'name', name: 'name' },
              { data: 'rs', name: 'rs' },
              { data: 'commercial_name', name: 'commercial_name' },
              { data: 'email', name: 'email' },
              { data: 'actions', name: 'actions' }
          ]
      });

  });
  </script>
@endsection

@push('scripts')

@endpush



