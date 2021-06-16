
<a data-toggle="modal" client_id="{{ $client->id }}" data-target="#client" class="btn btn-info get-client">
    <i class="glyphicon glyphicon-info-sign"></i>
    <t class="hidden-xs">Mostrar</t>
</a>
<a class="btn btn-primary" >
    <i class="glyphicon glyphicon-edit"></i>
    <t class="hidden-xs">Editar</t>
</a>
<a class="btn btn-danger del-client" client_id="{{ $client->id }}">
    <i class="glyphicon glyphicon-remove"></i>
    <t class="hidden-xs">Borrar</t>
</a>