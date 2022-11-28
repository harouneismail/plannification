@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Sauvegarder un Resultat Attendu</h4>
        </div>
         <form action="{{ url('resultatattendu') }}" method="post">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%">
               <div class="row">
                   <div class="col form-group">
                       <div class="form-group">
                            <label for="" class="col-form-label-lg">
                            Programme
                        </label>
                       </div>
                       <div class="form-group">
                         <select name="axe_id" id="axe_id" class="form-control" onchange="getInterventioncle();">
                             <option value="">Choisissez un Axe</option>
                             @foreach ($axe as $axe)
                                <option value="{{ $axe->id }}">{{ $axe->name_axe }}</option>
                             @endforeach

                         </select>
                       </div>

                        <div class="status-error">
                                @if($errors->get('axe_id'))
                                @foreach($errors->get('axe_id') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label-lg">
                            Sous-Programme
                        </label>
                       </div>
                        <div class="form-group">
                            <select name="composante_id" id="composante_id" class="form-control" onchange="getInterventioncle();">
   
                            </select>
                          </div>
   
                           <div class="status-error">
                                   @if($errors->get('composante_id'))
                                   @foreach($errors->get('composante_id') as $message)
                                               <li class="alert alert-danger">{{ $message }}</li>
                                           @endforeach
                               @endif
                           </div>
                           <div class="form-group">
                            <label for="" class="col-form-label-lg">
                            Composante
                        </label>
                       </div>
                        <div class="form-group">
                            <select name="souscomposante_id" id="souscomposante_id" class="form-control" onchange="getInterventioncle();">
   
                            </select>
                          </div>
   
                           <div class="status-error">
                                   @if($errors->get('souscomposante_id'))
                                   @foreach($errors->get('souscomposante_id') as $message)
                                               <li class="alert alert-danger">{{ $message }}</li>
                                           @endforeach
                               @endif
                           </div>
                           <div class="col form-group">
                            <div class="form-group">
                                 <label for="" class="col-form-label-lg">
                                 Resultat Attendu
                             </label>
                            </div>
                       <div class="form-group">
                         <input name="name_resultatattendus" id="name_resultatattendus" class="form-control" value="{{ old('name_resultatattendus') }}">
                       </div>

                        <div class="status-error">
                                @if($errors->get('name_resultatattendus'))
                                @foreach($errors->get('name_resultatattendus') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                            @endif
                        </div>
                        <div class="col form-group">
                            <div class="form-group">
                                 <label for="" class="col-form-label-lg">
                                 Code Resultat Attendu
                             </label>
                            </div>
                       <div class="form-group">
                         <input name="code_resultatattendus" id="code_resultatattendus" class="form-control" value="{{ old('code_resultatattendus') }}">
                       </div>

                        <div class="status-error">
                                @if($errors->get('code_resultatattendus'))
                                @foreach($errors->get('code_resultatattendus') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                            @endif
                        </div>
                   </div>
               </div>
            </div>
            <div class="row" style="margin-top: 2%">
                   <button type="submit" class="col btn btn-success" style="font-size: 1.5rem">Sauvegarder</button>
            </div>
        </form>
     </div>

</div>
@endsection
