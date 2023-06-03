@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>liste des conges</h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p>--}}
                </div>
            </div>
            {{-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">conges</a></li> --}}
                                       {{-- <li class="breadcrumb-item active"><a href="javascript:void(0)">liste des conges</a></li> --}}
                </ol>
            </div>
        </div>
        <div class="row justify-content-center">

            <div class= "d-flex justify-content-between mb-4">

                {{$conges->links()}}
                <div><a href="{{route('conges.create')}}" class="btn btn-primary"> ajouter un nouveau conges</a></div>
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
                  <th scope="col">employes</th>
                  <th scope="col">motif</th>
                  <th scope="col">Description</th>
                  <th scope="col">date debut</th>
                  <th scope="col">date fin</th>
                  <th scope="col">action</th>




                </tr>
              </thead>
              <tbody>
              @foreach($conges as $conge)
                <tr>
                  <th scope="row">{{$loop->index +1}}</th>
                  <td>{{$conge->user->firstname}}</td>
                  <td>{{$conge->motif}}</td>
                  <td>{{$conge->description}}</td>
                  <td>{{$conge->debut_conges}}</td>
                  <td>{{$conge->fin_conges}}</td>

                  {{-- <td>{{$conge->user_id}}</td> --}}

                    <td>
                        <a href="{{ route('conges.edit',['conge'=>$conge->conges_id]) }}" class="btn btn-info">Editer</a>

                        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez vous vraiment supprimer ce conges?')){document.getElementById('form-{{$conge->conges_id}}').submit()}">supprimer</a>

                        <form id="form-{{$conge->conges_id}}" action="{{route('conges.supprimer',['conge'=>$conge->conges_id])}}" method="post">
                            {{-- <a href="#" class="btn btn-danger" onclick="if(confirm('voulez vous vraiment supprimer cet etudiant?')){document.getElementById("form-{{$conges->conges_id}}").submit() }">supprimer</a> --}}

                            {{-- <form id="form-{{$conges->id}}" action="{{route('conges.supprimer',['conges'=>$conges->conges_id])}}" method="post"> --}}
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
