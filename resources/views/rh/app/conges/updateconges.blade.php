@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>modifier un conges </h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p>--}}
                </div>
            </div>
            {{-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Conges</a></li>
                                   <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter</a></li>
                </ol>
            </div> --}}
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


                        <form style="width:65%;" method="post" action="{{route('conges.update',['conge'=>$conge->conges_id])}}">


                            @csrf

                            <input type="hidden" name="_method" value="put">
                              <div class="mb-3">
                                <label for="motif"  class="form-label">Motif</label>
                                <input type="text" class="form-control"  required name="motif" id="motif" value="{{$conge->motif}}">
                              </div>
                              <div class="mb-3">
                                <label for="description"  class="form-label">Description</label>
                               <textarea  class="form-control"name="description" id="description" value="{{$conge->description}}"cols="30" rows="10"></textarea>
                              </div>
                              <div class="mb-3">
                                <label for="debut_conges" class="form-label">Date Debut</label>
                                <input type="date" class="form-control" required name="debut_conges" id="debut_conges" value="{{$conge->debut_conges}}">
                              </div>
                              <div class="mb-3">
                                  <label for="fin_conges" class="form-label">Date Fin</label>
                                  <input type="date" class="form-control" required name="fin_conges" id="fin_conges" value="{{$conge->fin_conges}}">


                                </div>

                              <button type="submit" class="btn btn-primary">Enregistrer</button>
                             <button type="submit" class ="btn btn-primary">Modifier</button>
                              <a href="{{route('conges')}}"class="btn btn-danger">Annuler</a>
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
