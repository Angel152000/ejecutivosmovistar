@extends('layouts.welcome')
@section('body')
    <body style="background-color:#f0f0f0;">
        <style>
            .nav-link { color: white; } 
            :root { --bs-link-hover-color: white; }
            .nav-tabs .nav-link { border: var(--bs-nav-tabs-border-width) transparent;}
            .nav-tabs .nav-link.active { background-color: #f0f0f0 !important; }
            .nav-pills .nav-link.active, .nav-pills .show > .nav-link { background-color: #5CB615; }
            .btn-flotante {
                font-size: 16px; /* Cambiar el tamaño de la tipografia */
                color: white; /* Color del texto */
                border-radius: 50px;
                letter-spacing: 2px; /* Espacio entre letras */
                background-color: #5CB615; /* Color de fondo */
                padding: 18px 30px; /* Relleno del boton */
                position: fixed;
                bottom: 40px;
                right: -30px;
                transition: all 300ms ease 0ms;
                box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
                z-index: 99;
            }
            .btn-flotante:hover {
                background-color: #019DF4; /* Color de fondo al pasar el cursor */
                box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
                transform: translateY(-7px);
                color: white;
            }
            @media only screen and (max-width: 600px) {
                .btn-flotante {
                    font-size: 14px;
                    padding: 12px 20px;
                    bottom: 20px;
                    right: 20px;
                }
            }
        </style>
        <header class="site-header sticky-top" style="background-color:#019DF4;">
            <div class="container text-initial">
                <div class="row" style="padding-top:0.5rem;">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <a href="{{url('/')}}">
                                    <img src="vendor/adminlte/dist/img/logo2.png" height="40">
                                </a>
                            </div>
                            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-bottom: -8px;">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @if(!empty($categorias))
                                        @foreach($categorias as $row)
                                            <?php 
                                                if($row->es_nuevo ==  'si')
                                                {
                                                    $badge = ' <span class="badge" style="background-color:#E63780;border-radius: 0rem;">Nuevo</span>';
                                                } 
                                                else
                                                {
                                                    $badge = '';
                                                }
                                            ?>
                                            @if($row->posicion == 1)
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                                        <strong>{{ $row->nombre }}</strong>
                                                        <?php echo $badge; ?>
                                                        <br>
                                                        <small>{{ $row->sub_nombre }}</small>
                                                    </button>
                                                </li>
                                            @else
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="home{{$row->posicion}}-tab" data-bs-toggle="tab" data-bs-target="#home{{$row->posicion}}" type="button" role="tab" aria-controls="home{{$row->posicion}}" aria-selected="false">
                                                        <strong>{{ $row->nombre }}</strong>
                                                        <?php echo $badge; ?>
                                                        <br>
                                                        <small>{{ $row->sub_nombre }}</small>
                                                    </button>
                                                </li>
                                            @endif
                                        @endforeach
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="#"><strong>Home</strong><br><small></small></a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </nav> 
                </div>
            </div>
        </header>
        <main id="hola">
            <!-- Banner Section -->
            <section class="hero-banner py-5">
                <div class="container">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active text-center" id="home" role="tabpanel" aria-labelledby="home-tab">
                            @include('inicio.home')
                        </div>
                        <div class="tab-pane fade text-center" id="home2" role="tabpanel" aria-labelledby="home2-tab">
                            @include('inicio.home2')
                        </div>
                        <div class="tab-pane fade text-center" id="home3" role="tabpanel" aria-labelledby="home3-tab">
                            @include('inicio.home3-0')
                        </div>
                        <div class="tab-pane fade text-center" id="home4" role="tabpanel" aria-labelledby="home4-tab">
                            @include('inicio.home4')
                        </div>
                        <div class="tab-pane fade text-center" id="home5" role="tabpanel" aria-labelledby="home5-tab">
                            @include('inicio.home5')
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <a class="btn btn-flotante">
            <div class="container">
                <div class="row">
                    <div class="col-2" style="font-size:22px;">
                        <i class="fa-solid fa-phone-volume"></i> 
                    </div>
                    <div class="col-10" style="text-align:left;">
                        <p style="font-size:11px;margin-bottom: 0rem;"><strong>¿Tienes dudas?</strong></p>
                        <p style="font-size:11px;margin-bottom: 0rem;">Te ayudamos a contratar</p>
                    </div>
                </div>
            </div>
        </a>

        <!-- Modal -->
        <div class="modal fade" id="modalTV" tabindex="-1" aria-labelledby="modalTV" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="color:white!important;background-color:#019DF4!important;border-radius:8px;font-size:11.3px;">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-unicos-tab" data-bs-toggle="pill" data-bs-target="#pills-unicos" type="button" role="tab" aria-controls="pills-unicos" aria-selected="true">
                                <i class="fa-solid fa-tv" style="font-size: 15px;"></i> <br>
                                Únicos <br> 100
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-abiertos-tab" data-bs-toggle="pill" data-bs-target="#pills-abiertos" type="button" role="tab" aria-controls="pills-abiertos" aria-selected="false">
                                <i class="fa-solid fa-circle-play" style="font-size: 15px;"></i> <br> 
                                Abiertos <br> 8
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-culturales-tab" data-bs-toggle="pill" data-bs-target="#pills-culturales" type="button" role="tab" aria-controls="pills-culturales" aria-selected="false">
                                <i class="fa-solid fa-masks-theater" style="font-size: 15px;"></i> <br>
                                Culturales <br> 8
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-deportes-tab" data-bs-toggle="pill" data-bs-target="#pills-deportes" type="button" role="tab" aria-controls="pills-deportes" aria-selected="false">
                                <i class="fa-solid fa-futbol" style="font-size: 15px;"></i> <br>
                                Deportes <br> 12
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-internacionales-tab" data-bs-toggle="pill" data-bs-target="#pills-internacionales" type="button" role="tab" aria-controls="pills-internacionales" aria-selected="false">
                                <i class="fa-solid fa-globe" style="font-size: 15px;"></i> <br>    
                                Internacionales <br> 12
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-infantiles-tab" data-bs-toggle="pill" data-bs-target="#pills-infantiles" type="button" role="tab" aria-controls="pills-infantiles" aria-selected="false">
                                <i class="fa-solid fa-puzzle-piece" style="font-size: 15px;"></i> <br>
                                Infantiles <br> 12
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-noticias-tab" data-bs-toggle="pill" data-bs-target="#pills-noticias" type="button" role="tab" aria-controls="pills-noticias" aria-selected="false">
                                <i class="fa-solid fa-receipt" style="font-size: 15px;"></i> <br>
                                Noticias <br> 5
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-peliculas-tab" data-bs-toggle="pill" data-bs-target="#pills-peliculas" type="button" role="tab" aria-controls="pills-peliculas" aria-selected="false">
                                <i class="fa-solid fa-clapperboard" style="font-size: 15px;"></i> <br>    
                                Películas <br> 25
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-musica-tab" data-bs-toggle="pill" data-bs-target="#pills-musica" type="button" role="tab" aria-controls="pills-musica" aria-selected="false">
                                <i class="fa-solid fa-music" style="font-size: 15px;"></i> <br>
                                Música <br> 7
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-variedad-tab" data-bs-toggle="pill" data-bs-target="#pills-variedad" type="button" role="tab" aria-controls="pills-variedad" aria-selected="false">
                                <i class="fa-solid fa-users" style="font-size: 15px;"></i> <br>
                                Variedad <br> 14
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-nacional-tab" data-bs-toggle="pill" data-bs-target="#pills-nacional" type="button" role="tab" aria-controls="pills-nacional" aria-selected="false">
                                <i class="fa-solid fa-star" style="font-size: 15px;"></i> <br>
                                Nacional <br> 2
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-religioso-tab" data-bs-toggle="pill" data-bs-target="#pills-religioso" type="button" role="tab" aria-controls="pills-religioso" aria-selected="false">
                                <i class="fa-solid fa-cross" style="font-size: 15px;"></i>  <br> 
                                Religioso <br> 3
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-regionales-tab" data-bs-toggle="pill" data-bs-target="#pills-regionales" type="button" role="tab" aria-controls="pills-regionales" aria-selected="false">
                                <i class="fa-solid fa-location-dot" style="font-size: 15px;"></i> <br>
                                Regionales <br> 16
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-hd-tab" data-bs-toggle="pill" data-bs-target="#pills-hd" type="button" role="tab" aria-controls="pills-hd" aria-selected="false">
                                <i class="fa-solid fa-display" style="font-size: 15px;"></i>  <br>
                                HD <br> 85
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-unicos" role="tabpanel" aria-labelledby="pills-unicos-tab">@include('channel.unicos')</div>
                        <div class="tab-pane fade" id="pills-abiertos" role="tabpanel" aria-labelledby="pills-abiertos-tab">@include('channel.abiertos')</div>
                        <div class="tab-pane fade" id="pills-culturales" role="tabpanel" aria-labelledby="pills-culturales-tab">@include('channel.culturales')</div>
                        <div class="tab-pane fade" id="pills-deportes" role="tabpanel" aria-labelledby="pills-deportes-tab">@include('channel.deportes')</div>
                        <div class="tab-pane fade" id="pills-internacionales" role="tabpanel" aria-labelledby="pills-internacionales-tab">@include('channel.internacionales')</div>
                        <div class="tab-pane fade" id="pills-infantiles" role="tabpanel" aria-labelledby="pills-infantiles-tab">@include('channel.infantiles')</div>
                        <div class="tab-pane fade" id="pills-noticias" role="tabpanel" aria-labelledby="pills-noticias-tab">@include('channel.noticias')</div>
                        <div class="tab-pane fade" id="pills-peliculas" role="tabpanel" aria-labelledby="pills-peliculas-tab">@include('channel.peliculas')</div>
                        <div class="tab-pane fade" id="pills-musica" role="tabpanel" aria-labelledby="pills-musica-tab">@include('channel.musica')</div>
                        <div class="tab-pane fade" id="pills-variedad" role="tabpanel" aria-labelledby="pills-variedad-tab">@include('channel.variedad')</div>
                        <div class="tab-pane fade" id="pills-nacional" role="tabpanel" aria-labelledby="pills-nacional-tab">@include('channel.nacional')</div>
                        <div class="tab-pane fade" id="pills-religioso" role="tabpanel" aria-labelledby="pills-religioso-tab">@include('channel.religioso')</div>
                        <div class="tab-pane fade" id="pills-regionales" role="tabpanel" aria-labelledby="pills-regionales-tab">@include('channel.regionales')</div>
                        <div class="tab-pane fade" id="pills-hd" role="tabpanel" aria-labelledby="pills-hd-tab">@include('channel.hd')</div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function contratarServicio(id)
            {
                var url = '{{ url("/contratar/servicio")}}'+'/'+id;
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
        </script>
    </body>
@stop

