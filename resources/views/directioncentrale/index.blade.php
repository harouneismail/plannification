

@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Liste des Directions Centrales</h4>
        </div>
        <div class="row" style="margin-top: 2%">
            <div class="col">
                @include('layouts.flash')
            </div>
        </div>
         <form action="{{ url('directioncentrale') }}" method="post">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%; padding-top:1% ">
                <div class="text-right">
                    <a href="{{ url('directioncentrale/create') }}" class="btn btn-success"><span>Nouvelle Direction Centrale</span></a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th><label for="" class="col-form-label-lg">Niveau de Planification</label></th>
                            <th><label for="" class="col-form-label-lg">Direction Centrale</label></th>
                            <th colspan="2"><label for="" class="col-form-label-lg">Action</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($directioncentrale->count()===0)
                            <tr>
                                <td colspan="3"><span class="display-4 alert alert-danger" style="padding: 3%">La Liste est Vide</span></td>
                            </tr>
                        @else
                            @foreach ($directioncentrale as $item)
                                <tr>
                                    <td>
                                        <span>{{ $item->niveauplanification->name_niveauplanification }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->name_directioncentrales }}</span>
                                    </td>
                                    <td><a href="{{ url('directioncentrale/'.$item->id.'/edit') }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a></td>
                                    <td> <a href="{{ url('directioncentrale/'.$item->id.'/destroy') }}" class="btn btn-danger" onclick="return confirm('voulez-vous vraiment supprimer cette Direction Centrale?')"><i class="bi bi-trash"></i></a></td>
                                    
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
