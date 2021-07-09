
<a data-toggle="modal" employee_id="{{ $employee->id }}" data-target="#employee" class="btn btn-info get-employee">
    <i class="glyphicon glyphicon-info-sign"></i>
    <t class="hidden-xs">Mostrar</t>
</a>
<a data-toggle="modal" employee_id="{{ $employee->id }}" data-target="#edit" class="btn btn-info get-edit">
    <i class="glyphicon glyphicon-edit"></i>
    <t class="hidden-xs">Editar</t>
</a>
<a class="btn btn-danger del-employee" employee_id="{{ $employee->id }}">
    <i class="glyphicon glyphicon-remove"></i>
    <t class="hidden-xs">Borrar</t>
</a>
