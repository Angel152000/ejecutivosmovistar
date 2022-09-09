@extends("layouts.default")
@section('sub_header')
    <nav style="background: linear-gradient(90deg, #019df4, #f4f6f9);padding: 1rem;" class="navbar navbar-danger">
        <div clas="container">
            <h3 class="text-light font-weight-bold">PEDIDOS</h3>
        </div>
    </nav>
@stop
@section('sub_content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div style="padding:2rem!important;">
                    <table id="my-table" class="table">
                        <thead style="background-color:#019df4;color:white;">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Rut</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Servicio</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($pedidos))
                                @foreach($pedidos as $row)
                                    <tr class="row-{{ $row->id }}">
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->nombre }} {{ $row->apellido }}</td>
                                        <td>{{ $row->rut }}</td>
                                        <td>{{ $row->direccion }}</td>
                                        <td>{{ $row->contacto }}</td>
                                        <td>{{ $row->servicio }}</td>
                                        <td>{{ $row->fecha }}</td>
                                        <td>
                                            <input id="estado_soli" type="hidden" value="{{ $row->estado }}">
                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                            <form method="POST" id="form" accept-charset="UTF-8" enctype="multipart/form-data" >
                                                <select  onchange="cambiarest('{{ $row->id }}',this.value)" id="estado" class="form-select" aria-label="Default select example">
                                                    <option value="contactado">Contactado</option>
                                                    <option value="nocontactado">No Contactado</option>
                                                </select>
                                            </form>
                                        </td>
                                        <!-- <td>{{--$row->estado--}}</td> -->
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">
                                        <h4 class="text-center">No hay pedidos aún...</h4>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('sub_js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready( function () {
            $('#my-table').DataTable();
        });

        function cambiarest(id,estado) {
            $.ajax({
                url: '{{ url("/home/cambiar/estado") }}'+ '/' + id + '/' + estado ,
                type: 'get',
                dataType : 'json',
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
                            cancelButtonText: 'Cancelar',
                            cancelButtonColor: '#dc3545',
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                            else
                            {
                                window.location.reload();
                            }
                        });
                    }
                    else
                    {
                        Swal.fire('Error!',res.msg,'error');
                    }
                }
            });
        }

        var estado = $('#estado_soli').val();

        $("#estado > option[value="+estado+"]").attr("selected",true);
    </script>
@stop