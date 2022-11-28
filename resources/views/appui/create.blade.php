@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Ajouter un Appui</h4>
        </div>
         <form action="{{ url('appui') }}" method="post">
            @csrf
            <div class="row container bg-white shadow-sm" style="margin-top:2%; padding-bottom:2%">
                <div class="col form-group">
                    <div class="form-group">
                            <label for="" class="col-form-label-lg">
                            Niveau de Planification
                            </label>
                    </div>
                    <div class="form-group">
                        <select name="niveauplanification_id" id="niveauplanification_id" class="form-control">
                            <option value="">Choisissez un Niveau de Planification</option>
                            @foreach ($niveauplanification as $niveauplanification)
                                <option value="{{ $niveauplanification->id }}">{{ $niveauplanification->name_niveauplanification }}</option>
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
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="" class="col-form-label-lg">
                        Direction Centrale
                         </label>
                   </div>
                    <div class="form-group">
                        <select name="directioncentrale_id" id="directioncentrale_id" class="form-control">

                        </select>
                    </div>

                       <div class="status-error">
                               @if($errors->get('directioncentrale_id'))
                               @foreach($errors->get('directioncentrale_id') as $message)
                                           <li class="alert alert-danger">{{ $message }}</li>
                                       @endforeach
                           @endif
                       </div>
                </div>

                   <div class="col form-group">
                        <div class="form-group">
                            <label for="" class="col-form-label-lg">
                                Appui
                            </label>
                        </div>
                        <div class="form-group">
                            <input name="name_appuis" id="name_appuis" class="form-control" value="{{ old('name_appuis') }}">
                        </div>

                        <div class="status-error">
                                @if($errors->get('name_appuis'))
                                @foreach($errors->get('name_appuis') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                            @endif
                        </div>
                   </div>
           
            </div>
            <div class="row" style="margin-top: 5%">
                <button type="submit" class="col btn btn-success" style="font-size: 1.5rem">Sauvegarder</button>
            </div>
                    
        </form>
     </div>

</div>
@endsection
