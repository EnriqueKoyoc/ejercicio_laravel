@extends('layouts/plantilla')

@section('tittle', 'Personas')

@section('container')



<!-- mostrar error en las validaciones  -->
@include('partials.validation-errors')

<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Personas</h1>
    </div>
    <!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Personas</li>
        </ol>
    </div>
    <!-- /.col -->
</div>

<div class="card">
    <div class="card-header">
        <button data-backdrop="static" data-keyboard="false" class="btn btn-primary" data-toggle="modal"
            data-target="#modal-lg"><i class="fas fa-plus-circle"></i>&nbsp;Agregar</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Identificador</th>
                    <th>CURP</th>
                    <th>Apellido Paterno</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($personas as $vistaPersona)
                <tr>

                    <td>{{ $vistaPersona->id }}</td>
                    <td>{{ $vistaPersona->perCurp }}</td>
                    <td>{{ $vistaPersona->perApellido1 }}</td>
                    <td>{{ $vistaPersona->perNombre }}</td>



                    <td>
                        @if ($vistaPersona->id != 0)
                        <div><button style="outline:none; border: 0px solid #000000;" class="fas fa-eye"
                                onclick="detalles('{{ $vistaPersona->id }}||{{$vistaPersona->perCurp}}||{{ $vistaPersona->perApellido1}}||{{ $vistaPersona->perApellido2}}||{{$vistaPersona->perNombre}}||{{$vistaPersona->perFechaNac}}||{{$vistaPersona->perSexo}}||{{$vistaPersona->perCorreo1}}');"></button>&nbsp;&nbsp


                            <button data-toggle="modal" style="outline:none; border: 0px solid #000000;"
                                class="fas fa-edit"
                                onclick="uploadData('{{ $vistaPersona->id }}||{{$vistaPersona->perCurp}}||{{ $vistaPersona->perApellido1}}||{{ $vistaPersona->perApellido2}}||{{$vistaPersona->perNombre}}||{{$vistaPersona->perFechaNac}}||{{$vistaPersona->perSexo}}||{{$vistaPersona->perCorreo1}}');"></button>
                        </div>
                        @else
                        @endif

                        @empty
                        <div class="alert alert-danger" role="alert">
                            <strong>¡tabla vacia!</strong>
                        </div>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<!-- modal agregar-->
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar nuevo cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('addPersonas')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="perCurp">CURP *</label>
                                <input id="perCurp" maxlength="15" class="form-control" type="text" name="perCurp"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="perNombre">Nombre persona *</label>
                                <input id="perNombre" maxlength="15" class="form-control" type="text" name="perNombre"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="perApellido1">Apellido paterno *</label>
                                <input id="perApellido1" maxlength="15" class="form-control" type="text"
                                    name="perApellido1" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="perApellido2">Apellido materno</label>
                                <input id="perApellido2" name="perApellido2" maxlength="15" class="form-control"
                                    type="text" name="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha de nacimiento</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" id="perFechaNac" name="perFechaNac" class="form-control"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                        data-mask>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Genero *</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="M" name="perSexo" id="perSexo">
                                    <label class="form-check-label">Mujer</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="H" name="perSexo" id="perSexo">
                                    <label class="form-check-label">Hombre</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="perCorreo1">Correo electrónico</label>
                                <input type="email" class="form-control" id="perCorreo1" name="perCorreo1">
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- fin modal  -->

<!-- modal editar  -->
<div class="modal fade" id="up_persona">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar persona</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('editPersona')}}" method="POST">
                    @csrf @method('PUT')
                    <div class="row">
                        <input type="hidden" name="id_p" id="id_p">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="perCurp2">CURP *</label>
                                <input id="perCurp2" maxlength="15" class="form-control" type="text" name="perCurp2"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="perNombre2">Nombre persona *</label>
                                <input id="perNombre2" maxlength="15" class="form-control" type="text" name="perNombre2"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="perApellido12">Apellido paterno *</label>
                                <input id="perApellido12" maxlength="15" class="form-control" type="text"
                                    name="perApellido12" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="perApellido22">Apellido materno</label>
                                <input id="perApellido22" name="perApellido22" maxlength="15" class="form-control"
                                    type="text" name="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha de nacimiento</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" id="perFechaNac2" name="perFechaNac2" class="form-control"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                        data-mask>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Genero *</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="M" name="perSexo2"
                                        id="perSexo12">
                                    <label class="form-check-label">Mujer</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="H" name="perSexo2"
                                        id="perSexo2">
                                    <label class="form-check-label">Hombre</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="perCorreo12">Correo electrónico</label>
                                <input type="email" class="form-control" id="perCorreo12" name="perCorreo12">
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- modal detalles  -->
<div class="modal fade" id="up_persona_detalle">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalles persona</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="id_p" id="id_p3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="perCurp23">CURP</label>
                                <input id="perCurp23" maxlength="15" class="form-control" type="text" name="perCurp23"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="perNombre23">Nombre persona</label>
                                <input id="perNombre23" maxlength="15" class="form-control" type="text"
                                    name="perNombre23" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="perApellido123">Apellido paterno</label>
                                <input id="perApellido123" maxlength="15" class="form-control" type="text"
                                    name="perApellido123" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="perApellido223">Apellido materno</label>
                                <input id="perApellido223" name="perApellido223" maxlength="15" class="form-control"
                                    type="text" name="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha de nacimiento</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" id="perFechaNac23" name="perFechaNac23" class="form-control"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                        data-mask>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Genero</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="M" name="perSexo2"
                                        id="perSexo123">
                                    <label class="form-check-label">Mujer</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="H" name="perSexo2"
                                        id="perSexo23">
                                    <label class="form-check-label">Hombre</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="perCorreo12">Correo electrónico</label>
                                <input type="email" class="form-control" id="perCorreo123" name="perCorreo123">
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script src="js/persona/editPersona.js"></script>

<script>
@if(Session::has('message'))
var type = "{{Session::get('alert-type','info')}}"
switch (type) {
    case 'nuevo':
        alert('Persona agregada con éxito');
        break;
    case 'actualizar':
        alert('Persona actualizada con éxito');
        break;
}
@endif
</script>

@endsection