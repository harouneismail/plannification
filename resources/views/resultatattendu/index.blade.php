

@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Liste des Resultats Attendus</h4>
        </div>
        <div class="row">
            <div class="col">
                @include('layouts.flash')
            </div>
        </div>
         <form action="{{ url('resultatattendu') }}" method="post">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%; padding-top:1% ">
                <div class="text-right">
                    <a href="{{ url('resultatattendu/create') }}" class="btn btn-success"><span>Nouveau Resultat</span></a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th><label for="" class="col-form-label-lg">Programme</label></th>
                            <th><label for="" class="col-form-label-lg">Sous-Programme</label></th>
                            <th><label for="" class="col-form-label-lg">Composante</label></th>
                            <th><label for="" class="col-form-label-lg">Resultat Attendu</label></th>

                            <th><label for="" class="col-form-label-lg">Code Resultat Attendu</label></th>
                            <th colspan="2"><label for="" class="col-form-label-lg">Action</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($resultatattendu->count()===0)
                            <tr>
                                <td><span class="display-4 alert alert-danger">La Liste est Vide</span></td>
                            </tr>
                        @else
                            @foreach ($resultatattendu as $item)
                                <tr>
                                    <td>
                                        <span>{{ $item->axe->code_axe }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->composante->code_composante }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->souscomposante->code_souscomposante }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->name_resultatattendus }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->code_resultatattendus }}</span>
                                    </td>
                                    <td>
                                            
                                            <a href="{{ url('resultatattendu/'.$item->id.'/edit') }}" class="btn btn-warning">Modifier</a></td>
                                            <td><a href="{{ url('resultatattendu/'.$item->id.'/destroy') }}" class="btn btn-danger" onclick="return confirm('voulez-vous vraiment supprimer ce Resultat Attendu?')">Supprimer</a></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </form>
     </div>

</div>
@endsection
