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
                        <ul class="list-group" style="color:black"  style="font-size: 20px;">
                            @foreach ($candidats as $candidat)
                            <p>{{$candidat->nom}}</p>
                            <p>{{$candidat->prenom_cand}}</p>
                            <p>{{$candidat->email_cand}}</p>
                            <p>{{$candidat->tel_cand}}</p>
                            <p>{{$candidat->cv_cand}}</p>
                            <p>{{$candidat->lettremotiv_cand}}</p>
                            <p>{{$candidat->diplome_bts_cand}}</p>
                            <p>{{$candidat->diplome_licence_cand}}</p>
                            <p>{{$candidat->diplome_masteur_cand}}</p>
                            <p>{{$candidat->statuts_cand}}</p>
                            <p>{{$candidat->email_confirmer_cand}}</p>
                            <p>{{$candidat->offre->titre}}</p>

                            @endforeach

                        </ul>
                    </div>
                    {{-- <div class="card-footer">
                        Card footer
                    </div> --}}
                </div>
            </div>
        </div>
    </div>


@stop
@section('script')

@endsection
