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
                                            <th scope="col" class="cantidad">Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>2</th>
                                            <td>Oro</td>
                                            <td>100.00</td>
                                            <td><div class="input-group">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[1]">
                                                        <span class="fas fa-minus"></span>
                                                    </button>
                                                </span>
                                                <input type="text" name="quant[1]" class="form-control input-number" value="1" min="0" max="1000">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                                                        <span class="fas fa-plus"></span>
                                                    </button>
                                                </span>
                                            </div></td>
                                        </tr>
                                        <tr>
                                            <th>3</th>
                                            <td>Plata</td>
                                            <td>60.00</td>
                                            <td><div class="input-group">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[2]">
                                                        <span class="fas fa-minus"></span>
                                                    </button>
                                                </span>
                                                <input type="text" name="quant[2]" class="form-control input-number" value="1" min="0" max="1000">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[2]">
                                                        <span class="fas fa-plus"></span>
                                                    </button>
                                                </span>
                                            </div></td>
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
        $('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});

$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    </script>
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
