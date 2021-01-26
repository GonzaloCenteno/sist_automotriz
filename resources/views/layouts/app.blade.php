<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/smartadmin-production-plugins.min.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap4-toggle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    
</head>
<body @guest style="background-size: cover !important;background-image:url({{ asset('img/fondoLogin.jpg') }}); @endguest">
    <div id="app">
        @guest
            <section id="wrapper">
                @yield('content-login')
            </section>
        @else
            <div class="wrapper">
                <div class="sidebar" data-color="purple" data-background-color="white">
                    <div class="logo">
                        <a href="#" class="simple-text logo-normal">
                            MGC AUTOMOTRIZ
                        </a>
                    </div>
                    <div class="sidebar-wrapper">
                        <ul class="nav">
                            @if(Auth::user()->rol == 'TECNICO')
                            <li class="nav-item" id="registro">
                                <a class="nav-link" href="{{ route('registro.index') }}">
                                    <i class="material-icons">create</i>
                                    <p>REGISTRO</p>
                                </a>
                            </li>
                            @else
                            <li class="nav-item" id="empresa">
                                <a class="nav-link" href="{{ route('empresa.index') }}">
                                    <i class="material-icons">location_city</i>
                                    <p>EMPRESA</p>
                                </a>
                            </li>
                            <li class="nav-item" id="usuarios">
                                <a class="nav-link" href="{{ route('usuario.index') }}">
                                    <i class="material-icons">groups</i>
                                    <p>USUARIOS</p>
                                </a>
                            </li>
                            <li class="nav-item" id="personas">
                                <a class="nav-link" href="{{ route('persona.index') }}">
                                    <i class="material-icons">accessibility</i>
                                    <p>PERSONAS</p>
                                </a>
                            </li>
                            <li class="nav-item" id="inventario_vehiculo">
                                <a class="nav-link" href="{{ route('inventario_vehiculo.index') }}">
                                    <i class="material-icons">home_repair_service</i>
                                    <p>INVENTARIO VEHICULO</p>
                                </a>
                            </li>
                            <li class="nav-item" id="material">
                                <a class="nav-link" href="{{ route('material.index') }}">
                                    <i class="material-icons">construction</i>
                                    <p>MATERIALES</p>
                                </a>
                            </li>
                            <li class="nav-item" id="registro">
                                <a class="nav-link" href="{{ route('registro.index') }}">
                                    <i class="material-icons">create</i>
                                    <p>REGISTRO</p>
                                </a>
                            </li>
                            <li class="nav-item" id="fichas">
                                <a class="nav-link" href="{{ route('ficha.index') }}">
                                    <i class="material-icons">assignment</i>
                                    <p>FICHAS</p>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="main-panel">
                    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
                        <div class="container-fluid">
                            <div class="navbar-wrapper">
                                <a class="navbar-brand" href="javascript:;">@yield('title')</a>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="navbar-toggler-icon icon-bar"></span>
                                <span class="navbar-toggler-icon icon-bar"></span>
                                <span class="navbar-toggler-icon icon-bar"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <h6 class="mb-0"><b>Bienvenido: {{ Auth::user()->name }}</b></h6>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('micuenta.index') }}">
                                            <i class="material-icons">account_box</i> Mi Cuenta
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="material-icons">cancel_presentation</i> Cerrar Sesion
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="content py-0">
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        @endguest
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/jquery.jqGrid.min.js') }}"></script>
    <script src="{{ asset('js/grid.locale-es.js') }}"></script>
    <script src="{{ asset('js/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('js/material-dashboard.js?v=2.1.2') }}"></script>
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>
    <script src="{{ asset('js/bootstrap4-toggle.min.js') }}"></script>
    <script src="{{ asset('js/block_ui.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                beforeSend:function()
                {            
                    alertas(1);
                },
                error: function (x, status, error) {
                    if (x.status == 422) {
                        alertas(3);
                        var data = x.responseJSON.errors;
                        for(let i in data){
                            mostrarErrores(i,data[i][0]);
                        }
                    }
                    else {
                        alertas(4);
                    }
                }
            });
        });

        function limpiarErrores(nombre) {
            $("#error_"+nombre).hide();
            $("#error_"+nombre).text('');
            $("#cls_"+nombre).removeClass('has-danger');
        }

        function mostrarErrores(nombre, error) {
            $("#error_"+nombre).show();
            $("#error_"+nombre).text(error);
            $("#cls_"+nombre).addClass('has-danger');
        }

        function alertas(tipo, url) {
            if (tipo === 1) {
                swal({
                    title: "PROCESANDO INFORMACION",
                    allowOutsideClick: false,
                    allowEscapeKey:false,
                    allowEnterKey:false,
                    showConfirmButton: false,
                    onOpen: function () {
                      swal.showLoading()
                    }
                  }).then(
                    function () {},
                    function (dismiss) {
                      if (dismiss === 'timer') {
                        console.log('I was closed by the timer')
                      }
                    }) 
            } else if(tipo === 2) {
                let timerInterval
                swal({
                    type: 'success',
                    title: 'EXITO',
                    timer: 1600,
                    allowOutsideClick: false,
                    allowEscapeKey:false,
                    showConfirmButton: false,
                    onOpen: () => {
                        timerInterval = setInterval(() => {
                        }, 100)
                    },
                    onClose: () => {
                        var ruta = "{{URL::to(':id')}}";
                        ruta = ruta.replace(':id', url);
                        window.location.href = ruta;
                        clearInterval(timerInterval)
                    }
                });   
            } else if(tipo === 3) {
                swal({
                    type: 'warning',
                    title: 'FALTA COMPLETAR DATOS EN EL FORMULARIO',
                    timer: 1200,
                    allowOutsideClick: false,
                    allowEscapeKey:false,
                    showConfirmButton: false,
                    onOpen: () => {
                        timerInterval = setInterval(() => {
                        }, 100)
                    },
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                });
            } else if(tipo === 4) {
                let timerInterval
                swal({
                    type: 'success',
                    title: 'EXITO',
                    timer: 1600,
                    allowOutsideClick: false,
                    allowEscapeKey:false,
                    showConfirmButton: false,
                    onOpen: () => {
                        timerInterval = setInterval(() => {
                        }, 100)
                    },
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                });   
            } else {
                swal({
                    type: 'error',
                    title: 'OCURRIO UN PROBLEMA',
                    allowOutsideClick: false,
                    allowEscapeKey:false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'ACEPTAR'
                }); 
            }

        }
    </script>
    @yield('page-js-script')
</body>
</html>
