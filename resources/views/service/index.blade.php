

@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Liste des Services</h4>
        </div>
        <br>
        <div class="row">
            <div class="col">
                @include('layouts.flash')
            </div>
        </div>
        <br>
         <form action="{{ url('service') }}" method="get">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%; padding-top:1% ">
                <div class="text-right">
                    <a href="{{ url('service/create') }}" class="btn btn-success"><span>Ajouter un Service</span></a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th><label for="" class="col-form-label-lg">Niveau de Planification</label></th>
                            <th><label for="" class="col-form-label-lg">Direction Centrale</label></th>
                            <th><label for="" class="col-form-label-lg">Direction</label></th>
                            <th><label for="" class="col-form-label-lg">Service</label></th>
                            <th colspan="2"><label for="" class="col-form-label-lg">Action</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($service->count()===0)
                            <tr>
                                <td colspan="5"><span class="display-4 alert alert-danger" style="padding: 1%">La Liste est Vide</span></td>
                            </tr>
                        @else
                            @foreach ($service as $item)
                                <tr>
                                    <td>
                                        <span>{{ $item->niveauplanification->name_niveauplanification }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->directioncentrale->name_directioncentrales }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->sousdirection->name_sousdirection }}</span>
                                    </td>
                                     <td>
                                        <span>{{ $item->name_service }}</span>
                                    </td>
                                    <td><a href="{{ url('service/'.$item->id.'/edit') }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a></td>
                                    <td><a href="{{ url('service/'.$item->id.'/destroy') }}" class="btn btn-danger" onclick="return confirm('voulez-vous vraiment supprimer ce Service?')"><i class="bi bi-trash"></i></a></td>
                                    
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
