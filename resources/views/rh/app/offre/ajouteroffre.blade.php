@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>postuler a une offre </h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p> --}}
                </div>
            </div>
            {{-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                {{-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">offres</a></li>
                                   <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter</a></li>
                </ol> --}}
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card px-3">

                <div class="card-body">
                    @include('_partial._flash-message')

                    <div class="mt-3">

                        {{-- @if (session()->has('success'))
                        <div class="alert alert-success">
                          <h3>{{session()->get('success')}}</h3>
                        </div>
                        @endif
                      @if ($errors->any)
                      <div class="alert alert-danger">
                        <ul >
                          @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                          @endforeach
                        </ul>
                      </div>
                        @endif --}}
                        <form style="width:65%"style="color:black" method="post" action="{{ route('offres.ajouter') }}">
                            @csrf

                            {{-- <div class="mb-3">
                                <label for="nom_offre"  class="form-label">Nom</label>
                                <input type="text" class="form-control"  required name="nom_offre" id="nom_offre">
                              </div> --}}

                            <div class="mb-3"style="color:black">
                                <label for="nom_offre" class="form-label">Titre de l'offre</label>
                                <input type="text" class="form-control" required name="nom_offre" id="nom_offre ">
                            </div>

                            {{-- <div class="form-group">
                                <label for="departement_id"><h3>departement</h3></label>
                                <select class="form-control" onchange="filterFormInput()" required name="departement_id" id="departement_id ">
                                    <option value="0">secretaria</option>
                                    <option value="1">maintenance</option>
                                    <option value="2">marketing</option>
                                    <option value="3">software</option>
                                </select>

                              </div> --}}

                            <div class="mb-3" style="color:black">
                                <label for="exampleInputPassword1" class="form-label">Departement</label>
                                <select class="form-control" required name="departement_id">
                                    <option value=""></option>
                                    @foreach ($departements as $departement)
                                        <option value="{{ $departement->departement_id }}">{{ $departement->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row col-md-24">
                                <div class="mb-12" style="color:black">
                                    <label for="type_offre">TYPE offre</label>
                                    <br>
                                    <select name="type_offre" id="type_offre">
                                        <option>CDI</option>
                                        <option>CDD</option>
                                        <option>Freelance</option>
                                        <option>Stage Academique</option>
                                        <option>Stage Proffessionnel</option>
                                    </select>


                                </div>


                                <div class="mb-6" style="color:black">
                                    <label for="date_debut_offre" class="form-label">Date Debut</label>
                                    <input type="date" class="form-control" required name="date_debut_offre"
                                        id="date_debut_offre">
                                </div>
                                <div class="mb-6" style="color:black">
                                    <label for="date_fin_offre" class="form-label">Date Fin</label>
                                    <input type="date" class="form-control" required name="date_fin_offre"
                                        id="date_fin_offre">
                                </div>

                            </div>
                            <div class="form-group" style="color:black">
                                <input type="hidden" name="description_offre" id="description_offre"
                                    class="description_offre">
                                <label>
                                    Description Offres
                                </label>
                                <div class="summernote" onchange="getValue()" id="description_offre"></div>
                            </div>
                            <button type="submit" id="enregistrer" onclick="save()"
                                class="btn btn-primary float-right">Enregistrer </button>

                            <a href="{{ route('offres') }}"class="btn btn-danger" style="font-size: 15px;">Annuler</a>

                    </div>
                </div>

                </form>




            </div>
        </div>
        </form>

    </div>
    </div>
    </div>
    </div>

    </div>

@stop
@section('script')
    <script src="{{ asset('template/vendor/summernote/js/summernote.min.js') }}"></script>
    <script src="{{ asset('template/js/plugins-init/summernote-init.js') }}"></script>
    <script>
        $('#enregistrer').click(function(e) {
            var marUp = $('.summernote').summernote('code');
            $('#description_offre').val(marUp);
        })
    </script>

@endsection
