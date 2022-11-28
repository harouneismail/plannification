

@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Liste des Appuis</h4>
        </div>
        <br>
        <div class="row">
            <div class="col">
                @include('layouts.flash')
            </div>
        </div>
        <br>
         <form action="{{ url('appui') }}" method="get">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%; padding-top:1% ">
                <div class="text-right">
                    <a href="{{ url('appui/create') }}" class="btn btn-success"><span>Ajouter un Appui</span></a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th><label for="" class="col-form-label-lg">Niveau de Planification</label></th>
                            <th><label for="" class="col-form-label-lg">Direction Centrale</label></th>
                            <th><label for="" class="col-form-label-lg">Appui</label></th>
                            <th colspan="2"><label for="" class="col-form-label-lg">Action</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($appui->count()===0)
                            <tr>
                                <td colspan="4"><span class="display-4 alert alert-danger" style="padding:0.2%">La Liste est Vide</span></td>
                            </tr>
                        @else
                            @foreach ($appui as $item)
                                <tr>
                                    <td>
                                        <span>{{ $item->niveauplanification->name_niveauplanification }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->directioncentrale->name_directioncentrales }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->name_appuis }}</span>
                                    </td>
                                    <td>
                                        <div class="align-content-between">
                                            
                                            <a href="{{ url('appui/'.$item->id.'/edit') }}" class="btn btn-warning">Modifier</a>
                                            <a href="{{ url('appui/'.$item->id.'/destroy') }}" class="btn btn-danger" onclick="return confirm('voulez-vous vraiment supprimer cet Appui?')">Supprimer</a>
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
