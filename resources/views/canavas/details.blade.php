@extends('layouts.app')
@section('content')
        
            
            <form action="{{ url('canavas/'.$canavas->id) }}" method="post">
                <div class="container">
                        @csrf
                
                            
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
                                        <span><strong style="color: red">{{ $canavas->axe->code_axe }}</strong></span>:<span style="color:#00008b"><strong>{{ $canavas->axe->name_axe }}</strong></span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row shadow bg-white" style="font-family: 'Anonymous Pro', sans; border-radius:20px;">
                                        <div class="col">
                                            <span><strong style="color:red">{{ $canavas->composante->code_composante }}</strong></span>:<span style="color:#00008b"><strong>{{ $canavas->composante->name_composante }}</strong></span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row shadow bg-white" style="font-family: 'Anonymous Pro', sans; border-radius:20px;">
                                        <div class="col">
                                                <table>
                                                    <span><strong style="color:red">{{ $canavas->souscomposante->code_souscomposante }}</strong></span>:<span style="color:#00008b"><strong>{{ $canavas->souscomposante->name_souscomposante }}</strong></span>

                                                </table>
                                        </div>
                                    </div>
                                    <br>                  
                                    <div class="row">
                                        <div class="col bg-white shadow" id="hasgoingactionintervention" style=" border:2px solid white; border-radius:20px; font-family: 'Anonymous Pro', sans; padding-top:10px; font-size:1.1rem" onchange="getResultatComposaante();">
                                            <span><strong style="color:red">{{ $canavas->actionintervention->code_actionintervention }}</strong></span>:<span style="color:#00008b"><strong>{{ $canavas->actionintervention->name_actionintervention }}</strong></span>
                                        
                                        </div>
                                    </div>
                                    <br>
                                    <div   class="row bg-white shadow" id="hasgoinginterventionlib" style="border:2px solid white; border-radius:20px; font-family: 'Anonymous Pro', sans; padding-top:10px; margin-top:10px; font-size:1.1rem" onchange="getResultatComposaante();">
                                        <div class="col">
                                            <span><strong style="color:red">{{ $canavas->interventioncle->code_interventions }}</strong></span>:<span style="color:#00008b"><strong>{{ $canavas->interventioncle->name_interventions }}</strong></span>
                                        
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row bg-white shadow" style=" border-radius: 20px; padding-bottom:6px; font-family: 'Anonymous Pro', sans; padding-top:10px;">
                                        
                                            <div class="col">
                                                <span><strong style="color:red">Type d'Activité</strong>:</span><span style="color:#00008b"><strong>{{$canavas->typeactivite->name_typeactivites}}</strong></span>

                                            </div>
                
                                    </div>
                                
                                    <br>
                                    <div class="row bg-white shadow" style=" border-radius: 20px; padding-bottom:6px; font-family: 'Anonymous Pro', sans; padding-top:10px;">
                                        <div class="col">
                                            <span style="margin-top: 1px; color:red">
                                                    <strong>Activité</strong> </span>
                                            <textarea name="activite" id="activite" cols="20" rows="10" class="form-control" readonly>{{ $canavas->activite }}</textarea>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <div class="row bg-white shadow" style=" border-radius: 20px; padding-bottom:10px">
                                        <div class="col">
                                            <span><strong style="color:red">Budget: </strong></span><input type="number" class="form-control" value="{{$canavas->montant_cout}}" readonly>
                                            
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row bg-white shadow" style=" border-radius: 20px; padding-bottom:10px">   
                                        <div class="col">
                                            <span style="margin-top: 1px;">
                                                    <strong style="color:red">Source de Finacement: </strong> </span>
                                                <span style="color:#00008b"><strong> {{$canavas->sourcefinancement->name_sourcefinance}}</strong></span>
                                                
                                        
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row bg-white shadow" style=" border-radius: 20px; padding-bottom:10px; font-family: 'Anonymous Pro', sans; padding-top:10px;">
                                        <div class="col">
                                            <span style="margin-top: 1px; color:red">{{ __('Chronogramme') }}</span> 
                                            <br>
                                            @if($canavas->periode1===null)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="periode1" 
                                                    id="inlineCheckbox1" value="{{$canavas->periode1}}" unchecked readonly aria-checked="false" >
                                                <label class="form-check-label" for="inlineCheckbox1" style="color:#00008b">Trimestre 1</label></strong>
                                            </div>
                                            @else
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="periode1" 
                                                    id="inlineCheckbox1" value="{{$canavas->periode1}}" checked readonly aria-checked="false" aria-checked="false">
                                                <label class="form-check-label" for="inlineCheckbox1" style="color:#00008b">Trimestre 1</label></strong>
                                            </div>
                                            @endif
                                            
                                            @if($canavas->periode2===null)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="periode1" 
                                                    id="inlineCheckbox1" value="{{$canavas->periode1}}" unchecked readonly aria-checked="false" >
                                                <label class="form-check-label" for="inlineCheckbox1" style="color:#00008b">Trimestre 2</label></strong>
                                            </div>
                                            @else
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="periode1" 
                                                    id="inlineCheckbox1" value="{{$canavas->periode2}}" checked readonly aria-checked="false" >
                                                <label class="form-check-label" for="inlineCheckbox1" style="color:#00008b">Trimestre 2</label></strong>
                                            </div>
                                            @endif
                                            @if($canavas->periode3===null)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="periode1" 
                                                    id="inlineCheckbox1" value="{{$canavas->periode3}}" unchecked readonly aria-checked="false" >
                                                <label class="form-check-label" for="inlineCheckbox1" style="color:#00008b">Trimestre 3</label></strong>
                                            </div>
                                            @else
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="periode1" 
                                                    id="inlineCheckbox1" value="{{$canavas->periode3}}" checked readonly aria-checked="false" >
                                                <label class="form-check-label" for="inlineCheckbox1" style="color:#00008b">Trimestre 3</label></strong>
                                            </div>
                                            @endif
                                            @if($canavas->periode4===null)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="periode1" 
                                                    id="inlineCheckbox1" value="{{$canavas->periode4}}" unchecked readonly aria-checked="false" >
                                                <label class="form-check-label" for="inlineCheckbox1" style="color:#00008b">Trimestre 4</label></strong>
                                            </div>
                                            @else
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="periode1" 
                                                    id="inlineCheckbox1" value="{{$canavas->periode4}}" checked readonly aria-checked="false" >
                                                <label class="form-check-label" for="inlineCheckbox1" style="color:#00008b">Trimestre 4</label></strong>
                                            </div>
                                            @endif
                                        
                                        </div>
                                        
                                    </div>
                                    
                            
                
                </div>
    </form>
@endsection
