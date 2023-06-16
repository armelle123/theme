{{-- @extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>calculpaie </h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p>--}}
                </div>
            </div>
            {{-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">salaires</a></li>
                                   <li class="breadcrumb-item active"><a href="javascript:void(0)">calcul</a></li>
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
                         <h1>paie de {{ $user->name}}</h1>
                         <p>brut_salaire :{{ $user->salaires}}</p>
                         <p>impots :{{ 0.2*$user->salaires}}</p>
                         <p>cotisations :{{ 0.1*$user->salaires}}</p>
                         <p>retenues :{{ 0.1925*$user->salaires}}</p>
                         <p>net_salaire :{{ $net_salaire}}</p>
                         <h2>Historiques de paies</h2>
                         <ul> @foreach (salaires as Salaires )
                            <li>{{ $salaires->date}} :{{$salaires->net_salaire}}</li>



                         @endforeach</ul>

                       </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
@section('script') --}}

@endsection --}}
