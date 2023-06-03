@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>modifier une offre </h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p>--}}
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
                          <form style="width:65%;" method="post" action="{{route('offre.update',['offre'=>$offre->offre_id])}}">


                            @csrf
                            <input type="hidden" name="_method" value="put">

                              <div class="mb-3">
                              <label for="nom_offre"  class="form-label">Nom</label>
                              <input type="text" class="form-control"  required name="nom_offre" id="nom_offre" value="{{$offre->nom}}">
                            </div>
                                <div class="mb-3">
                              <label for="statut_offre"  class="form-label">statut</label>
                                <input type="text" class="form-control"  required name="statut_offre" id="statut_offre" value="{{$offre->statut_offre}}">
                              </div>
                              <div class="mb-3">
                                <label for="date_debut_offre" class="form-label">Date Debut</label>
                                <input type="date" class="form-control" required name="date_debut_offre" id="date_debut_offre" value="{{$offre->date_debut_offre}}">
                              </div>
                              <div class="mb-3">
                                  <label for="date_fin_offre" class="form-label">Date Fin</label>
                                  <input type="date" class="form-control" required name="date_fin_offre" id="date_fin_offre" value="{{$offre->date_fin_offre}}">
                                </div>

                                <div class="mb-3">
                                    <label for="description_offre"  class="form-label">Description</label>
                                   <textarea  class="form-control"name="description_offre" id="description_offre" cols="30" rows="10" value="{{$offre->description_offre}}"></textarea>
                                  </div>

                                  {{-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Summernote</a></li>
                                    </ol>
                                </div> --}}
                            </div>
                            <!-- row -->
                            <div class="row">
                                <div class="col-xl-12 col-xxl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Summernote Editor</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="summernote"></div>
                                        </div>
                              <button type="submit" class="btn btn-primary">Enregistrer</button>
                              <button type="submit" class ="btn btn-primary">Modifier</button>
                              <a href="{{route('offres')}}"class="btn btn-danger">Annuler</a>




                                        </div>
                                    </div>

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

@endsection
