@extends('layouts.site')

@section('content')


    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Liste des Offres d'emploie</h4>
                    <p class="mb-0"></p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)"></a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)"></a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Card Title</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($offres as $offre)
                                <li class="list-group-item"><a href="{{ route('site.offre.detail',['offre_id'=>$offre->offre_id]) }}">{{ $offre->nom_offre }}</a></li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="card-footer">
                        Card footer
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
@section('script')

@endsection
