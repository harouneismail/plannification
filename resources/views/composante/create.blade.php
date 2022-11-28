@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Ajouter une Comoposante</h4>
        </div>
         <form action="{{ url('composante') }}" method="post">
            @csrf
            <div class="container bg-white shadow" style="margin-top:2%; padding-bottom:2%">
               <div class="row">
                   <div class="col form-group">
                       <div class="form-group">
                            <label for="" class="col-form-label-lg">
                            Programme
                        </label>
                       </div>
                       <div class="form-group">
                         <select name="axe_id" id="axe_id" class="form-control" onchange="getInterventioncle();">
                             @foreach ($axe as $axe)
                                <option value="{{ $axe->id }}">{{ $axe->name_axe }}</option>
                             @endforeach

                         </select>
                       </div>

                        <div class="status-error">
                                @if($errors->get('name_axe'))
                                @foreach($errors->get('name_axe') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label-lg">
                            Composante
                        </label>
                       </div>
                       <div class="form-group">
                         <input name="name_composante" id="name_composante" class="form-control" value="{{ old('name_composante') }}" placeholder="Sous-programme">
                       </div>

                        <div class="status-error">
                                @if($errors->get('name_composante'))
                                @foreach($errors->get('name_composante') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label-lg">
                            Code Composante
                        </label>
                       </div>
                       <div class="form-group">
                         <input name="code_composante" id="code_composante" class="form-control" value="{{ old('code_composante') }}" placeholder="Sous-programme">
                       </div>

                        <div class="status-error">
                                @if($errors->get('code_composante'))
                                @foreach($errors->get('code_composante') as $message)
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
