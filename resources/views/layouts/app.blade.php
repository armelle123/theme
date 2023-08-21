<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Summernote -->
    <link href="{{ asset('template/vendor/summernote/summernote.css') }}" rel="stylesheet">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GSC-CS-APP') }}</title>
    @yield('css_before')
    <!-- Scripts -->
    <script src="{{ asset('app.js') }}" defer></script>
    <link href="{{ asset('template/vendor/plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('style.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo/logo_gssc.png') }}">

    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <style>
        table.dataTable thead th {
            color: white !important;
        }
    </style>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->

    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="/" class="brand-logo">
                <div class=image style="margin-0px,padding-0px">
                    <img class="logo-abbr" style="width: 50px;height: 50px" src="/images/logo_gssc.png" alt="hello">
                </div>

            </a>


            <div class="nav-control">

                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>

                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container-fluid">

                            {{-- <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                          </li>
                          <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="" data-bs-toggle="dropdown" aria-expanded="false"  mt-5 me-30>
                                Conges
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Gestion des Conges</a></li>
                              <li><a class="dropdown-item" href="#">Ajouter un Conge</a></li>

                            </ul>
                          </div>
                          <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Offre
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">  Gestion de l'Offre</a></li>
                              <li><a class="dropdown-item" href="#"> Ajouter une Offre</a></li>

                            </ul>
                          </div>
                          <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Employes
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Gestion des employes</a></li>
                              <li><a class="dropdown-item" href="#">  Ajouter un Employe</a></li>

                            </ul>
                          </div>
                          <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Archives
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Consulter une Archive</a></li>
                            <li><a class="dropdown-item" href="#"> Ajouter une Archive</a></li>

                          </ul>
                        </div>

                          </li>
                          <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Paie
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Gestion de la Paie</a></li>
                              <li><a class="dropdown-item" href="#">Ajouter une Paie</a></li>

                            </ul>
                          </div>
                        </ul>
                      </div>
                    </div>
                  </nav> --}}


                            <div class="collapse navbar-collapse justify-content-between">
                                <div class="header-left">
                                    <div class="search_bar dropdown">
                                        <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                            <i class="mdi mdi-magnify"></i>
                                        </span>
                                        <div class="dropdown-menu p-0 m-0">
                                            <form>
                                                <input class="form-control" type="search" placeholder="Search"
                                                    aria-label="Search">
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <ul class="navbar-nav header-right">
                                    <li class="nav-item dropdown notification_dropdown">
                                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                            <i class="mdi mdi-bell"></i>
                                            <div class="pulse-css"></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">

                                            <ul class="list-unstyled">
                                                <li class="media dropdown-item">
                                                    <span class="success"><i class="ti-user"></i></span>
                                                    <div class="media-body">
                                                        <a href="#">
                                                            <p><strong>Martin</strong> has added a
                                                                <strong>customer</strong> Successfully
                                                            </p>
                                                        </a>
                                                    </div>
                                                    <span class="notify-time">3:20 am</span>
                                                </li>

                                            </ul>
                                            <a class="all-notification" href="#">talle <i
                                                    class="ti-arrow-right"></i></a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown header-profile">
                                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                            <i class="mdi mdi-account"></i>{{ Auth::user()->email }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="" class="dropdown-item">
                                                <i class="icon-user"></i>
                                                <span class="ml-2">Profil </span>
                                            </a>

                                            <form action="{{ route('conges.ajouter') }}" method="post"
                                                id="logout-form">
                                                @csrf
                                                <a type="submit" class="dropdown-item" data-toggle="modal"
                                                    data-target="#logoutModal">
                                                    <i class="icon-key"></i>
                                                    <span class="ml-2">Se déconnecter </span>
                                                </a>

                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                    </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">

                    <a href="{{ route('home') }}"><i class="icon icon-home"></i><span class="nav-text">
                            <strong>Tableau de bord</strong></span></a>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="fa fa-calendar"></i><span class="nav-text">conges</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('conges') }}">Gestion des Conges</a></li>
                            <li><a href="{{ route('conges.ajouter') }}">ajouter un conges</a></li>

                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="fa fa-dollar"></i><span class="nav-text">Paie</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('salaires') }}">Gestion de la Paie</a></li>
                            <li><a href="{{ route('salaires.ajouter') }}">ajouter une Paie </a></li>

                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class=" fa fa-database"></i><span class="nav-text">Offre</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('offres') }}">Gestion des Offre</a></li>
                            <li><a href="{{ route('offres.ajouter') }}">ajouter une Offre</a></li>

                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class=" fa fa-database"></i><span class="nav-text">Candidature</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('candidature.recu') }}">Liste des Candidats recue</a></li>


                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="fa fa-archive"></i><span class="nav-text">Archives</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('fichiers') }}">Gestion des Archives</a></li>
                            <li><a href="{{ route('fichiers.ajouter') }}">ajouter une Archive</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Utilisateurs</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('users') }}">Gestion des Utilisateurs</a></li>
                        </ul>
                    </li>

                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div id="app">
                <main class="">
                    @yield('content')

                </main>
            </div>
        </div>
        @include('_partial._modals')
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        @include('_partial.footer')
        <!--**********************************
            Footer end
        ***********************************-->




    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('template/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('template/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('template/js/custom.min.js') }}"></script>
    <!--removeIf(production)-->
    <!-- Demo scripts -->
    <script src="{{ asset('template/js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('template/vendor/plugins/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('template/vendor/plugins/toastr/js/toastr.init.js') }}"></script>

    <!-- Summernote -->
    <script src="{{ asset('template/vendor/summernote/js/summernote.min.js') }}"></script>
    <!-- Summernote init -->
    <script src="{{ asset('template/js/plugins-init/summernote-init.js') }}"></script>

    @include('_partial._toastr-message')
    @yield('script')
</body>

</html>
