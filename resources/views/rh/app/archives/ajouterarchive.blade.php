@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Ajouter un fichier </h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p>--}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">fichiers</a></li>
                                   <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter</a></li>
                </ol>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card px-3">

                   <div class="card-body">
                    <div class="mt-3">

                        @if (session()->has("success"))
                        <div class="alert alert-success">
                          <h3>{{session()->get('success')}}</h3>
                        </div>
                        @endif
                      @if ($errors->any)
                      <div class="alert alert-danger">
                        <ul >
                          @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                          @endforeach
                        </ul>
                      </div>
                        @endif
                          <form style="width:65%;" method="post" action="{{route('fichiers.ajouter')}}">
                            @csrf
                              <div class="mb-3">
                                <label for="titre_fichier"  class="form-label">Titre</label>
                                <input type="text" class="form-control"  required name="titre_fichier" id="titre_fichier">
                              </div>
                              <label for="nature_fichier"  class="form-label">Nature</label>
                                <input type="text" class="form-control"  required name="nature_fichier" id="nature_fichier">
                              </div>
                              <label for="chemin_fichier"  class="form-label">chemin</label>
                                <input type="text" class="form-control"  required name="chemin_fichier" id="chemin_fichier">
                              </div>
                              <button type="submit" class="btn btn-primary">Enregistrer</button>
                              <a href="{{route('fichiers')}}"class="btn btn-danger">Annuler</a>
                            </form>

                       </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
@section('script')

@endsection
