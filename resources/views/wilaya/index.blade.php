

@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Liste des Wilayas</h4>
        </div>
        <div class="row">
            <div class="col">
                @include('layouts.flash')
            </div>
        </div>
         <form action="{{ url('wilaya') }}" method="post">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%; padding-top:1% ">
                <div class="text-right">
                    <a href="{{ url('wilaya/create') }}" class="btn btn-success"><span>Nouvelle Wilaya</span></a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th><label for="" class="col-form-label-lg">Wilaya</label></th>
                            <th><label for="" class="col-form-label-lg" style="margin-left:6%">Action</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($wilaya->count()===0)
                            <tr>
                                <td><span class="display-4 alert alert-danger">La Liste est Vide</span></td>
                            </tr>
                        @else
                            @foreach ($wilaya as $item)
                                <tr>
                                    <td>
                                        <span>{{ $item->nomwilaya }}</span>
                                    </td>
                                    <td>
                                        <div class="align-content-between">
                                            <a href="{{ url('wilaya/'.$item->id.'/edit') }}" class="btn btn-warning">Modifier</a>
                                            <a href="{{ url('wilaya/'.$item->id.'/destroy') }}" class="btn btn-danger" onclick="return confirm('voulez-vous vraiment supprimer cette Wilaya?')">Supprimer</a>
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
