@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Les Cas Actifs</h4>
        </div>
        <div class="row">
            <div class="col">
                @include('layouts.flash')
            </div>
        </div>
         <form action="{{ url('actif') }}" method="post">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%">
               <div class="row">
                   <div class="col form-group">
                       <div class="form-group">
                            <label for="" class="col-form-label-lg">
                            Wilaya
                        </label>
                       </div>
                       <div class="form-group">
                         <select name="wilaya_id" id="wilaya_id" class="form-control">
                            <option value="">Choisissez une Wilaya</option>
                             @foreach ($wilayas as $wilaya)
                                <option value="{{ $wilaya->id }}">{{ $wilaya->nomwilaya }}</option>
                             @endforeach

                         </select>
                       </div>

                        <div class="status-error">
                                @if($errors->get('wilaya_id'))
                                @foreach($errors->get('wilaya_id') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                            @endif
                        </div>
                        
        <div class="row">
        
         <div class="col">
          <label for="" class="col-form-label-lg">{{ __('Asymptomatique') }}</label>
          <input type="number" name="casasymptomatiquesave" id="asymptomatique" class="form-control" value="{{ old('casasymptomatiquesave') }}" placeholder="">

         </div>
         <div class="col">
             <label for="" class="col-form-label-lg">{{ __('Cas Simple') }}</label>
          <input type="number" name="cassimplesave" id="cassimple" class="form-control" value="{{ old('cassimplesave') }}" placeholder="">

         </div>
         <div class="col">
             <label for="" class="col-form-label-lg">{{ __('Cas Avec Complication') }}</label>
          <input type="number" name="casgravesave" id="casaveccomplication" class="form-control" value="{{ old('casgravesave') }}" placeholder="">

         </div>
         
            <div class="row" style="margin-top: 2%">
                   <button type="submit" class="col btn btn-success" style="font-size: 1.5rem">Sauvegarder</button>
            </div>
        </form>
     </div>

</div>
@endsection
