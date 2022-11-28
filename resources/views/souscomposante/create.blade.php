@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Ajouter une Sous-Composante</h4>
        </div>
         <form action="{{ url('souscomposante') }}" method="post">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%; margin-bottom:2%; padding:2%">
                    <div class="row">
                       <div class="col">
                            <label for="" class="col-form-label-lg">
                            Programme
                            </label>
                       
                         <select name="axe_id" id="axe_id" class="form-control" onchange="getInterventioncle();">
                             <option value="">Choisissez un Axe</option>
                             @foreach ($axe as $axe)
                                <option value="{{ $axe->id }}">{{ $axe->name_axe }}</option>
                             @endforeach

                         </select>
                        <div class="status-error">
                                @if($errors->get('axe_id'))
                                @foreach($errors->get('axe_id') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                            @endif
                        </div>
                       </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <label for="" class="col-form-label-lg">
                            Sous-Programme
                            </label>
                            <select name="composante_id" id="composante_id" class="form-control" onchange="getInterventioncle();">
   
                            </select>
   
                           <div class="status-error">
                                   @if($errors->get('composante_id'))
                                   @foreach($errors->get('composante_id') as $message)
                                               <li class="alert alert-danger">{{ $message }}</li>
                                           @endforeach
                               @endif
                           </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="" class="col-form-label-lg">
                            Composante
                            </label>
                           <input name="name_souscomposante" id="name_souscomposante" class="form-control" value="{{ old('name_souscomposante') }}">

                           <div class="status-error">
                                   @if($errors->get('name_souscomposante'))
                                   @foreach($errors->get('name_souscomposante') as $message)
                                               <li class="alert alert-danger">{{ $message }}</li>
                                           @endforeach
                               @endif
                           </div>
                      </div>
                    </div>
                        <div class="row">
                            <div class="col">
                                <label for="" class="col-form-label-lg">
                                 Code Composante
                                </label>
                                <input name="code_souscomposante" id="code_souscomposante" class="form-control" value="{{ old('code_souscomposante') }}">

                                <div class="status-error">
                                        @if($errors->get('code_souscomposante'))
                                        @foreach($errors->get('code_souscomposante') as $message)
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
