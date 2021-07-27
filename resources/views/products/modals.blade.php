
    <div class="modal fade" id="product">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Datos de Producto</h4>
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                        <div class="form-row mb-3">
                            <div class="col-6">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control form-control-sm" name="name" id="name" disabled>
                            </div>
                            <div class="col-6 ">
                                <label for="rs" class="form-label">Descripción</label>
                                <input type="text" class="form-control form-control-sm" name="description" id="description" disabled>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-6">
                                <label for="name" class="form-label">Cantidad</label>
                                <input type="text" class="form-control form-control-sm" name="amount" id="amount" disabled>
                            </div>
                            <div class="col-6">
                                <label for="name" class="form-label">Precio Unitario</label>
                                <input type="text" class="form-control form-control-sm" name="price_perunit" id="price_perunit" disabled>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <a href="#" data-dismiss="modal" class="btn btn-default">Cerrar</a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Datos de Producto</h4>
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('products.update')}}" method="post" id="update_prod">
                                @csrf
                                <input type="text" class="form-control form-control-sm" style="display:none" name="id" id="id">

                        <div class="form-row mb-3">
                            <div class="col-6">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control form-control-sm" name="name" id="name_edit">
                            </div>
                            <div class="col-6 ">
                                <label for="rs" class="form-label">Descripción</label>
                                <input type="text" class="form-control form-control-sm" name="description" id="description_edit">
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-6">
                                <label for="name" class="form-label">Cantidad</label>
                                <input type="text" class="form-control form-control-sm" name="amount" id="amount_edit">
                            </div>
                            <div class="col-6">
                                <label for="name" class="form-label">Precio Unitario</label>
                                <input type="text" class="form-control form-control-sm" name="price_perunit" id="price_perunit_edit">
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit" form="update_prod">Guardar</button>
                        <a href="#" data-dismiss="modal" class="btn btn-default">Cerrar</a>
                </div>
                </form>
            </div>

        </div>
    </div>

    <div class="modal fade" id="prov">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Proveedores</h4>
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered dt-responsive nowrap" id="prov-table" style="width:100%">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Contacto</th>
                            <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                    </table>
                    <form action="{{route('suppliers.link')}}" method="post">
                    @csrf
                        <input type="text" class="form-control form-control-sm" style="display:none" name="idl" id="idl">
                        <h6>Agregar proveedor al producto</h6>
                        <select class="select2" name="supplier">
                        </select>
                        <button type="submit" class="btn btn-success">
                            Agregar
                        </button>
                    </form>

                </div>

            </div>

        </div>
    </div>
