@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Modifier une Direction Centrale</h4>
        </div>
        <form action="{{ url('directioncentrale/'.$directioncentrale->id) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
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
                                <option value="{{ $directioncentrale->niveauplanification->id }}">{{ $directioncentrale->niveauplanification->name_niveauplanification }}</option>
                                @foreach ($niveauplanification as $niveauplanification)


                                <option value="{{ $niveauplanification->id }}">{{ $niveauplanification->name_directioncentrales }}</option>



                                @endforeach

                            </select>
                        </div>

                        <div class="status-error">
                            @if($errors->get('niveauplanification_id'))

                            @foreach($errors->get('niveauplanification_id') as $message)

                            <li class="alert alert-danger">{{ $message }}</li>
                            @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label-lg">
                                Direction Centrale
                            </label>
                        </div>
                        <div class="form-group">
                            <input name="name_directioncentrales" id="name_directioncentrales" class="form-control" value="{{$directioncentrale->name_directioncentrales }}" placeholder="Tapez ici une Moughataa">
                        </div>

                        <div class="status-error">
                            @if($errors->get('directioncentrale'))
                            @foreach($errors->get('directioncentrale') as $message)
                            <li class="alert alert-danger">{{ $message }}</li>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 2%">
                <button type="submit" class="col btn btn-warning" style="font-size: 1.5rem">Modifier</button>
            </div>
        </form>
    </div>

</div>
@endsection
