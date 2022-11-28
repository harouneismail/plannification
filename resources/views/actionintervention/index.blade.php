

@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Liste des Stratégies Opérationnelles</h4>
        </div>
        <br>
        <div class="row">
            <div class="col">
                @include('layouts.flash')
            </div>
        </div>
         <form action="{{ url('actionintervention') }}" method="get">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%; padding-top:1% ">
                <div class="text-right">
                    <a href="{{ url('actionintervention/create') }}" class="btn btn-success"><span>Ajouter une Stratégie</span></a><br>
                    <span><label for="" class="col-form-label-lg"><b>Nombre de Stratégie: </b></label>{{$actionintervention->count()}}</span>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th><label for="" class="col-form-label-lg">Axe</label></th>
                            <th><label for="" class="col-form-label-lg">Composante</label></th>
                            <th><label for="" class="col-form-label-lg">Sous-Composante</label></th>
                            <th><label for="" class="col-form-label-lg">Action/Intervention</label></th>
                            <th><label for="" class="col-form-label-lg">Code Action/Intervention</label></th>
                            <th colspan="2"><label for="" class="col-form-label-lg">Action</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($actionintervention->count()===0)
                            <tr>
                                <td colspan="6"><span class="display-4 alert alert-danger" style="padding: 1%">La Liste est Vide</span></td>
                            </tr>
                        @else
                            @foreach ($actionintervention as $item)
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
                                        <span>{{ $item->name_actionintervention }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->code_actionintervention }}</span>
                                    </td>
                                    <td><a href="{{ url('actionintervention/'.$item->id.'/edit') }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a></td>
                                    <td><a href="{{ url('actionintervention/'.$item->id.'/destroy') }}" class="btn btn-danger" onclick="return confirm('voulez-vous vraiment supprimer cette Stratégie?')"><i class="bi bi-trash"></i></a></td>
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
