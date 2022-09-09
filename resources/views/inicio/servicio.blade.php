<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Solicitud | {{ $servicio->categoria }} {{ $servicio->nombre_servicio }} </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300&family=Work+Sans:wght@100;300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600&display=swap" rel="stylesheet">
        <link rel="icon" href="{{ asset('img/favicon.png') }}">
        <script src="https://kit.fontawesome.com/97f87ec59b.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>
    <body style="background-color:#f0f0f0 !important;">
        <div class="container">
            <div class="row text-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col">
                        <a href="{{url('/')}}">
                            <img width="100px" height="100px" src="{{ asset('img/movistar.png') }}">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="col">
                        <div class="card shadow mb-5 bg-body rounded">
                            <div class="card-header text-center p-4" style="background-color:#def7f7;">
                                <h3>
                                    {{ $servicio->categoria }} {{ $servicio->nombre_servicio }}
                                </h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" id="form"  action="{{URL::route('pedidos')}}" accept-charset="UTF-8" enctype="multipart/form-data" >
                                    {{csrf_field()}}

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <div class="form-group">
                                                    <label>Nombre <span style="color:red;" >*</span></label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <div class="form-group">
                                                    <label>Apellido <span style="color:red;" >*</span></label>
                                                    <input type="text" class="form-control" id="apellido" name="apellido">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <div class="form-group">
                                                    <label>Rut <span style="color:red;" >*</span></label>
                                                    <input type="text" class="form-control" id="rut" name="rut" oninput="checkRut(this)">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <div class="form-group">
                                                    <label>Nº de Contacto  <span style="color:red;" >*</span></label>
                                                    <input type="number" class="form-control" id="numero" name="numero">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <div class="form-group">
                                                    <label>Email <span style="color:red;" >*</span></label>
                                                    <input type="email" class="form-control" id="email" name="email">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <div class="form-group">
                                                    <label>¿Donde requieres el servicio?<span style="color:red;" >*</span></label>
                                                    <input type="text" class="form-control" id="direccion" name="direccion">
                                                    <small>Colocar la Calle + Número + Comuna + Región (Si es departamento colocar también N° Dpto) </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" id="servicio" name="servicio" value="{{$servicio->id}}">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-lg" style="background-color:#019df4;color:white;border-radius:50px;padding: 1rem 3rem;"><strong>Solicitar Servicio</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="col">
                        <div class="card shadow mb-5 bg-body rounded">
                            <div class="card-header text-center p-4" style="background-color:#def7f7;">
                                <h3>
                                    Detalle de tu solicitud
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row"> 
                                    <div class="col-6" style="color:#019DF4;">
                                        <h5>{{ $servicio->categoria }} {{ $servicio->nombre_servicio }} </h5>
                                    </div>
                                    <div class="col-6">
                                        <h5> ${{ $servicio->s_precio }} </h5>
                                    </div>
                                    <hr>
                                    <div class="col-6">
                                        <h5> Instalación </h5>
                                        @if ($servicio->precio_instalacion == 0)
                                            <ul>
                                                <li>Incluye instalacion sin costo</li>
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <h5> ${{ $servicio->s_precio_ins }} </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row"> 
                                    <div class="col-6" style="color:#019DF4;">
                                        <h5> Total Mensual </h5>
                                    </div>
                                    <div class="col-6"></div>
                                    <div class="col-6" style="color:#5CB615;">
                                        <h5> ${{ $servicio->s_precio }} </h5> 
                                        <p> del mes 1 al 12</p>
                                    </div>
                                    <div class="col-6">
                                        @if ($servicio->s_precio_luego != 0)
                                            <h5> ${{ $servicio->s_precio_luego }} </h5>
                                            <p> desde el mes 13</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p style="color:#8d8d8d;"> 
                        Te llamaremos de lunes a viernes de 08:00 a 23:00 hrs. Sábados, domingos y festivos de 10:00 a 21:00 hrs.
                        <br>
                        Para la Región de Magallanes y la Antártica Chilena, de lunes a viernes de 10:00 a 24:00 hrs. Sábados, domingos y Festivos de 11:00 a 22:00 hrs.
                        <br> 
                        Fuera de estos horarios, será durante el día hábil siguiente.
                    </p>
                </div>
            </div>
        </div> 
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
                            title: 'Hecho!',
                            text: res.msg,
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
                        Swal.fire({
                            title: 'Error!',
                            text: res.msg,
                            icon: 'error',
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
                }
            });
        });

        function checkRut(rut) 
        {
            // Despejar Puntos
            var valor = rut.value.replace('.','');
            // Despejar Guión
            valor = valor.replace('-','');
            
            // Aislar Cuerpo y Dígito Verificador
            cuerpo = valor.slice(0,-1);
            dv = valor.slice(-1).toUpperCase();
            
            // Formatear RUN
            rut.value = cuerpo + '-'+ dv
            
            // Si no cumple con el mínimo ej. (n.nnn.nnn)
            if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
            
            // Calcular Dígito Verificador
            suma = 0;
            multiplo = 2;
            
            // Para cada dígito del Cuerpo
            for(i=1;i<=cuerpo.length;i++) {
            
                // Obtener su Producto con el Múltiplo Correspondiente
                index = multiplo * valor.charAt(cuerpo.length - i);
                
                // Sumar al Contador General
                suma = suma + index;
                
                // Consolidar Múltiplo dentro del rango [2,7]
                if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
        
            }
            
            // Calcular Dígito Verificador en base al Módulo 11
            dvEsperado = 11 - (suma % 11);
            
            // Casos Especiales (0 y K)
            dv = (dv == 'K')?10:dv;
            dv = (dv == 0)?11:dv;
            
            // Validar que el Cuerpo coincide con su Dígito Verificador
            if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
            
            // Si todo sale bien, eliminar errores (decretar que es válido)
            rut.setCustomValidity('');
        }
    </script>
</html>