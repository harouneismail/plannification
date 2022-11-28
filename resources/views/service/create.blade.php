@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Nouveau Service</h4>
        </div>
         <form action="{{ url('service') }}" method="post">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%; padding-bottom:2%">
               <div class="row">
                   <div class="col">
                            <label for="" class="col-form-label-lg">
                            Niveau Centrale
                           </label>
                         <select name="niveauplanification_id" id="niveauplanification_id" class="form-control">
                             <option value="">Choisissez un Niveau de Planification</option>
                             @foreach ($niveauplanification as $niveauplanification)
                                <option value="{{ $niveauplanification->id }}">{{ $niveauplanification->name_niveauplanification }}</option>
                             @endforeach

                         </select>
                   

                        <div class="status-error">
                                @if($errors->get('niveauplanification_id'))
                                @foreach($errors->get('niveauplanification_id') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                            @endif
                        </div>
                   </div>
                    <div class="col">
                            <label for="" class="col-form-label-lg">
                            Direction Centrale
                            </label>
                            <select name="directioncentrale_id" id="directioncentrale_id" class="form-control">
   
                            </select>
                        
   
                           <div class="status-error">
                                   @if($errors->get('directioncentrale_id'))
                                   @foreach($errors->get('directioncentrale_id') as $message)
                                               <li class="alert alert-danger">{{ $message }}</li>
                                           @endforeach
                               @endif
                           </div>
                    </div>
               </div>
               <div class="row">
                    <div class="col">
                            <label for="" class="col-form-label-lg">
                                Direction
                            </label>
                        <select name="sousdirection_id" id="sousdirection_id" class="form-control"></select>

                        <div class="status-error">
                                @if($errors->get('sousdirection_id'))
                                @foreach($errors->get('sousdirection_id') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="col">
                                    <label for="" class="col-form-label-lg">
                                    Service
                                    </label>
                                <input name="name_service" id="name_service" class="form-control" value="{{old('name_service')}}">

                        <div class="status-error">
                                @if($errors->get('name_service'))
                                @foreach($errors->get('name_service') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                            @endif
                        </div>
                    </div>
               </div>
            </div>
            <br>
            <div class="row">
                   <button type="submit" class="col btn btn-success" style="font-size: 1rem">Sauvegarder</button>
            </div>
        </form>
     </div>

</div>
@endsection
