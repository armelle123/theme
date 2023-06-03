@extends('layouts.site')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Liste des Offres d'emploie</h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p>--}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li> --}}
                    {{--                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Components</a></li>--}}
                </ol>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card px-3">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <a href="">
                                    <div class="card">
                                        <div class="stat-widget-one card-body">
                                            <div class="stat-icon d-inline-block">
                                                <i class="fa fa-dollar "></i>
                                            </div>
                                            <div class="stat-content d-inline-block">
                                                <div class="stat-text">En cours</div>
                                                <div class="stat-digit"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <a href="">
                                    <div class="card">
                                        <div class="stat-widget-one card-body">
                                            <div class="stat-icon d-inline-block">
                                                <i class="fa fa-angle-double-down text-success border-success"></i>
                                            </div>
                                            <div class="stat-content d-inline-block">
                                                <div class="stat-text">Terminés</div>
                                                <div class="stat-digit" id="entre"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <a href="">
                                    <div class="card">
                                        <div class="stat-widget-one card-body">
                                            <div class="stat-icon d-inline-block">
                                                <i class="fa fa-angle-double-up text-warning border-warning"></i>
                                            </div>
                                            <div class="stat-content d-inline-block">
                                                <div class="stat-text">Clients</div>
                                                <div class="stat-digit" id="sortie"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <a href="">
                                    <div class="card">
                                        <div class="stat-widget-one card-body">
                                            <div class="stat-icon d-inline-block">
                                                <i class="fa fa-dashcube text-success border-success"></i>
                                            </div>
                                            <div class="stat-content d-inline-block">
                                                <div class="stat-text">Dépenses</div>
                                                <div class="stat-digit" id="tache"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
@section('script')

@endsection
