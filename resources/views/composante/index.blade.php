

@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Liste des Sous-Programmes</h4>
        </div>
        <br>
        <div class="row">
            <div class="col">
                @include('layouts.flash')
            </div>
        </div>
         <form action="{{ url('composante') }}" method="get">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%; padding-top:1% ">
                <div class="text-right">
                    <a href="{{ url('composante/create') }}" class="btn btn-success"><span>Nouveau Sous-programme</span></a>
                    <span><label for="" class="col-form-label-lg"><b>Nombre de Sous-programmes: </b></label>{{$composante->count()}}</span>

                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th><label for="" class="col-form-label-lg">Programme</label></th>
                            <th><label for="" class="col-form-label-lg">Sous-Programme</label></th>
                            <th><label for="" class="col-form-label-lg">Code Sous-Programme</label></th>

                            <th colspan="2"><label for="" class="col-form-label-lg">Action</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($composante->count()===0)
                            <tr>
                                <td colspan="4"><span class="display-4 alert alert-danger" style="padding: 1%">La Liste est Vide</span></td>
                            </tr>
                        @else
                            @foreach ($composante as $item)
                                <tr>
                                    <td>
                                        <span>{{ $item->axe->code_axe }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->name_composante }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->code_composante }}</span>
                                    </td>
                                    <td> <a href="{{ url('composante/'.$item->id.'/edit') }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a></td>
                                    <td><a href="{{ url('composante/'.$item->id.'/destroy') }}" class="btn btn-danger" onclick="return confirm('voulez-vous vraiment supprimer cette Composante?')"><i class="bi bi-pencil"></i></a>
                                    
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
