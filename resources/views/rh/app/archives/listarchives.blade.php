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
                    <h4>liste des fichiers</h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p>--}}
                </div>
            </div>
            {{-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">fichiers</a></li>
                                       <li class="breadcrumb-item active"><a href="javascript:void(0)">liste des fichiers</a></li>
                </ol>
            </div> --}}
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card px-3" >

                   <div class="card-body">
                    <div class="mt-3">

            <div class= "d-flex justify-content-between mb-4">

                {{$fichiers->links()}}
                <div class="col-md-6">
                    {{-- <form action="{{route('fichiers.search')}}" method="GET" class="form-inline">
                        <div class="input-group">
                            <input  mb-4 type="text" name="search" class="form-control" placeholder="search">
                            <div class="input-goup-append">
                                <button type="submit"class="btn btn-primary">Rechercher</button>
                            </div>
                        </div>
                    </form> --}}
                </div>
                <div><a href="{{route('fichiers.create')}}" class="btn btn-primary"> ajouter un nouveau fichier</a></div>
               </div>

               {{-- @if (session()->has("successDelete"))
               <div class="alert alert-success">
                 <h3>{{session()->get('successDelete')}}</h3>
               </div> --}}
               {{-- @endif --}}


                <table  id="example" class="table table-bordered table-hover text-center" style="color:white" style="width:65%";>
              <thead class="bg-primary">

                <tr style="font-weight: bold"; >
                  <th scope="col" >#</th>
                  <th scope="col" >employes</th>
                  <th scope="col" >Titre Fichier</th>
                  <th scope="col" >Description</th>
                  <th scope="col" >Type Fichier</th>
                  <th scope="col" >Chemin Fichier</th>
                  <th scope="col" >action</th>


                </tr>
              </thead>
              <tbody>
              @foreach($fichiers as $fichier)
                <tr>
                  <th scope="row" style="color:black">{{$loop->index +1}}</th>
                  <td  style="color:black">{{$fichier->user->firstname}}</td>
                  <td style="color:black">{{$fichier->titre_fichier}}</td>
                  <td style="color:black">{{$fichier->type_fichier}}</td>
                  <td style="color:black">{{$fichier->description_fichier}}</td>
                  <td style="color:black"> <a href="{{asset('fichier')}}/{{$fichier->chemin_fichier}}">{{$fichier->chemin_fichier}}</a></td>
                  <td style="color:black">
                    <!--print button-->
                    <button class="btn btn-info btn-xs ml-1" onclick="printFile('{{asset('fichier')}}/{{$fichier->chemin_fichier}}')"title="IMPRIMER"><i class="fa fa-print"></i></button>
                    {{-- <a href="{{ route('fichiers.edit',['fichier'=>$fichier->fichier_id]) }}" class="btn btn-info">Editer</a> --}}
                    <a href="#" class="btn btn-danger" onclick="if(confirm('voulez vous vraiment supprimer cette paie ?')){document.getElementById('form-{{$fichier->fichier_id}}').submit()}" style="color:black;" title="supprimer"> <i class="fa fa-trash-o"></i></a>

                <form id="form-{{$fichier->fichier_id}}" action="{{route('fichiers.supprimer',['fichier'=>$fichier->fichier_id])}}" method="post">
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
<script>
    function printFile(fileUrl) {
        var printWindow = window.open(fileUrl,'_blank');
        printWindow.addEventListener('load',function(){
            printWindow.print();
        });
    }
</script>
<script src="{{asset('template/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/js/plugins-init/datatables.init.js')}}"></script>
<script src="{{asset('template/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>

@endsection
