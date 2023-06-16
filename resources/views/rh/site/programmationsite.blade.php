@extends('layouts.site')

@section('content')

    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>PROGRAMMATION</h4>
                    {{--                    <p class="mb-0">Your business dashboard template</p>--}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item"><a href="javascript:void(0)">Accueil</a></li> --}}
                    {{--                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Components</a></li>--}}
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
                          <form style="width:65%;" method="post" action="/candidats/ajouter">
                            @csrf
{{-- <div class="main-area"><div style="background-color:#FFFFFF;position:sticky;top:0;z-index:10;padding-top:0.4rem;padding-bottom:0.4rem">
    <div class="container"><a href="/9313"><div style="width:60px;height:60px;overflow:hidden;border-radius:5px"><img src="https://rooster-content-s3.s3.amazonaws.com/companyLogos/logo_glotelho.PNG_1620657093244" style="width:100%;height:100%"></div></a></div></div>
    <div style="background-color:#FFFFFF;padding-top:0em;padding-bottom:1em"> --}}
        <div class="container"><div class="ant-row" style="margin-left:-12px;margin-right:-12px;font-size:16px">
            <div style="padding-left:12px;padding-right:12px" class="ant-col ant-col-xs-24 ant-col-sm-18">



{{--
         <form  method="post" action="{{route('candidat.store')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="offre_id" value="{{$offre_id}}">

                <label for="id_candidat">IDENTIFIANT<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="text" class="form-control" id="id_candidat" name="id_candidat" required>


                <label for="nom_cand">NOM<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="text" class="form-control" id="nom_cand" name="nom_cand" required>


                <label for="prenom_cand">PRENOM<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="text" class="form-control" id="prenom_cand" name="prenom_cand" required>



                <label for="statuts_cand">STATUS<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <textarea  type="text" class="form-control" id="statuts_cand" name="statuts_cand" required></textarea>


                <label for="email_cand">EMAIL<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="email" class="form-control" id="email_cand" name="email_cand" required>


                <label for="email_confirmer_cand">Email-verify<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="email" class="form-control" id="email_confirmer_cand" name="email_confirmer_cand" required>

                <label for="tel_cand">TELEPHONE<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="tel" class="form-control" id="tel_cand" name="tel_cand" required>


                <label for="cv_cand">CV<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="file" class="form-control-file" id="cv_cand" name="cv_cand" accept=".pdf,.doc,.docs"required>


                <label for="lettremotiv_cand">Lettre Motivation<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="file" class="form-control-file" id="lettremotiv_cand" name="lettremotiv_cand" accept=".pdf,.doc,.docs"required>


                <label for="diplome_bts_cand">Diplome BTS<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="file" class="form-control-file" id="diplome_bts_cand" name="diplome_bts_cand" accept=".pdf,.doc,.docs"required>


                <label for="diplome_licence_cand">Diplome LICENCE<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="file" class="form-control-file" id="diplome_licence_cand" name="diplome_licence_cand" accept=".pdf,.doc,.docs"required>


                <label for="diplome_masteur_cand">Diplome MASTEUR<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="file" class="form-control-file" id="diplome_masteur_cand" name="diplome_masteur_cand" accept=".pdf,.doc,.docs"required>


                <label for="diplome_licence_cand">Diplome LICENCE<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="file" class="form-control-file" id="diplome_licence_cand" name="diplome_licence_cand" accept=".pdf,.doc,.docs"required>
            </div>


            <button type="submit" class="btn btn-primary">Envoyer</button>


        </form>



@stop
@section('script')

@endsection --}}
