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
            {{-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">salaires</a></li>
                                   <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter</a></li>
                </ol>
            </div> --}}
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card px-3">

                   <div class="card-body">
                    @include('_partial._flash-message')

                    <div class="mt-3">

                        {{-- @if (session()->has("success"))
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
                        @endif --}}
                          <form style="width:65%;" method="post" action="{{route('salaires.ajouter')}}">


                            @csrf

                              <div class="mb-3" style="color:black" >
                              <label for="montant_salaire"  class="form-label">Montant</label>
                                <input type="integer" class="form-control"  required name="montant_salaire" id="montant_salaire">
                              </div>
                              <div class="mb-3" style="color:black" >
                              <label for="mois"  class="form-label">Mois</label>
                                <input type="month" class="form-control"  required name="mois" id="mois">
                              </div>
                              <div class="mb-3" style="color:black" >
                                <label for="exampleInputPassword1" class="form-label">Users</label>
                                <select class="form-control"  required name="user_id">
                                    <option value=""></option>
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->firstname}}</option>
                                    @endforeach
                                </select>
                              </div>

                               <div class="mb-3" style="color:black" >
                                <label for="exampleInputPassword1" class="form-label">Types</label>
                                <select  class="form-control" name="type_salaires" id="type_salaires">
                                 <option value="Avances">Avances</option>
                                  <option value="Total">Total</option>

                                  </select>
                                 </div>

                                 <div class="mb-3" style="color:black" >
                                    <label for="commentaire"  class="form-label">Commantaires</label>
                                   <textarea  class="form-control"name="commentaire" id="commentaire" cols="30" rows="10"></textarea>
                                  </div>



                              <button type="submit" class="btn btn-primary" >Enregistrer</button>
                              <a href="{{route('salaires')}}"class="btn btn-danger" >Annuler</a>
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
