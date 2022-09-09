@extends("layouts.default")
@section('sub_header')
    <nav style="background: linear-gradient(90deg, #019df4, #f4f6f9);padding: 1rem;" class="navbar navbar-danger">
        <div clas="container">
            <h3 class="text-light font-weight-bold">SERVICIOS</h3>
        </div>
    </nav>
@stop
@section('sub_content')
    <div class="row">
        <div class="col-12">
            <a href="{{URL::route('servicios_create')}}"  class="btn btn-success active float-right" role="button" aria-pressed="true"><i class="fas fa-solid fa-circle-plus"></i> Crear Servicio</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div style="padding:2rem!important;">
                    <table id="my-table" class="table">
                        <thead style="background-color:#019df4;color:white;">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($servicios))
                                @foreach($servicios as $row)
                                    <tr class="row-{{ $row->id }}">
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->nombre_servicio }}</td>
                                        <td>{{ $row->categoria }}</td>
                                        <td>{{ $row->precio }}</td>
                                        <td>{{ $row->estado }}</td>
                                        <td>
                                            <a onclick="editarServicio('{{$row->id}}')"   class="btn btn-success" rel-id="" href="#" title="Editar Servicio"><i class="fa-solid fa-pencil"></i></i></a>
                                            <a onclick="duplicarServicio('{{$row->id}}')" class="btn" style="background-color:#019df4;color:white;" title="Duplicar Servicio" href="#"><i class="fa-solid fa-clone"></i></a>
                                            <a onclick="eliminarServicio('{{$row->id}}')" class="btn btn-danger"  rel-id="" href="#" title="Eliminar Servicio"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">
                                        <h4 class="text-center">No hay servicios aún, Porfavor Cree uno.</h4>
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
        $(document).ready( function () {
            $('#my-table').DataTable();
        });

        function eliminarServicio(id) {
            Swal.fire({
                title: '¿Desea eliminar este servicio?',
                text: 'Esta acción es irreversible, el servicio se eliminará permanentemente.',
                icon: 'info',
                showCancelButton: true,
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
                    var url = '{{ url("/home/servicios/delete")}}'+'/'+id;
                    $.ajax({
                        url: url,
                        dataType: 'json',
                        type: 'get',
                        success: function(res) 
                        {
                            console.log(res);
                            if (res.status === 'success') 
                            {
                                $('.row-' + id).fadeOut('fast').remove();
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
                }
            })
        }

        function duplicarServicio(id) {
            Swal.fire({
                title: '¿Desea duplicar este servicio?',
                icon: 'info',
                showCancelButton: true,
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
                    var url = '{{ url("/home/servicios/duplicate")}}'+'/'+id;
                    $.ajax({
                        url: url,
                        dataType: 'json',
                        type: 'get',
                        success: function(res) 
                        {
                            console.log(res);
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
            })
        }
    </script>
@stop