@extends('layouts.site')

@section('content')

    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>PROGRAMMATION</h4>
                    <p><em>Nous sommes a la recherche de jeunes dynamiques ayant un excellent bilan scolaire  prêt à faire un pas dans le monde professionnel
                    </em></p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">

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




         <form  method="post" action="{{route('site.offre.postuler')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="offre_id" value="{{ $offre->offre_id}}">

                <label for="nom_cand">Nom<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="text" class="form-control" id="nom_cand" name="nom_cand" required>


                <label for="prenom_cand">Prenom<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="text" class="form-control" id="prenom_cand" name="prenom_cand" required>



                <label for="email_cand">Email<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="email" class="form-control" id="email_cand" name="email_cand" required>


                <label for="email_confirmer_cand">Email-Verify<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="email" class="form-control" id="email_confirmer_cand" name="email_confirmer_cand" required>

                <label for="tel_cand">Telephone<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="tel" class="form-control" id="tel_cand" name="tel_cand" required>


                <label for="cv_cand">Cv<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="file" class="form-control" id="cv_cand" name="cv_cand" accept=".pdf,.doc,.docs"required>


                <label for="lettremotiv_cand">Lettre Motivation<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="file" class="form-control" id="lettremotiv_cand" name="lettremotiv_cand" accept=".pdf,.doc,.docs"required>


                <label for="diplome_bts_cand">Diplome Bts<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="file" class="form-control" id="diplome_bts_cand" name="diplome_bts_cand" accept=".pdf,.doc,.docs"required>


                <label for="diplome_licence_cand">Diplome Licence<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="file" class="form-control" id="diplome_licence_cand" name="diplome_licence_cand" accept=".pdf,.doc,.docs"required>


                <label for="diplome_masteur_cand">Diplome Masteur<span style="margin-left:4px;color:#ff4d4f">*</span> </label>
                <input type="file" class="form-control" id="diplome_masteur_cand" name="diplome_masteur_cand" accept=".pdf,.doc,.docs"required>



            </div>


            <button type="submit" class="btn btn-primary">Envoyer</button>

            <a href="{{route('site.offre')}}"class="btn btn-danger">Annuler</a>


        </form>



@stop
@section('script')

@endsection
