@extends('layouts.app')
@section('content')
        
            
            <form action="{{ url('canavas') }}" method="post">
        <div class="container">
                @csrf
                <div class="row" style="display: none">
                           
                    <div class="col">
                        <select name="niveauplanification_id" id="niveauplanification" class="form-control" style="font-size: 0.8rem">
                            <option value="{{$users->niveauplanification->id}}">{{$users->niveauplanification->name_niveauplanification}}</option>
                        </select>
                        <select name="directioncentrale_id" id="directioncentrale_id" class="form-control" style="font-size: 0.8rem">
                            <option value="{{$users->directioncentrale->id}}">{{$users->directioncentrale->name_directioncentrales}}</option>
                        </select>
                        <select name="sousdirection_id" id="sousdirection_id" class="form-control" style="font-size: 0.8rem">
                            <option value="{{$users->sousdirection->id}}">{{$users->sousdirection->name_sousdirection}}</option>
                        </select>
                        <select name="service_id" id="service_id" class="form-control" style="font-size: 0.8rem">
                            <option value="{{$users->service->id}}">{{$users->service->name_service}}</option>
                        </select>
                        
                    </div>
                   
                </div>
                <example-component></example-component>
                <div class="row">
                    <div class="col-4 container" style="font-family: 'Anonymous Pro', sans-serif; margin-left:-8%">
                        <div class="row bg-white shadow-sm" style="border-radius:20px; padding-bottom:5%">
                            <div class="col">
                                    <span style="margin-left:6px;">
                                            <span style="font-size:1.2rem"><strong>Programme</strong></span>
                                    </span>
                                        <select name="axe_id" id="axe_id" class="form-select form-select-lg mb-3 @error('axe_id') is-invalid @enderror" aria-label=".form-select-lg example" onchange="getResultatComposaante();" style="font-size: 0.9rem; color:black; background-color:white">
                                        <option value="">Choisir un Programme</option>
                                        @foreach ($axe as $axe)
                                            <option value="{{ $axe->id }}"
                                                @if (old('axe_id') == "$axe->id") selected="selected" @endif>
                                                <strong>{{ $axe->code_axe }}</strong></option>
                                        @endforeach
    
                                    </select>
                                    @error('axe_id')
                                    <span class="invalid-feedback" role="alert" style="margin-top:-10px;">
                                        <strong><b>{{ $message }}</b></strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                        
                        <div class="row bg-white shadow-sm" style="margin-top: 4px; border-radius:20px; padding-bottom:5%">
                            <div class="col">
                                    <span style="margin-left:6px; font-size:1.2rem"><strong>
                                            Sous-Programme</strong>
                                    </span>
                                
                                    <select name="composante_id" id="composante_id" class="form-select form-select-lg mb-3 @error('composante_id') is-invalid @enderror" aria-label=".form-select-lg example" onchange="getResultatComposaante();" style="font-size: 0.9rem; color:black; background-color:white; margin-top:1px">
                                    </select>
                                    @error('composante_id')
                                    <span class="invalid-feedback" role="alert" style="margin-top:-10px;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="row bg-white shadow" style="margin-top:4px; border-radius:20px; padding-bottom:5%">
                            <div class="col">
                                        <span style="margin-left:6px; font-size:1.2rem"><strong>
                                            Composante</strong>
                                        </span>
                                 
                                        <select name="souscomposante_id" id="souscomposante_id" class="form-select form-select-lg mb-3 @error('souscomposante_id') is-invalid @enderror" aria-label=".form-select-lg example" onchange="getResultatComposaante();" style="font-size: 0.9rem; color:black; background-color:white; margin-top:1px">
    
                                        </select>
                                        @error('souscomposante_id')
                                        <span class="invalid-feedback" role="alert" style="margin-top:-10px;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="row bg-white shadow" style="margin-top: 4px; border-radius: 20px; padding-bottom:5%">
                            <div class="col">
                                    <span style="margin-left:6px; font-size:1.2rem"><strong>
                                        Stratégies Operationnelles</strong>
                                    </span>
                                    <select name="actionintervention_id" id="actionintervention_id" class="form-select form-select-lg mb-3 @error('axe_id') is-invalid @enderror" aria-label=".form-select-lg example" onchange="getResultatComposaante();" style="font-size: 0.9rem; color:black; background-color:white; margin-top:1px">
                                    </select>
                                    @error('actionintervention_id')
                                        <span class="invalid-feedback" role="alert" style="margin-top:-10px;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>
                        
                        
                         <div class="row bg-white shadow" style="margin-top: 4px; border-radius: 20px; padding-bottom:5%">
                            <div class="col">
                                    <span style="margin-top: 1px; margin-left:6px; font-size:1.2rem"><strong>
                                        Interventions Clés</strong>
                                    </span>
                                    <select name="interventioncle_id" id="interventioncle_id" class="form-select form-select-lg mb-3 @error('axe_id') is-invalid @enderror" aria-label=".form-select-lg example" onchange="getResultatComposaante();" style="font-size: 0.9rem; color:black; background-color:white; margin-top:1px">
    
                                    </select>
                                    @error('interventioncle_id')
                                        <span class="invalid-feedback" role="alert" style="margin-top:-10px;">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>
                        </div>
                        <div class="row bg-white shadow" style="margin-top: 4px; border-radius: 20px; padding-bottom:15px;">
                            
                            <div class="col">
                                <span style="margin-top: 1px; margin-top: 1px; margin-left:6px; font-size:1.2rem"><strong>
                                        Type d'Activité </strong></span>
                                <select name="typeactivite_id" id="typeactivite_id" class="form-select form-select-lg mb-3 @error('axe_id') is-invalid @enderror" aria-label=".form-select-lg example" onchange="getResultatComposaante();" style="font-size: 0.9rem; color:black; background-color:white; margin-top:1px">
                                    <option value="">Choisir un Type</option>
                                    @foreach ($typeactivite as $item)
                                        <option value="{{$item->id}}">{{$item->name_typeactivites}}</option>
                                    @endforeach
                                </select>
                                @error('typeactivite_id')
                                    <span class="invalid-feedback" role="alert" style="margin-top:-10px;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    
                            </div>
                        </div>
                        
                        <div class="row bg-white shadow" style="margin-top: 4px; border-radius: 20px; padding-bottom:25px">
                            <div class="col">
                                <span style="margin-top: 1px; margin-left:6px; font-size:1.2rem"><strong>
                                        Activité </strong></span>
                                <textarea name="activite" id="activite" cols="20" rows="10" class="form-control @error('activite') is-invalid @enderror" placeholder="Saisir ici votre activité ">{{ old('activite') }}</textarea>
                                @error('activite')
                                    <span class="invalid-feedback" role="alert" style="margin-top:-10px;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="row bg-white shadow" style="margin-top: 4px; border-radius: 20px; padding-bottom:15px">
                            <div class="col">
                                <span style="margin-top: 1px; margin-left:6px; font-size:1.2rem"><strong>
                                        Budget </strong></span>
                                <input type="number" name="montant_cout" id="montant_cout" class="form-control @error('montant_cout') is-invalid @enderror"
                                    value="{{ old('montant_cout') }}">
                                @error('montant_cout')
                                    <span class="invalid-feedback" role="alert" style="margin-top:-10px;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row bg-white shadow" style="margin-top: 4px; border-radius: 20px; padding-bottom:10px">   
                            <div class="col">
                                <span style="margin-top: 1px; margin-left:6px; font-size:1.2rem"><strong>
                                        Source de Finacement</strong> </span>
                                <select name="sourcefinancement_id" id="sourcefinancement_id" class="form-select form-select-lg mb-3 @error('sourcefinancement_id') is-invalid @enderror" aria-label=".form-select-lg example" onchange="getResultatComposaante();">
                                    <option value="">Choisir une Source</option>
                                    @foreach ($sourcedefina as $sourcedefinaitem)
                                    <option value="{{$sourcedefinaitem->id}}">{{$sourcedefinaitem->name_sourcefinance}}</option>
                                    @endforeach
                                </select>
                                @error('sourcefinancement_id')
                                <span class="invalid-feedback" role="alert" style="margin-top:-10px;">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>
                        </div>
                        
    
                        <div class="row bg-white shadow" style="margin-top: 4px; border-radius: 20px; padding-bottom:10px">
                            <div class="col">
                                <span style="margin-top: 1px; margin-left:6px; font-size:1.2rem"><strong>{{ __('Chronogramme') }}</strong></span> 
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="periode1" 
                                        id="inlineCheckbox1" value="T1" unchecked>
                                    <label class="form-check-label" for="inlineCheckbox1">Trimestre 1</label></strong>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="periode2" 
                                        id="inlineCheckbox2" value="T2" unchecked>
                                    <label class="form-check-label" for="inlineCheckbox2">Trimestre 2</label></strong>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="periode3" 
                                        id="inlineCheckbox1" value="T3" unchecked>
                                    <label class="form-check-label" for="inlineCheckbox1">Trimestre 3</label></strong>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="periode4" 
                                        id="inlineCheckbox2" value="T4" unchecked>
                                    <label class="form-check-label" for="inlineCheckbox2">Trimestre 4</label></strong>
                                </div>
                            </div>
                            
                        </div>
                        
                        
                        <div class="row" >
                            <button class="btn btn-primary" style="margin-top: 4px; border-radius: 20px; background-color:rgb(194, 231, 255); color:black; margin-left:6px; font-size:1.2rem" type="submit" value="Sauvegarder"><strong>Sauvegarder</strong></button>
                        </div>
                    </div>
                    
                    <div class="col container bg-white shadow" style="margin-left:1%; border-radius:30px; margin-right:-8%; font-family: 'Anonymous Pro', sans-serif;">
                        <div class="row" style="border-radius: 20px">
                            <div class="col text-center"><strong><label for="" class="col-form-label-lg" style="text-align: center; font-size:1.4rem">Vue d'ensemble de votre sélection
                            </label></strong><br>
                            <h6  id="h6" class="alert alert-success" style="color:red"><b>une activité doit être pertinente, mesurable, réaliste et réalisable dans le temps et l'espace et dont les ressources</b></h6>
                        </div>
                        </div>
                        <br>
                        <div class="row" style=" border-radius:20px; font-family: 'Anonymous Pro', sans-serif;">
                            <div class="col">
                                <table><tr id="axelibel" style="color:#00008b; font-size:1.1rem"></tr>
                                </table>
                            </div>
                        </div>
                        <br>
                        <div class="row" style="font-family: 'Anonymous Pro', sans; border-radius:20px;">
                           <div class="col">
                                <table>
                                  <tr id="composantelibelle" style="color:#00008b; font-size:1.1rem"></tr>
                                </table>
                            </div>
                        </div>
                        <br>
                        <div class="row" style="font-family: 'Anonymous Pro', sans; border-radius:20px;">
                           <div class="col">
                                <table>
                                  <tr id="souscomposantelibelle" style="color:#00008b; font-size:1.1rem"></tr>
                                </table>
                            </div>
                        </div>
                        <br>
                        <div class="row" style="font-family: 'Anonymous Pro', sans; border-radius:20px;">
                           <div class="col">
                                <table>
                                  <tr id="resultatattendu" style="color:#00008b; font-size:1.1rem"></tr>
                                </table>
                            </div>
                        </div>
                            <br>
                       
                                                    

                            <div class="row">
                                <div class="col" id="hasgoing" style="display:none; border:2px solid white; border-radius:20px; padding-top:10px; font-size:1.1rem">
                                    <table class="table table-bordered table-responsive" style="margin-top:10px; font-family: 'Anonymous Pro', sans;">
                                        <thead>
                                        <tr style="text-align: center; background-color:black; color:white; font-size:1.1rem">
                                            <th scope="col"><b><label class="label">Liste des Indicateurs de resultat liée à la composante sélectionnée</label></b></th>
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
                            <div class="col" id="hasgoingactionintervention" style="display:none; border:2px solid white; border-radius:20px; font-family: 'Anonymous Pro', sans; padding-top:10px; font-size:1.1rem">
                                <table><tr id="actioninterventionlibelle" style="color:#00008b; font-size:1.1rem"></tr></table>
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col" id="hasgoingstrategie" style="display:none; border:2px solid white; border-radius:20px; padding-top:10px;  font-size:1.1rem; margin-top:10px">
                                <table class="table table-bordered table-responsive" style="margin-top:10px; font-family: 'Anonymous Pro', sans;">
                                    <thead>
                                    <tr style="text-align: center; background-color:black; color:white; font-size:1.1rem">
                                        <th scope="col"><b><label class="label">Liste des Indicateurs de processus liée à la Stratégie sélectionnée</label></b></th>
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
                        <div class="row">
                            <div class="col" id="hasgoing3" style="display: none; border:2px solid white; border-radius:20px; font-family: 'Anonymous Pro', sans; padding-top:10px; margin-top:10px; font-size:1.1rem">
                                
                                <table class="table">
                                    <thead>
                                   
                                    <tr style="text-align: center; background-color:black; color:white; font-size:1.1rem">
                                        <th scope="col"><b>Liste des Interventions Clés liées à la Stratégie sélectionnée</b></th>
                                    </tr>
                                    </thead>
                                    <tbody style="color:#00008b; text-align:center" id="getResultatinterventioncle">
                                        

                                        
                                    </tbody>
                                </table>
                            </div>
                        
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <table><tr id="interventionclelibelle_id" class="row" style="display: none; font-family: 'Anonymous Pro', sans;  font-size:1rem; margin-left:5px; color:#00008b"></tr></table>
                            </div>
                            
                        </div>
                </div>
           
        </div>
    </form>
@endsection
