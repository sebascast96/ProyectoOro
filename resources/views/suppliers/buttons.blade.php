
<a data-toggle="modal" supplier_id="{{ $supplier->id }}" data-target="#supplier" class="btn btn-info get-supplier">
    <i class="glyphicon glyphicon-info-sign"></i>
    <t class="hidden-xs">Mostrar</t>
</a>
<a data-toggle="modal" supplier_id="{{ $supplier->id }}" data-target="#edit" class="btn btn-info get-edit">
    <i class="glyphicon glyphicon-edit"></i>
    <t class="hidden-xs">Editar</t>
</a>
<a class="btn btn-danger del-supplier" supplier_id="{{ $supplier->id }}">
    <i class="glyphicon glyphicon-remove"></i>
    <t class="hidden-xs">Borrar</t>
</a>