

@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Liste des Cas Actifs</h4>
        </div>
        <div class="row">
            <div class="col">
                @include('layouts.flash')
            </div>
        </div>
         <form action="{{ url('actif') }}" method="get">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%; padding-top:1% ">
                
                <table class="table table-bordered border-primary">
                    <thead>
                        <tr>
                            <th scope="col"><label for="" class="col-form-label-lg">Wilaya</label></th>
                            
                            <th scope="col"><label for="" class="col-form-label-lg">Asymptomatique</label></th>
                            <th scope="col"><label for="" class="col-form-label-lg">Cas Simple</label></th>
                            <th scope="col"><label for="" class="col-form-label-lg">Cas Avec Complication</label></th>


                            <th scope="col"><label for="" class="col-form-label-lg" style="margin-left:6%">Action</label></th>
                        </tr>
                    </thead>
                    @if ($actif->count()===0)
                    <tbody>
                        
                            <tr>
                                <td><div class="display-4 alert alert-danger">La Liste est Vide</div></td>
                            </tr>
                    </tbody>
                     @else
                        <tbody>
                                @foreach ($actif as $item)
                                    <tr>
                                    
                                        <td>
                                            <span>{{ $item->wilaya->nomwilaya }}</span>
                                        </td>
                                    
                                            <td>
                                                <span>{{ $item->casasymptomatiquesave }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $item->cassimplesave }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $item->casgravesave }}</span>
                                            </td>
                                            <td>
                                                <div class="align-content-between">
                                                    <a href="{{ url('actif/'.$item->id.'/edit') }}" class="btn btn-warning">Modifier</a>
                                                    <a href="{{ url('actif/'.$item->id.'/destroy') }}" class="btn btn-danger" onclick="return confirm('voulez-vous vraiment supprimer cette Structure Sanitaire?')">Supprimer</a>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                     @endif
                </table>
            </div>
        </form>
     </div>

</div>
@endsection
