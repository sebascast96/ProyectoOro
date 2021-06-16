
    <div class="modal fade" id="usuario">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-nuvem">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Datos de Usuario</h4>
                </div>
                <div class="modal-body">
                    <center>
                        <img src="" class="img-circle" id="photo" style="width: 15%;height: 15%;;" alt=""/>
                    </center>
                    <div class="row" id="etq">
                        <div class="form-group col-md-4 col-sm-12">
                            <small class="lbl_modal">Nombre:</small>
                            {!! Form::label('name', null, ['class'=>'form-control', 'id'=>'name']) !!}
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <small class="lbl_modal">Apellido Paterno:</small>
                            {!! Form::label('lastNameFather', null, ['class'=>'form-control', 'id'=>'lastNameFather']) !!}
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <small class="lbl_modal">Apellido Materno:</small>
                            {!! Form::label('lastNameMother', null, ['class'=>'form-control', 'id'=>'lastNameMother']) !!}
                        </div>
                    </div>
                    <div class="row" id="etq">
                        <div class="form-group col-sm-12 col-md-4">
                            <small class="lbl_modal">Rol:</small>
                            {!! Form::label('role', null, ['class'=>'form-control', 'id'=>'role']) !!}
                        </div>
                        <div class="form-group col-sm-12 col-md-4">
                            <small class="lbl_modal">Teléfono:</small>
                            {!! Form::label('homePhone', null, ['class'=>'form-control', 'id'=>'homePhone']) !!}
                        </div>
                        <div class="form-group col-sm-12 col-md-4">
                            <small class="lbl_modal">Celular:</small>
                            {!! Form::label('cellPhone', null, ['class'=>'form-control', 'id'=>'cellPhone']) !!}
                        </div>
                    </div>
                    <div class="row" id="etq">
                        <div class="form-group col-sm-12 col-md-5">
                            <small class="lbl_modal">Nombre de Usuario:</small>
                            {!! Form::label('username', null, ['class'=>'form-control', 'id'=>'username']) !!}
                        </div>
                        <div class="form-group col-sm-12 col-md-7">
                            <small class="lbl_modal">Correo:</small>
                            {!! Form::label('email', null, ['class'=>'form-control', 'id'=>'email']) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer background-nuvem">
                    <a href="#" data-dismiss="modal" class="btn btn-default">Cerrar</a>
                </div>
            </div>
        </div>
    </div>