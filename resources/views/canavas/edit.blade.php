@extends('layouts.app')
@section('content')
        
            
            <form action="{{ url('canavas/'.$canavas->id) }}" method="post">
        <div class="container">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="row" style="display: none">
                           
                    <div class="col">

                        <select name="sousdirection_id" id="sousdirection_id" class="form-control" style="font-size: 0.8rem">
                            <option value="{{$canavas->sousdirection->id}}">{{$canavas->sousdirection->name_sousdirection}}</option>
                        </select>
                        
                    </div>
                   
                </div>
                
                <div class="row">
                    <div class="col-3 container" style="font-family: 'Anonymous Pro', sans-serif; margin-left:-8%">
                        <div class="row bg-white shadow-sm" style="border-radius:20px">
                            <div class="col">
                                    <span style="margin-left:6px; margin-top:1px;">
                                            Programme
                                    </span>
                                        <select name="axe_id" id="axe_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onchange="getResultatComposaante();" style="font-size: 0.9rem; color:black; background-color:white">
                                            <option value="{{ $canavas->axe->id }}"
                                                >
                                                <strong>{{ $canavas->axe->code_axe }}</strong></option>
                                            <option value="">Choisir un Programme</option>
                                        @foreach ($axe as $axe)
                                            <option value="{{ $axe->id }}"
                                                @if (old('axe_id') == "$axe->id") selected="selected" @endif>
                                                <strong>{{ $axe->code_axe }}</strong></option>
                                        @endforeach
    
                                    </select>
                            
    
                                <div class="status-error">
                                    @if ($errors->get('axe_id'))
                                        @foreach ($errors->get('axe_id') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="row bg-white shadow-sm" style="margin-top: 4px; border-radius:20px">
                            <div class="col">
                                    <span style="margin-left:6px">
                                            Sous-Programme
                                    </span>
                                
                                    <select name="composante_id" id="composante_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onchange="getResultatComposaante();" style="font-size: 0.9rem; color:black; background-color:white; margin-top:1px">
                                    <option value="{{$canavas->composante->id}}">{{$canavas->composante->code_composante}}</option>
                                    </select>
                            
    
                                <div class="status-error">
                                    @if ($errors->get('composante_id'))
                                        @foreach ($errors->get('composante_id') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row bg-white shadow" style="margin-top:4px; border-radius:20px">
                            <div class="col">
                                        <span>
                                                Composante
                                        </span>
                                 
                                        <select name="souscomposante_id" id="souscomposante_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onchange="getResultatComposaante();" style="font-size: 0.9rem; color:black; background-color:white; margin-top:1px">
                                            <option value="{{$canavas->souscomposante->id}}">{{$canavas->souscomposante->code_souscomposante}}</option>
    
                                        </select>
                                    <div class="status-error">
                                        @if ($errors->get('souscomposante_id'))
                                            @foreach ($errors->get('souscomposante_id') as $message)
                                                <li class="alert alert-danger">{{ $message }}</li>
                                            @endforeach
                                        @endif
                                    </div>
                            </div>
                        </div>

                        <div class="row bg-white shadow" style="margin-top: 4px; border-radius: 20px">
                            <div class="col">
                                    <span>
                                        Stratégies Operationnelles
                                    </span>
                                    <select name="actionintervention_id" id="actionintervention_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onchange="getResultatComposaante();" style="font-size: 0.9rem; color:black; background-color:white; margin-top:1px">
    
                                    <option value="{{$canavas->actionintervention->id}}">{{$canavas->actionintervention->code_actionintervention}}</option>

                                    </select>
                                <div class="status-error">
                                    @if ($errors->get('actionintervention_id'))
                                        @foreach ($errors->get('actionintervention_id') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        
                         <div class="row bg-white shadow" style="margin-top: 4px; border-radius: 20px">
                            <div class="col">
                                    <span style="margin-top: 1px;">
                                        Intervention Clée
                                    </span>
                                    <select name="interventioncle_id" id="interventioncle_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onchange="getResultatComposaante();" style="font-size: 0.9rem; color:black; background-color:white; margin-top:1px">
                                        <option value="{{$canavas->interventioncle->id}}">{{$canavas->interventioncle->code_interventions}}</option>

    
                                    </select>
                                
    
    
                                <div class="status-error">
                                    @if ($errors->get('interventioncle_id'))
                                        @foreach ($errors->get('interventioncle_id') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row bg-white shadow" style="margin-top: 4px; border-radius: 20px; padding-bottom:6px">
                            
                            <div class="col">
                                <span style="margin-top: 1px">
                                        Type d'Activité </span>
                                <select name="typeactivite_id" id="typeactivite_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onchange="getResultatComposaante();" style="font-size: 0.9rem; color:black; background-color:white; margin-top:1px">
                                    <option value="{{$canavas->typeactivite->id}}">{{$canavas->typeactivite->name_typeactivites}}</option>
                                    <option value="">Choisir un Type d'Activité</option>
                                    @foreach ($typeactivite as $item)
                                        <option value="{{$item->id}}">{{$item->name_typeactivites}}</option>
                                    @endforeach
                                </select>
    
                            </div>
                        </div>
                        
                        <div class="row bg-white shadow" style="margin-top: 4px; border-radius: 20px; padding-bottom:6px">
                            <div class="col">
                                <span style="margin-top: 1px">
                                        Activité </span>
                                <textarea name="activite" id="activite" cols="20" rows="10" class="form-control">{{ $canavas->activite }}</textarea>
                            </div>
                        </div>
                       
                        <div class="row bg-white shadow" style="margin-top: 4px; border-radius: 20px; padding-bottom:10px">
                            <div class="col">
                                <span>
                                        Budget </span>
                                <input type="number" name="montant_cout" id="montant_cout" class="form-control"
                                    value="{{ $canavas->montant_cout }}">
                                <div class="status-error">
                                    @if ($errors->get('montant_cout'))
                                        @foreach ($errors->get('montant_cout') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row bg-white shadow" style="margin-top: 4px; border-radius: 20px; padding-bottom:10px">   
                            <div class="col">
                                <span style="margin-top: 1px;">
                                        Source de Finacement </span>
                                <select name="sourcefinancement_id" id="sourcefinancement_id" class="form-control">
                                    <option value="{{$canavas->sourcefinancement->id}}">{{$canavas->sourcefinancement->name_sourcefinance}}</option>
                                    <option value="">Choisir un Finacement</option>
                                    @foreach ($sourcedefina as $sourcedefinaitem)
                                    <option value="{{$sourcedefinaitem->id}}">{{$sourcedefinaitem->name_sourcefinance}}</option>
                                    @endforeach
                                </select>
                                <div class="status-error">
                                    @if ($errors->get('sourcefinancement_id'))
                                        @foreach ($errors->get('sourcefinancement_id') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        
    
                        <div class="row bg-white shadow" style="margin-top: 4px; border-radius: 20px; padding-bottom:10px">
                            <div class="col">
                                <span style="margin-top: 1px;">{{ __('Chronogramme') }}</span> 
                                <br>
                                @if($canavas->periode1===null)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="periode1" 
                                        id="inlineCheckbox1" value="{{$canavas->periode1}}" unchecked>
                                    <label class="form-check-label" for="inlineCheckbox1">Trimestre 1</label></strong>
                                </div>
                                @else
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="periode1" 
                                        id="inlineCheckbox1" value="{{$canavas->periode1}}" checked>
                                    <label class="form-check-label" for="inlineCheckbox1">Trimestre 1</label></strong>
                                </div>
                                @endif
                                 
                                @if($canavas->periode2===null)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="periode1" 
                                        id="inlineCheckbox1" value="{{$canavas->periode1}}" unchecked>
                                    <label class="form-check-label" for="inlineCheckbox1">Trimestre 2</label></strong>
                                </div>
                                @else
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="periode1" 
                                        id="inlineCheckbox1" value="{{$canavas->periode2}}" checked>
                                    <label class="form-check-label" for="inlineCheckbox1">Trimestre 2</label></strong>
                                </div>
                                @endif
                                @if($canavas->periode3===null)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="periode1" 
                                        id="inlineCheckbox1" value="{{$canavas->periode3}}" unchecked>
                                    <label class="form-check-label" for="inlineCheckbox1">Trimestre 3</label></strong>
                                </div>
                                @else
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="periode1" 
                                        id="inlineCheckbox1" value="{{$canavas->periode3}}" checked>
                                    <label class="form-check-label" for="inlineCheckbox1">Trimestre 3</label></strong>
                                </div>
                                @endif
                                @if($canavas->periode4===null)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="periode1" 
                                        id="inlineCheckbox1" value="{{$canavas->periode4}}" unchecked>
                                    <label class="form-check-label" for="inlineCheckbox1">Trimestre 4</label></strong>
                                </div>
                                @else
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="periode1" 
                                        id="inlineCheckbox1" value="{{$canavas->periode4}}" checked>
                                    <label class="form-check-label" for="inlineCheckbox1">Trimestre 4</label></strong>
                                </div>
                                @endif
                               
                            </div>
                            
                        </div>
                        
                        
                        <div class="row" >
                            <button class="btn btn-primary" style="margin-top: 4px; border-radius: 20px; background-color:rgb(194, 231, 255); color:black" type="submit" value="Sauvegarder"><strong>Sauvegarder</strong></button>
                        </div>
                    </div>
                    
                    <div class="col container" style="margin-left:1%; border-radius:30px; margin-right:-8%">
                        <div class="row bg-white shadow" style="border-radius: 20px">
                            <div class="col text-center"><strong><label for="" class="col-form-label-lg" style="text-align: center; font-size:1.4rem">Vue d'ensemble de votre sélection
                            </label></strong><br>
                            <h6  id="h6" class="alert alert-success" style="color:red"><b>une activité doit être pertinente, mesurable, réaliste et réalisable dans le temps et l'espace et dont les ressources</b></h6>
                        </div>
                        </div>
                        <br>
                        <div class="row shadow bg-white" style=" border-radius:20px; font-family: 'Anonymous Pro', sans-serif;">
                            <div class="col">
                                <table><tr id="axelibel" style="color:#00008b; font-size:1.1rem"></tr>
                                </table>
                            </div>
                        </div>
                        <br>
                        <div class="row shadow bg-white" style="font-family: 'Anonymous Pro', sans; border-radius:20px;">
                           <div class="col">
                                <table>
                                  <tr id="composantelibelle" style="color:#00008b; font-size:1.1rem"></tr>
                                </table>
                            </div>
                        </div>
                        <br>
                        <div class="row shadow bg-white" style="font-family: 'Anonymous Pro', sans; border-radius:20px;">
                           <div class="col">
                                <table>
                                  <tr id="souscomposantelibelle" style="color:#00008b; font-size:1.1rem"></tr>
                                </table>
                            </div>
                        </div>
                        <br>
                        <div class="row shadow bg-white" style="font-family: 'Anonymous Pro', sans; border-radius:20px;">
                           <div class="col">
                                <table>
                                  <tr id="resultatattendu" style="color:#00008b; font-size:1.1rem"></tr>
                                </table>
                            </div>
                        </div>
                            <br>
                       
                                                    

                            <div class="row">
                                <div class="col bg-white shadow" id="hasgoing" style="display:none; border:2px solid white; border-radius:20px; padding-top:10px; font-size:1.1rem" onchange="getResultatComposaante();">
                                    <table class="table table-bordered table-responsive" style="margin-top:10px; font-family: 'Anonymous Pro', sans;">
                                        <thead>
                                        <tr style="text-align: center; background-color:white; color:red; font-size:1.1rem">
                                            <th scope="col"><b><label class="label">Liste des Indicateurs de resultat liées à la composante sélectionnée</label></b></th>
                                            <th scope="col"><b><label class="label">Donnée de Base</label></b></th>
                                            <th scope="col"><b><label class="label">Cible 2030</label></b></th>
                                        </tr>
                                        </thead>
                                        <tbody id="resultatcomposante_id" style="font-size:1.1rem">
                                            
                                        </tbody>
                                        
                                    </table>

                                 
                                </div>  
                                   
                                                        
                        </div>
                        <br>
                       
                        <div class="row">
                            <div class="col bg-white shadow" id="hasgoingactionintervention" style="display:none; border:2px solid white; border-radius:20px; font-family: 'Anonymous Pro', sans; padding-top:10px; font-size:1.1rem" onchange="getResultatComposaante();">
                                <table><tr id="actioninterventionlibelle" style="color:#00008b; font-size:1.1rem"></tr></table>
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col bg-white shadow" id="hasgoingstrategie" style="display:none; border:2px solid white; border-radius:20px; padding-top:10px;  font-size:1.1rem; margin-top:10px" onchange="getResultatComposaante();">
                                <table class="table table-bordered table-responsive" style="margin-top:10px; font-family: 'Anonymous Pro', sans;">
                                    <thead>
                                    <tr style="text-align: center; background-color:white; color:red; font-size:1.1rem">
                                        <th scope="col"><b><label class="label">Liste des Indicateurs de processus liées à la Stratégie sélectionnée</label></b></th>
                                        <th scope="col"><b><label class="label">Donnée de Base</label></b></th>
                                        <th scope="col"><b><label class="label">Cible 2023</label></b></th>
                                    </tr>
                                    </thead>
                                    <tbody id="resultatproce_id" style="font-size: 1.1rem">
                                        
                                    </tbody>
                                    
                                </table>

                             
                            </div>  
                               
                                                    
                        </div>
                        <br>
                        <div class="row" onchange="getResultatComposaante();">
                            <div class="col bg-white shadow" id="hasgoing3" style="display: none; border:2px solid white; border-radius:20px; font-family: 'Anonymous Pro', sans; padding-top:10px; margin-top:10px; font-size:1.1rem" onchange="getResultatComposaante();">
                                
                                <table class="table">
                                    <thead>
                                   
                                    <tr style="text-align: center; color:red; font-size:1.1rem">
                                        <th scope="col"><b>Liste des Interventions Clé liées à la Stratégie sélectionnée</b></th>
                                    </tr>
                                    </thead>
                                    <tbody style="color:#00008b; text-align:center" id="getResultatinterventioncle">
                                        

                                        
                                    </tbody>
                                </table>
                            </div>
                        
                        </div>
                        <br>
                        <div   class="row bg-white shadow" id="hasgoinginterventionlib" style="display: none; border:2px solid white; border-radius:20px; font-family: 'Anonymous Pro', sans; padding-top:10px; margin-top:10px; font-size:1.1rem" onchange="getResultatComposaante();">
                            <div class="col">
                                <table><tr id="interventionclelibelle_id" style="color:#00008b; font-size:1.1rem"></tr></table>
                            
                        </div>
                </div>
           
        </div>
    </form>
@endsection
