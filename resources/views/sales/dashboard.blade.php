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
                            <select class="select2client col-6" name="clients">
                        </select>
                        </div>
                       

                        @foreach ($products as $product)
                            <div class="card" class="col-md-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <p class="card-text">{{$product->description}}</p>
                                    <button class="btn btn-danger">-</button><input type="text"><button class="btn btn-success">+</button>
                                 </div>
                            </div>
                        @endforeach
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
    $(document).ready(function() {
      function format(item) { return item.name; };
      $select2client = $('.select2client').select2({
        placeholder: "¿Que cliente esta comprando?",
        ajax:{
          url:'/fill-clients',
          dataType: 'json',
          type:'GET',
          processResults: function (data) {
            return {
              results: $.map(data, function(obj) {
                return { id: obj.id, text: obj.name };
              })
            };
          }
        },
      });

  });
</script>
@endsection