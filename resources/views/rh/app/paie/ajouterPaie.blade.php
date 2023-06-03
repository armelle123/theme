@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Ajouter un Salaire </h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p>--}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">salaires</a></li>
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
                          <form style="width:65%;" method="post" action="{{route('salaires.ajouter')}}">


                            @csrf
                              <div class="mb-3">
                                <label for="nature_salaire"  class="form-label">Nature</label>
                                <input type="text" class="form-control"  required name="nature_salaire" id="nature_salaire">
                              </div>
                              <label for="montant_salaire"  class="form-label">Montant</label>
                                <input type="integer" class="form-control"  required name="montant_salaire" id="montant_salaire">
                              </div>
                              <label for="bonus_salaire"  class="form-label">Bonus</label>
                                <input type="integer" class="form-control"  required name="bonus_salaire" id="bonus_salaire">
                              </div>
                              <label for="avance_salaire"  class="form-label">Avance</label>
                                <input type="integer" class="form-control"  required name="avance_salaire" id="avance_salaire">
                              </div>
                              <div class="mb-3">
                                <label for="date_salaire" class="form-label">Date Debut</label>
                                <input type="date" class="form-control" required name="date_salaire" id="date_salaire">
                              </div>
                              <div class="mb-3">
                                  <label for="periode_salaire" class="form-label">Date Fin</label>
                                  <input type="date" class="form-control" required name="periode_salaire" id="periode_salaire">

                                </div>
                              <button type="submit" class="btn btn-primary">Enregistrer</button>
                              <a href="{{route('salaires')}}"class="btn btn-danger">Annuler</a>
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