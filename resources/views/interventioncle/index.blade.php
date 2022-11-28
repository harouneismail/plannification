

@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Liste des Interventions Clés</h4>
        </div>
        <br>
        <div class="row">
            <div class="col">
                @include('layouts.flash')
            </div>
        </div>
         <form action="{{ url('interventioncle') }}" method="get">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%; padding-top:1% ">
                <div class="text-right">
                    <a href="{{ url('interventioncle/create') }}" class="btn btn-success"><span>Ajouter une Intervention Clé</span></a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th><label for="" class="col-form-label-lg">Axe</label></th>
                            <th><label for="" class="col-form-label-lg">Composante</label></th>
                            <th><label for="" class="col-form-label-lg">Sous-Composante</label></th>
                            <th><label for="" class="col-form-label-lg">Action/Intervention</label></th>
                            <th><label for="" class="col-form-label-lg">Intervention Clé</label></th>
                            <th><label for="" class="col-form-label-lg">Code Intervention Clé</label></th>


                            <th colspan="2"><label for="" class="col-form-label-lg" style="margin-left:6%">Action</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($interventioncle->count()===0)
                            <tr>
                                <td colspan="6"><span class="display-4 alert alert-danger">La Liste est Vide</span></td>
                            </tr>
                        @else
                            @foreach ($interventioncle as $item)
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
                                        <span>{{ $item->actionintervention->code_actionintervention }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->name_interventions }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->code_interventions }}</span>
                                    </td>
                                    <td><a href="{{ url('interventioncle/'.$item->id.'/edit') }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a></td>
                                    <td><a href="{{ url('interventioncle/'.$item->id.'/destroy') }}" class="btn btn-danger" onclick="return confirm('voulez-vous vraiment supprimer cette Intervention Clé?')"><i class="bi bi-trash"></i></a>
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
