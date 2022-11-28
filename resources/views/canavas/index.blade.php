'@extends('layouts.app')
@section('content')
<div class="container shadow" style="background-color:white; max-width:90%">
    <form action="{{ url('canavas') }}" method="get">

        <div class="row">
            <h4 style="text-align: center; margin-top:5px">La Liste des Activités saisies</h4>
        </div>
        <br>
        <div class="row">
            <div class="col">
                @include('layouts.flash')
            </div>
        </div>
        <br>
        <div class="row">
            <div class="text-left">
                <a href="{{ url('canavas/create') }}" class="btn btn-success"><span>Nouvelle Saisie</span></a>

            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table" style="padding-right:10%">
                    <thead>
                        <tr style="color:#00008b">
                            <th rowspan="2"><span>Structure</span></th>
                            <th rowspan="2"><span>Activité</span></th>
                            <th rowspan="2"><span>Type d'Activité</span></th>
                            <th rowspan="2"><span>Budget</span></th>
                            <th rowspan="2"><span>Source de Finacement</span></th>
                            <th rowspan="2"><span>Période</span></th>
                            <th colspan="3"><span>Action</span></th>
                        </tr>
                
                    <thead>
                            @if ($canavas->count()===0)
                            <tbody>
                                
                                    <tr>
                                        <td colspan="6" rowspan="6"><span class="alert alert-danger">La Liste est Vide</span></td>
                                    </tr>
                            </tbody>
                            @else
                            <tbody>
                            
                            
                                @foreach ( $canavas as $key)
                                <tr style="font-size: 0.8rem;">                                
                                    <td><span>{{$key->service->name_service}}</span></td>                               
                                    <td><span>{{$key->activite}}</span></td>
                                    
                                    <td><span>{{$key->typeactivite->name_typeactivites}}</span></td>
                                    <td><span>{{$key->montant_cout}}</span></td>
                                    <td><span>{{$key->sourcefinancement->name_sourcefinance}}</span></td>
                                    <td><span>{{$key->periode1." ".$key->periode2." ".$key->periode3." ".$key->periode4}}</span></td>
                                    <td><a href="{{url('canavas/'.$key->id.'/details')}}" class="btn btn-primary" style="font-size: 0.6rem">Détails</a></td>
                                    <td><a href="{{url('canavas/'.$key->id.'/edit')}}" class="btn btn-warning" style="margin-left:-40px; font-size: 0.6rem">Modifier</a></td>
                                    <td><a href="{{url('canavas/'.$key->id.'/destroy')}}" class="btn btn-danger" style="margin-left:-40px; font-size: 0.6rem">Supprimer</a></td>




                                </tr>
                                @endforeach
                                @endif
                            </body>


                </table>
            </div>
            
        </div>
    </form>

</div>
@endsection
