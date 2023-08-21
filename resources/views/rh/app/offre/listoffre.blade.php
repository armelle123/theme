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
                    <h4>liste des offres</h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p>--}}
                </div>
            </div>
            {{-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex"> --}}
                {{-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">offres</a></li>
                                       <li class="breadcrumb-item active"><a href="javascript:void(0)">liste des offres</a></li>
                </ol> --}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card px-3" >

                   <div class="card-body">
                    <div class="mt-3">

            <div class= "d-flex justify-content-between mb-4">

                {{-- {{$offres->links()}} --}}
                <div class="col-md-6">
                    {{-- <form action="{{route('offres.search')}}" method="GET" class="form-inline">
                        <div class="input-group">
                            <input  mb-4 type="text" name="search" class="form-control" placeholder="search">
                            <div class="input-goup-append">
                                <button type="submit"class="btn btn-primary">Rechercher</button>
                            </div>
                        </div>
                    </form> --}}
                </div>
                <div><a href="{{route('offres.create')}}" class="btn btn-primary"> ajouter une nouvelle offre</a></div>
               </div>
               </div>

               {{-- @if (session()->has("successDelete"))
               <div class="alert alert-success">
                 <h3>{{session()->get('successDelete')}}</h3>
               </div>
               @endif --}}


                <table id="example" class="table table-bordered table-hover text-center">
              <thead class="bg-primary" >

                <tr  >
                  <th scope="col">#</th>
                  <th scope="col">departement</th>
                  <th scope="col">titre offre</th>
                  <th scope="col">type offre</th>
                  <th scope="col">description offre</th>
                  <th scope="col">statut offre</th>
                  <th scope="col">date debut</th>
                  <th scope="col">date fin</th>
                  <th scope="col">action</th>

                </tr>
              </thead>
              <tbody>
                 {{-- @dd($offres) --}}
              @foreach($offres as $offre)
                <tr>
                  <th scope="row" style="color:black">{{$loop->index +1}}</th>
                  <td style="color:black">{{$offre->nom}}</td>
                  <td style="color:black">{{$offre->nom_offre}}</td>
                  <td style="color:black">{{$offre->type_offre}}</td>
                  <td style="color:black">{{$offre->description_offre}}</td>
                  <td style="color:black">
                    @if ($offre->statut_offre==0)
                    <span class="text-warning">En attente</span>
                    @elseif ($offre->statut_offre==1)
                    <span class="text-success">Publier</span>
                    @else
                    <span class="text-danger">Depublier</span>
                    @endif</td>

                  <td style="color:black">{{$offre->date_debut_offre}}</td>
                  <td style="color:black">{{$offre->date_fin_offre}}</td>
                  <td >
                    <div class="d-flex mb-1">

                    <a href="{{route('offre.edit',['offre'=>$offre->offre_id]) }}" class="btn btn-warning btn-xs ml-1"  style="color:black";title="Editer"><i class="fa fa-edit"></i></a> <br>

                    <a href="#" class="btn btn-danger btn-xs ml-1" onclick="if(confirm('voulez vous vraiment supprimer cet etudiant?')){document.getElementById('form-{{$offre->offre_id}}').submit() }" style="color:black";title="supprimer"> <i class="fa fa-trash-o"></i></a>

                    <form id="form-{{$offre->offre_id}}"  action="{{route('offres.supprimer',['offre'=>$offre->offre_id])}}" method="post">
                      @csrf
                      <input type="hidden" name="_method" value="delete">
                    </form>
                    </div>


                    @if ($offre->statut_offre==0)
                    <div class="d-flex">
                    <a href="{{route('offre.depublier',['id'=>$offre->offre_id]) }}" class="btn btn-dark btn-xs ml-1"title="Depublier"><i class="fa fa-lock"></i></a>
                    <a href="{{route('offre.publier',['id'=>$offre->offre_id]) }}" class="btn btn-success btn-xs ml-1"title="Publier"><i class="fa fa-check"></i></a>
                    @elseif ($offre->statut_offre==1)
                    <a href="{{route('offre.depublier',['id'=>$offre->offre_id]) }}" class="btn  btn-dark btn-xs ml-1"title="Depublier"><i class="fa fa-lock"></i></a>
                    @else
                    <a href="{{route('offre.publier',['id'=>$offre->offre_id]) }}" class="btn btn-success btn-xs ml-1"title="Publier"><i class="fa fa-check"></i></a>
                  @endif
                </div>
                  </td>
                  </td>
                </tr>

                @endforeach

              </tbody>

            </table>
        </div>
    </div>
    @stop
@section('script')
<script src="{{asset('template/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/js/plugins-init/datatables.init.js')}}"></script>
<script src="{{asset('template/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>




@endsection
