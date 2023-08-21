@extends('layouts.app')
@section('css_before')
    <link href="{{asset('template/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/vendor/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">

@endsection

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
                {{-- </ol>
            </div> --}}
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card px-3" >


                   <div class="card-body">

                    <div class="mt-3">


            <div class= "d-flex justify-content-between mb-4"  style="color:black">

                {{-- {{$conges->links()}} --}}

                <div class="col-md-6">
                    {{-- <form action="{{route('conges.search')}}" method="GET" class="form-inline">
                        <div class="input-group">
                            <input  mb-4 type="text" name="search" class="form-control" placeholder="search">
                            <div class="input-goup-append">
                                <button type="submit"class="btn btn-primary">Rechercher</button>
                            </div>
                        </div>
                    </form> --}}
                </div>
                <div><a href="{{route('conges.create')}}" class="btn btn-primary"> ajouter </a></div>
               </div>
               </div>

               {{-- @if (session()->has("successDelete"))
               <div class="alert alert-success">
                 <h3>{{session()->get('successDelete')}}</h3>
               </div>
               @endif --}}


                <table  id="example" class="table table-bordered table-hover text-center "  >
              <thead class="bg-primary">

                <tr >
                  <th scope="col" >#</th>
                  <th scope="col" >employes</th>
                  <th scope="col" >motif</th>
                  <th scope="col" >Description</th>
                  <th scope="col" >date debut</th>
                  <th scope="col" >date fin</th>
                  <th scope="col" >action</th>




                </tr>
              </thead>
              <tbody class="text-tark">
                {{-- @dd($conges) --}}
              @foreach($conges as $conge)
                <tr >
                  <th style="color:black">{{$loop->index +1}}</th>
                  <td style="color:black">{{$conge->user->firstname}}</td>
                  <td style="color:black">{{$conge->motif}}</td>
                  <td style="color:black">{{$conge->description}}</td>
                  <td style="color:black">{{$conge->debut_conges}}</td>
                  <td style="color:black">{{$conge->fin_conges}}</td>

                  {{-- <td>{{$conge->user_id}}</td> --}}

                    <td>
                        {{-- <a  class ="btn btn-sn btn-danger mx-1 "onclick="deleteFun({{ $conge->conges_id}})"href="javascript:void(0)" title="supprimer"><i class="fa fa-trash-o"></i></a> --}}
                        <a href="{{ route('conges.edit',['conge'=>$conge->conges_id]) }}" class="btn btn-info" style="color:black;" title="Editer"><i class="fa fa-edit"></i></a>

                        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez vous vraiment supprimer ce conges?')){document.getElementById('form-{{$conge->conges_id}}').submit()}" style="color:black"; title="supprimer"> <i class="fa fa-trash-o"></i></a>

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
<script src="{{asset('template/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/js/plugins-init/datatables.init.js')}}"></script>
<script src="{{asset('template/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>


@endsection
