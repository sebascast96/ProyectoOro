
<a data-toggle="modal" seller_id="{{ $seller->id }}" data-target="#seller" class="btn btn-info get-seller">
    <i class="glyphicon glyphicon-info-sign"></i>
    <t class="hidden-xs">Mostrar</t>
</a>
<a data-toggle="modal" seller_id="{{ $seller->id }}" data-target="#edit" class="btn btn-info get-edit">
    <i class="glyphicon glyphicon-edit"></i>
    <t class="hidden-xs">Editar</t>
</a>
<a class="btn btn-danger del-seller" seller_id="{{ $seller->id }}">
    <i class="glyphicon glyphicon-remove"></i>
    <t class="hidden-xs">Borrar</t>
</a>