
    <div class="modal fade" id="supplier">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Datos del Proveedor</h4>
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                        <div class="form-row mb-3">
                            <div class="col-6">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control form-control-sm" name="name" id="name" disabled>
                            </div>
                            <div class="col-6">
                                <label for="name" class="form-label">Dirección</label>
                                <input type="text" class="form-control form-control-sm" name="address" id="address" disabled>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-6">
                                <label for="name" class="form-label">Teléfono</label>
                                <input type="date" class="form-control form-control-sm" name="phone" id="phone" disabled>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-6">
                                <label for="name" class="form-label">Información de Contacto</label>
                                <input type="date" class="form-control form-control-sm" name="contact_info" id="contact_info" disabled>
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
                    <h4 class="modal-title">Datos del Proveedor</h4>
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('suppliers.update')}}" method="post">
                                @csrf
                                <input type="text" class="form-control form-control-sm" style="display:none" name="id" id="id">
                            
                        <div class="form-row mb-3">
                            <div class="col-6">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control form-control-sm" name="name" id="name_edit">
                            </div>
                            <div class="col-6">
                                <label for="name" class="form-label">Dirección</label>
                                <input type="text" class="form-control form-control-sm" name="address" id="address_edit">
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-6">
                                <label for="name" class="form-label">Teléfono</label>
                                <input type="date" class="form-control form-control-sm" name="phone" id="phone_edit">
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-6">
                                <label for="name" class="form-label">Información de Contacto</label>
                                <input type="date" class="form-control form-control-sm" name="contact_info" id="contact_info_edit">
                            </div>
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"  >Guardar</button>
                    <a href="#" data-dismiss="modal" class="btn btn-default">Cerrar</a>
                </div>
                
            </div>
            </form>
        </div>
    </div>