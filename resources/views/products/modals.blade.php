
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
                    <form action="{{route('products.update')}}" method="put">
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
                        <button class="btn btn-success" type="submit" >Guardar</button>
                        <a href="#" data-dismiss="modal" class="btn btn-default">Cerrar</a>
                </div>
                </form>
            </div>
            
        </div>
    </div>