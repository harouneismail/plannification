

@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Liste des Directions</h4>
        </div>
        <div class="row" style="margin-top: 2%">
            <div class="col">
                @include('layouts.flash')
            </div>
        </div>
         <form action="{{ url('sousdirection') }}" method="get">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%; padding-top:1% ">
                <div class="text-right">
                    <a href="{{ url('sousdirection/create') }}" class="btn btn-success"><span>Ajouter une Direction</span></a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th><label for="" class="col-form-label-lg">Niveau de Planification</label></th>
                            <th><label for="" class="col-form-label-lg">Direction Centrale</label></th>
                            <th><label for="" class="col-form-label-lg">Direction</label></th>
                            <th><label for="" class="col-form-label-lg" style="margin-left:6%">Action</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($sousdirection->count()===0)
                            <tr>
                                <td colspan="3"><span class="display-4 alert alert-danger" style="padding: 3%">La Liste est Vide</span></td>
                            </tr>
                        @else
                            @foreach ($sousdirection as $item)
                                <tr>
                                    <td>
                                        <span>{{ $item->niveauplanification->name_niveauplanification }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->directioncentrale->name_directioncentrales }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->name_sousdirection }}</span>
                                    </td>
                                    <td>
                                        <div class="align-content-between">
                                            
                                            <a href="{{ url('sousdirection/'.$item->id.'/edit') }}" class="btn btn-warning">Modifier</a>
                                            <a href="{{ url('sousdirection/'.$item->id.'/destroy') }}" class="btn btn-danger" onclick="return confirm('voulez-vous vraiment supprimer cette Direction?')">Supprimer</a>
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
