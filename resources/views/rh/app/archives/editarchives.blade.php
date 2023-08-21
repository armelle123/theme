@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Editer un fichier </h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p>--}}
                </div>
            </div>
            {{-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">fichiers</a></li>
                                   <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter</a></li>
                </ol>
            </div>
        </div> --}}
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
                          <form  action="{{route('fichiers.ajouter')}}" method="post"  style="width:65%;" enctype ="multipart/form-data">
                            @csrf
                              <div class="form-group" >
                                <label for="titre_fichier">Titre</label>
                                <input type="text"  required name="titre_fichier"  class="form-control" placeholder="Entrer le Titre" >
                              </div>
                              <div class="form-group" >
                                <label for="description_fichier">Description</label>
                                <textarea required name="description_fichier"  class="form-control" placeholder="Entrer la Description"></textarea>
                              </div>

                              <div class="form-group" >
                                <label for="type_fichier">Type</label>
                                <select   class="form-control" name="type_fichier" id="type_fichier">
                                    <option value="pdf">PDF</option>
                                    <option value="doc">Word</option>
                                    <option value="xls">Excel</option>
                                    <option value="png">PNG</option>
                                    <option value="jpg">JPEG</option>
                                </select>

                              </div>

                              <div class="form-group">
                                <label for="chemin_fichier">selectionner un fichier</label>
                                <input type="file"   class="form-control" name="chemin_fichier" id="chemin_fichier">
                              </div>
                              <button type="submit" class="btn btn-primary">Enregistrer</button>
                              <button type="submit" class="btn btn-primary">Modifier</button>
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
