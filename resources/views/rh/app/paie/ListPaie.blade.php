@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>liste des paiements</h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p>--}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                {{-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">salaires</a></li>
                                       <li class="breadcrumb-item active"><a href="javascript:void(0)">liste des paiements</a></li>
                </ol> --}}
            </div>
        </div>
        <div class="row justify-content-center">

            <div class= "d-flex justify-content-between mb-4">

                {{$salaires->links()}}
                <div><a href="{{route('salaires.create')}}" class="btn btn-primary"> ajouter une nouvelle paie</a></div>
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
                  <th scope="col">nature salaire</th>
                  <th scope="col">montant salaire</th>
                  <th scope="col">periode salaire</th>
                  <th scope="col">bonus</th>
                  <th scope="col">avance</th>
                  <th scope="col">action</th>

                </tr>
              </thead>
              <tbody>
              @foreach($salaires as $salaire)
                <tr>
                  <th scope="row">{{$loop->index +1}}</th>
                  {{-- <td>{{$salaire->user->firstname}}</td> --}}
                  <td>{{$salaire->nature_salaire}}</td>
                  <td>{{$salaire->montant_salaire}}</td>
                  <td>{{$salaire->periode_salaire}}</td>
                  <td>{{$salaire->bonus_salaire}}</td>
                  <td>{{$salaire->avance_salaire}}</td>

                  <td>
                    <a href="{{ route('salaire.edit',['salaire'=>$salaire->salaire_id]) }}" class="btn btn-info">Editer</a>
                    <a href="#" class="btn btn-danger" onclick="if(confirm('voulez vous vraiment supprimer cette paie ?')){document.getElementById('form-{{$salaire->salaire_id}}').submit() }">supprimer</a>

                    <form id="form-{{$salaire->salaire_id}}"  action="{{route('salaires.supprimer',['salaire'=>$salaire->salaire_id])}}" method="post">
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
