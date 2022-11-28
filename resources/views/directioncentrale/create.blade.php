@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Nouvelle Direction Centrale</h4>
        </div>
        <form action="{{ url('directioncentrale') }}" method="post">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%; padding-bottom:5%">
                <div class="row">
                    <div class="col form-group">
                        <div class="form-group">
                            <label for="" class="col-form-label-lg">
                                Niveau de Planification
                            </label>
                        </div>
                        <div class="form-group">
                            <select name="niveauplanification_id" id="niveauplanification_id" class="form-control">
                                @foreach ($niveauplanification as $niveauplanification)
                                <option value="{{ $niveauplanification->id }}">{{ $niveauplanification->name_niveauplanification }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="status-error">
                            @if($errors->get('name_niveauplanification'))
                            @foreach($errors->get('name_niveauplanification') as $message)
                            <li class="alert alert-danger">{{ $message }}</li>
                            @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label-lg">
                                Diretcion Centrale
                            </label>
                        </div>
                        <div class="form-group">
                            <input name="name_directioncentrales" id="nommoughprelev" class="form-control" value="{{ old('name_directioncentrales') }}">
                        </div>

                        <div class="status-error">
                            @if($errors->get('name_directioncentrales'))
                            @foreach($errors->get('name_directioncentrales') as $message)
                            <li class="alert alert-danger">{{ $message }}</li>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 2%">
                <button type="submit" class="col btn btn-success" style="font-size: 1.5rem">Sauvegarder</button>
            </div>
        </form>
    </div>

</div>
@endsection
