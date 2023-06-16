@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>liste des offres</h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p>--}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                {{-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">offres</a></li>
                                       <li class="breadcrumb-item active"><a href="javascript:void(0)">liste des offres</a></li>
                </ol> --}}
            </div>
        </div>
        <div class="row justify-content-center">

            <div class= "d-flex justify-content-between mb-4">

                {{$offres->links()}}
                <div><a href="{{route('offres.create')}}" class="btn btn-primary"> ajouter une nouvelle offre</a></div>
               </div>

               @if (session()->has("successDelete"))
               <div class="alert alert-success">
                 <h3>{{session()->get('successDelete')}}</h3>
               </div>
               @endif


                <table class="table table-bordered table-hover ">
              <thead>

                <tr>
                  <th scope="col">#</th>
                  <th scope="col">departement</th>
                  <th scope="col">titre offre</th>
                  <th scope="col">type offre</th>
                  <th scope="col">description offre</th>
                  {{-- <th scope="col">statut offre</th> --}}
                  <th scope="col">date debut</th>
                  <th scope="col">date fin</th>
                  <th scope="col">action</th>

                </tr>
              </thead>
              <tbody>
                 {{-- @dd($offres) --}}
                {{-- {{$offres['nom']}} --}}
              @foreach($offres as $offre)
                <tr>
                  <th scope="row">{{$loop->index +1}}</th>
                  {{-- <td>{{$offre->user->firstname}}</td> --}}
                  <td>{{$offre->nom}}</td>
                  <td>{{$offre->nom_offre}}</td>
                  <td>{{$offre->type_offre}}</td>
                  <td>{{$offre->description_offre}}</td>
                  {{-- <td>{{$offre->statut_offre}}</td> --}}
                  <td>{{$offre->date_debut_offre}}</td>
                  <td>{{$offre->date_fin_offre}}</td>
                  <td>
                    <a href="{{route('offre.edit',['offre'=>$offre->offre_id]) }}" class="btn btn-info">Editer</a>
                    <a href="#" class="btn btn-danger" onclick="if(confirm('voulez vous vraiment supprimer cet etudiant?')){document.getElementById('form-{{$offre->offre_id}}').submit() }">supprimer</a>

                    <form id="form-{{$offre->offre_id}}"  action="{{route('offres.supprimer',['offre'=>$offre->offre_id])}}" method="post">
                      @csrf
                      <input type="hidden" name="_method" value="delete">

                    </form>
                  </td>
                </tr>

                @endforeach

              </tbody>

            </table>
        </div>
    </div>



@endsection
