

@extends('layouts.app')
@section('content')
<div class="grid">
    <form action="{{ url('axe') }}" method="post">

     <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Liste des Programmes</h4>
        </div>
        <br>
        <div class="row">
            <div class="col">
                @include('layouts.flash')
            </div>
        </div>
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%; padding-top:1% ">
                <div class="text-right">
                    <a href="{{ url('axe/create') }}" class="btn btn-success"><span>Ajouter un Nouveau Programme</span></a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th><strong><label for="" class="col-form-label-lg">Programme</label></strong></th>
                            <th><strong><label for="" class="col-form-label-lg">Code Programme</label></strong></th>
                            <th><strong><label for="" class="col-form-label-lg" style="margin-left:6%">Action</label></strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($axe->count()===0)
                            <tr>
                                <td colspan="3"><span class="display-4 alert alert-danger" style="padding: 1%">La Liste est Vide</span></td>
                            </tr>
                        @else
                            @foreach ($axe as $item)
                                <tr>
                                    <td>
                                        <span>{{ $item->name_axe }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $item->code_axe }}</span>
                                    </td>
                                    <td>
                                        <div class="align-content-between">
                                            <a href="{{ url('axe/'.$item->id.'/edit') }}" class="btn btn-warning">Modifier</a>
                                            <a href="{{ url('axe/'.$item->id.'/destroy') }}" class="btn btn-danger" onclick="return confirm('voulez-vous vraiment supprimer cette Wilaya?')">Supprimer</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
       
     </div>
    </form>

</div>
@endsection
