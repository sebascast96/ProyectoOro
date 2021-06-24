
<a data-toggle="modal" product_id="{{ $product->id }}" data-target="#product" class="btn btn-info get-product">
    <i class="glyphicon glyphicon-info-sign"></i>
    <t class="hidden-xs">Mostrar</t>
</a>
<a data-toggle="modal" product_id="{{ $product->id }}" data-target="#edit" class="btn btn-info get-edit">
    <i class="glyphicon glyphicon-edit"></i>
    <t class="hidden-xs">Editar</t>
</a>
<a class="btn btn-danger del-client" product_id="{{ $product->id }}">
    <i class="glyphicon glyphicon-remove"></i>
    <t class="hidden-xs">Borrar</t>
</a>