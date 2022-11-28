@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Modififer une Direction</h4>
        </div>
         <form action="{{ url('sousdirection/'.$sousdirection->id) }}" method="post">
            @csrf
                <input type="hidden" name="_method" value="PUT">
            <div class="container bg-white shadow-sm" style="margin-top:2%">
               <div class="row">
                   <div class="col form-group">
                       <div class="form-group">
                            <label for="" class="col-form-label-lg">
                                Niveau de Planification
                            </label>
                       </div>
                       <div class="form-group">
                         <select name="niveauplanification_id" id="niveauplanification_id" class="form-control">
                              <option value="{{$sousdirection->niveauplanification->id}}">{{$sousdirection->niveauplanification->name_niveauplanification}}</option>
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
                        <div class="form-group">
                            <label for="" class="col-form-label-lg">
                            Direction Centrale
                        </label>
                       </div>
                        <div class="form-group">
                            <select name="directioncentrale_id" id="directioncentrale_id" class="form-control">
                                <option value="{{$sousdirection->directioncentrale->id}}">{{$sousdirection->directioncentrale->name_directioncentrales}}</option>
                            </select>
                          </div>
   
                           <div class="status-error">
                                   @if($errors->get('directioncentrale_id'))
                                   @foreach($errors->get('directioncentrale_id') as $message)
                                               <li class="alert alert-danger">{{ $message }}</li>
                                           @endforeach
                               @endif
                           </div>
                           <div class="col form-group">
                            <div class="form-group">
                                 <label for="" class="col-form-label-lg">
                                 Structure Sanitaire
                             </label>
                            </div>
                       <div class="form-group">
                         <input name="name_sousdirection" id="name_sousdirection" class="form-control" value="{{$sousdirection->name_sousdirection}}">
                       </div>

                        <div class="status-error">
                                @if($errors->get('name_sousdirection'))
                                @foreach($errors->get('name_sousdirection') as $message)
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
