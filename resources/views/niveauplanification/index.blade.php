

@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Liste des Niveaux de Planification</h4>
        </div>
        <br>
        <div class="row" style="margin-top: 5%">
            <div class="col">
                @include('layouts.flash')
            </div>
        </div>
         <form action="{{ url('niveauplanification') }}" method="post">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%; padding-top:1% ">
                <div class="text-right">
                    <a href="{{ url('niveauplanification/create') }}" class="btn btn-success"><span>Ajouter un Niveau de Planification</span></a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th><label for="" class="col-form-label-lg">Niveau de Planification</label></th>
                            <th><label for="" class="col-form-label-lg" style="margin-left:6%">Action</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($niveauplanification->count()===0)
                            <tr>
                                <td><span class="display-4 alert alert-danger">La Liste est Vide</span></td>
                            </tr>
                        @else
                            @foreach ($niveauplanification as $item)
                                <tr>
                                    <td>
                                        <span>{{ $item->name_niveauplanification }}</span>
                                    </td>
                                    <td>
                                        <div class="align-content-between">
                                            <a href="{{ url('niveauplanification/'.$item->id.'/edit') }}" class="btn btn-warning">Modifier</a>
                                            <a href="{{ url('niveauplanification/'.$item->id.'/destroy') }}" class="btn btn-danger" onclick="return confirm('voulez-vous vraiment supprimer ce Niveau de Planification?')">Supprimer</a>
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
