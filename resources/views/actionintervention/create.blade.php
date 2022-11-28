@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Ajouter une Action/Intervention</h4>
        </div>
         <form action="{{ url('actionintervention') }}" method="post">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%; padding-bottom:2%">
               <div class="row">
                   <div class="col">
                            <label for="" class="col-form-label-lg">
                            Axe
                            </label>
                         <select name="axe_id" id="axe_id" class="form-control">
                             <option value="">Choisissez un Axe</option>
                             @foreach ($axe as $axe)
                                <option value="{{ $axe->id }}">{{ $axe->name_axe }}</option>
                             @endforeach

                         </select>

                        <div class="status-error">
                                @if($errors->get('axe_id'))
                                @foreach($errors->get('axe_id') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                            @endif
                        </div>
                   </div>
                    <div class="col">
                        <label for="" class="col-form-label-lg">
                        Sous-Programme
                        </label>
                        <select name="composante_id" id="composante_id" class="form-control">

                        </select>

                        <div class="status-error">
                                @if($errors->get('composante_id'))
                                @foreach($errors->get('composante_id') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                            @endif
                        </div>
                    </div>
               </div>
                <div class="row">
                        <div class="col">
                                <label for="" class="col-form-label-lg">
                                Sous-Composante
                                </label>
                                <select name="souscomposante_id" id="souscomposante_id" class="form-control"></select>

                            <div class="status-error">
                                    @if($errors->get('souscomposante_id'))
                                    @foreach($errors->get('souscomposante_id') as $message)
                                                <li class="alert alert-danger">{{ $message }}</li>
                                            @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col">
                                <label for="" class="col-form-label-lg">
                                Action/Intervention
                            </label>
                            <input name="name_actionintervention" id="name_actionintervention" class="form-control" value="{{old('name_actionintervention')}}">

                            <div class="status-error">
                                    @if($errors->get('name_actionintervention'))
                                    @foreach($errors->get('name_actionintervention') as $message)
                                                <li class="alert alert-danger">{{ $message }}</li>
                                            @endforeach
                                @endif
                            </div>
                        </div>
                
                    <div class="col">
                                <label for="" class="col-form-label-lg">
                                Code Action/Intervention
                            </label>
                            <input name="code_actionintervention" id="code_actionintervention" class="form-control" value="{{old('code_actionintervention')}}">

                            <div class="status-error">
                                    @if($errors->get('code_actionintervention'))
                                    @foreach($errors->get('code_actionintervention') as $message)
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
