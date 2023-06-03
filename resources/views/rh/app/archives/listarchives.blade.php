@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>liste des fichiers</h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p>--}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">fichiers</a></li>
                                       <li class="breadcrumb-item active"><a href="javascript:void(0)">liste des fichiers</a></li>
                </ol>
            </div>
        </div>
        <div class="row justify-content-center">

            <div class= "d-flex justify-content-between mb-4">

                {{$fichiers->links()}}
                <div><a href="{{route('fichiers.create')}}" class="btn btn-primary"> ajouter une nouvelle paie</a></div>
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
                  <th scope="col">titre fichier</th>
                  <th scope="col">nature fichier</th>
                  <th scope="col">chemin fichier</th>
                  <th scope="col">action</th>




                </tr>
              </thead>
              <tbody>
              @foreach($fichiers as $fichier)
                <tr>
                  <th scope="row">{{$loop->index +1}}</th>
                  <td>{{$fichier->user->firstname}}</td>
                  <td>{{$fichier->titre_fichier}}</td>
                  <td>{{$fichier->nature_fichier}}</td>
                  <td>{{$fichier->chemin_fichier}}</td>
                  <td>
                    <a href="#" class="btn btn-info">Editer</a>
                    <a href="#" class="btn btn-danger" onclick="if(confirm('voulez vous vraiment supprimer cette paie ?')){document.getElementById("form-{{$fichier->fichier_id}}").submit() }">supprimer</a>
                <form id="form-{{$fichier->id}}" action="{{route('fichiers.supprimer',['fichier'=>$fichier->fichier_id])}}" method="post">
                      @csrf
                      <input type="hidden" name="_method" value="delete">

                    </form>
                  </td>
                </tr>

                @endforeach

                </div>
              </tbody>

            </table>
              </div>
        </div>

    </div>

@stop
@section('script')

@endsection
