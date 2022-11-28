@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Liste des Resultats des Composantes</h4>
        </div>
        <div class="row">
            <div class="col">
                @include('layouts.flash')
            </div>
        </div>
         <form action="{{ url('resultatcomposante') }}" method="get">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%; padding-top:1% ">
                <div class="text-right">
                    <a href="{{ url('resultatcomposante/create') }}" class="btn btn-success"><span>Ajouter une Action/Intervention</span></a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th><label for="" class="col-form-label-lg">Axe</label></th>
                            <th><label for="" class="col-form-label-lg">Composante</label></th>
                            <th><label for="" class="col-form-label-lg">Sous-Composante</label></th>
                            <th><label for="" class="col-form-label-lg">Resultat d'une Composante</label></th>
                            <th><label for="" class="col-form-label-lg">Cible 2025</label></th>
                            <th><label for="" class="col-form-label-lg">Cible 2030</label></th>
                            <th><label for="" class="col-form-label-lg" style="margin-left:6%">Action</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($resultatcomposante->count()===0)
                            <tr>
                                <td colspan="6"><span class="display-4 alert alert-danger">La Liste est Vide</span></td>
                            </tr>
                        @else
                            @foreach ($resultatcomposante as $item)
                                <tr>
                                    <td>
                                        <span>{{ $item->axe->name_axe }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->composante->name_composante }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->souscomposante->name_souscomposante }}</span>
                                    </td>
                                     <td>
                                        <span>{{ $item->name_resultatcomposantes }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->cible_2025 }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->cible_2030 }}</span>
                                    </td>
                                   
                                    <td>
                                        <div class="align-content-between">
                                            
                                            <a href="{{ url('resultatcomposante/'.$item->id.'/edit') }}" class="btn btn-warning">Modifier</a>
                                            <a href="{{ url('resultatcomposante/'.$item->id.'/destroy') }}" class="btn btn-danger" onclick="return confirm('voulez-vous vraiment supprimer cette Direction?')">Supprimer</a>
                                        </div>
                                    </td>
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
