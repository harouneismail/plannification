@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Sauvegarder un Resultat d'une Composante</h4>
        </div>
        <form action="{{ url('resultatcomposante') }}" method="post">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%">
                <div class="row">
                    <div class="col form-group">
                        <div class="form-group">
                             <label for="" class="col-form-label-lg">
                             Axe
                         </label>
                        </div>
                        <div class="form-group">
                          <select name="axe_id" id="axe_id" class="form-control">
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
                             Composante
                         </label>
                        </div>
                         <div class="form-group">
                             <select name="composante_id" id="composante_id" class="form-control">
    
                             </select>
                           </div>
    
                            <div class="status-error">
                                    @if($errors->get('composante_id'))
                                    @foreach($errors->get('composante_id') as $message)
                                                <li class="alert alert-danger">{{ $message }}</li>
                                            @endforeach
                                @endif
                            </div>
                            <div class="col form-group">
                             <div class="form-group">
                                  <label for="" class="col-form-label-lg">
                                     Sous-Composante
                              </label>
                             </div>
                        <div class="form-group">
                          <select name="souscomposante_id" id="souscomposante_id" class="form-control"></select>
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
                                     Resultat d'une Composante
                              </label>
                             </div>
                        <div class="form-group">
                          <input name="name_resultatcomposantes" id="name_resultatcomposantes" class="form-control" value="{{old('name_resultatcomposantes')}}">
                        </div>
 
                         <div class="status-error">
                                 @if($errors->get('name_resultatcomposantes'))
                                 @foreach($errors->get('name_actionintervention') as $message)
                                             <li class="alert alert-danger">{{ $message }}</li>
                                         @endforeach
                             @endif
                         </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="" class="col-form-label-lg">
                                   Cible 2025
                                </label>
                            <input type="text" name="cible_2025" id="cible_2025" class="form-control" value="{{old('cible_2025')}}">
                          </div>
   
                           <div class="status-error">
                                   @if($errors->get('cible_2025'))
                                   @foreach($errors->get('cible_2025') as $message)
                                               <li class="alert alert-danger">{{ $message }}</li>
                                           @endforeach
                               @endif
                           </div>

                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="" class="col-form-label-lg">
                                   Cible 2030
                                </label>
                            <input type="text" name="cible_2030" id="cible_2030" class="form-control" value="{{old('cible_2030')}}">
                          </div>
   
                           <div class="status-error">
                                   @if($errors->get('cible_2030'))
                                   @foreach($errors->get('cible_2030') as $message)
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
