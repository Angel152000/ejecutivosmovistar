@extends("layouts.default")
@section('sub_header')
    <nav style="background: linear-gradient(90deg, #019df4, #f4f6f9);padding: 1rem;" class="navbar navbar-danger">
        <div clas="container">
            <h3 class="text-light font-weight-bold">CREAR SERVICIO</h3>
        </div>
    </nav>
@stop
@section('sub_content')
<div class="row">
    <div class="col-12">
        <a href="{{URL::route('servicios')}}"  class="btn btn-danger active float-right" role="button" aria-pressed="true"><i class="fa-solid fa-reply"></i> Volver</a>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Campos obligatorios (<span style="color:red;" >*</span>)</h3>
    </div>

    <form>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Nombre del Servicio</label>
                        <input type="text" class="form-control" id="nombre_servicio" name="nombre_servicio">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Tipo de Servicio</label>
                        <select class="custom-select" name="tipo_servicio" id="tipo_servicio">
                            <option selected>Selecciona una opción</option>
                            <option value="tp-internet">Tipo Internet Hogar</option>
                            <option value="tp-digital">Tipo Pack Digital</option>
                            <option value="tp-duosytrios">Tipo Pack Duos y Trios</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Estado</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="estado" id="estado" value="activado" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Mostrar
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="estado" id="estado" value="desactivado">
                            <label class="form-check-label" for="exampleRadios2">
                                No Mostrar
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Título Tarjeta</label>
                        <input type="text" class="form-control" id="titulo_tarjeta" name="titulo_tarjeta">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Título del Servicio</label>
                        <input type="text" class="form-control" id="titulo_servicio" name="titulo_servicio">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Descripción del Servicio</label>
                        <input type="text" class="form-control" id="descripcion_servicio" name="descripcion_servicio">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Característica del Servicio</label>
                        <input type="text" class="form-control" id="carac_servicio" name="carac_servicio">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Precio de Descuento</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class=" text-white input-group-text" style="background-color:#e63780;">$</span>
                                <span class="input-group-text">0.000</span>
                            </div>
                            <input type="text" class="form-control" id="precio_descuento" name="precio_descuento">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Precio</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class=" text-white bg-success input-group-text">$</span>
                                <span class="input-group-text">0.000</span>
                            </div>
                            <input type="text" class="form-control" id="precio" name="precio">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Precio Posterior</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class=" text-white input-group-text" style="background-color:#86888c;">$</span>
                                <span class="input-group-text">0.000</span>
                            </div>
                            <input type="text" class="form-control" id="precio_posterior" name="precio_posterior">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <a href="javascript:void(0);" onclick="agregarDetalle()" class="btn btn-primary active float-left" role="button" aria-pressed="true"><i class="fas fa-solid fa-circle-plus"></i> Agregar Detalle</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row" id="agregar-detalle" rel-id="1">
                <div class="col-5">
                    <label>Estado</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estado" id="estado" value="activado" checked>
                        <label>
                            <i class="fa-solid fa-wifi"></i>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estado" id="estado" value="desactivado">
                        <label>
                            <i class="fa-brands fa-internet-explorer"></i>
                        </label>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <label>Detalle del Servicio</label>
                        <input type="text" class="form-control" id="titulo_servicio" name="titulo_servicio">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Crear Servicio</button>
        </div>
    </form>
</div>
@stop
@section('sub_js')
    <script>
        function agregarDetalle() {
            var newtr = '<div class="col-5">';
                newtr = newtr + '<label>Estado</label><br><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="estado_2" id="estado_2" value="activado" checked><label><i class="fa-solid fa-wifi"></i></label></div>';
                newtr = newtr + '<div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="estado_2" id="estado_2" value="desactivado"><label><i class="fa-brands fa-internet-explorer"></i></label></div></div>';
                newtr = newtr + '<div class="col-5"><div class="form-group"><label>Detalle del Servicio</label><input type="text" class="form-control" id="titulo_servicio" name="titulo_servicio"></div></div>';
                newtr = newtr + '<div class="col-2"><label>&nbsp;</label><div class="form-group"><a onclick="" class="btn btn-danger"  rel-id="" href="#" title="Eliminar Servicio"><i class="fas fa-trash-alt"></i></a></div></div>';
            $("#agregar-detalle").append(newtr);
        }
    </script>
@stop