

@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Liste des Indicateurs de processus liées à la stratégie désignée</h4>
        </div>
        <div class="row">
            <div class="col">
                @include('layouts.flash')
            </div>
        </div>
         <form action="{{ url('resultatproces') }}" method="get">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%; padding-top:1% ">
                <div class="text-right">
                    <a href="{{ url('resultatproces/create') }}" class="btn btn-success"><span>Ajouter un Indicateur de processus liées à la stratégie désignée </span></a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th><label for="" class="col-form-label-lg">Axe</label></th>
                            <th><label for="" class="col-form-label-lg">Composante</label></th>
                            <th><label for="" class="col-form-label-lg">Sous-Composante</label></th>
                            <th><label for="" class="col-form-label-lg">Stratégie Opérationnelle</label></th>
                            <th><label for="" class="col-form-label-lg">Indicateur de processus liées à la stratégie désignée</label></th>
                            <th><label for="" class="col-form-label-lg">Cible 2022</label></th>
                            <th><label for="" class="col-form-label-lg">Cible 2023</label></th>

                            <th colspan="2"><label for="" class="col-form-label-lg" style="margin-left:6%">Action</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($resultatproces->count()===0)
                            <tr>
                                <td colspan="6"><span class="display-4 alert alert-danger">La Liste est Vide</span></td>
                            </tr>
                        @else
                            @foreach ($resultatproces as $item)
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
                                        <span>{{ $item->actionintervention->name_actionintervention }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->name_resultatproces }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->cible2022 }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->cible2023 }}</span>
                                    </td>
                                    <td><a href="{{ url('resultatproces/'.$item->id.'/edit') }}" class="btn btn-warning">Modifier</a></td>
                                    <td><a href="{{ url('resultatproces/'.$item->id.'/destroy') }}" class="btn btn-danger" onclick="return confirm('voulez-vous vraiment supprimer cette Intervention Clé?')">Supprimer</a>
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
