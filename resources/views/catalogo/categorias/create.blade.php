@extends("layouts.default")
@section('sub_header')
    <nav style="background: linear-gradient(90deg, #019df4, #f4f6f9);padding: 1rem;" class="navbar navbar-danger">
        <div clas="container">
            <h3 class="text-light font-weight-bold">CREAR CATEGORÍA</h3>
        </div>
    </nav>
@stop
@section('sub_content')
<div class="row">
    <div class="col-12">
        <a href="{{URL::route('categorias')}}"  class="btn btn-danger active float-right" role="button" aria-pressed="true"><i class="fa-solid fa-reply"></i> Volver</a>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Campos obligatorios (<span style="color:red;" >*</span>)</h3>
    </div>

    <form method="POST" id="form" action="{{URL::route('categorias_store')}}" accept-charset="UTF-8" enctype="multipart/form-data" >
        {{csrf_field()}}

        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Título de la Categoría <span style="color:red;" >*</span></label>
                        <input type="text" class="form-control" id="titulo" name="titulo">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Sub Título de la Categoría <span style="color:red;" >*</span></label>
                        <input type="text" class="form-control" id="sub_titulo" name="sub_titulo">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Descripción de la Categoría <span style="color:red;" >*</span></label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Estado <span style="color:red;" >*</span></label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="estado" id="estado" value="activado" checked>
                            <label>
                                Mostrar
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="estado" id="estado" value="desactivado">
                            <label>
                                No Mostrar
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Posición <span style="color:red;" >*</span></label>
                        <select class="form-control" id="posicion" name="posicion">
                            <option value="" selected>Selecciona una Opción</option>
                            <option value="1" >1</option>
                            <option value="2" >2</option>
                            <option value="3" >3</option>
                            <option value="4" >4</option>
                            <option value="5" >5</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>¿ Etiqueta de Nuevo ? <span style="color:red;" >*</span></label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="es_nuevo" id="es_nuevo" value="si">
                            <label>
                                Si
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="es_nuevo" id="es_nuevo" value="no" checked>
                            <label>
                                No
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Crear Categoría</button>
        </div>
    </form>
</div>
@stop
@section('sub_js')
    <script>
        $("#form").submit(function(e)
        {
            e.preventDefault();
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                type: 'post',
                dataType : 'json',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (res) 
                {
                    if (res.status === 'success') 
                    {
                        Swal.fire({
                            title: res.msg,
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonText: 'Aceptar',
                            confirmButtonColor: '#019df4',
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        });
                    }
                    else
                    {
                        Swal.fire('Error!',res.msg,'error');
                    }
                }
            });
        });  
    </script>
@stop