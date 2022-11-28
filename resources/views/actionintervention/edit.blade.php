@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Modififer une Action/Intervention</h4>
        </div>
         <form action="{{ url('actionintervention/'.$actionintervention->id) }}" method="post">
            @csrf
                <input type="hidden" name="_method" value="PUT">
            <div class="container bg-white shadow-sm" style="margin-top:2%">
               <div class="row">
                   <div class="col form-group">
                       <div class="form-group">
                            <label for="" class="col-form-label-lg">
                                Axe
                            </label>
                       </div>
                       <div class="form-group">
                         <select name="axe_id" id="axe_id" class="form-control">
                              <option value="{{$actionintervention->axe->id}}">{{$actionintervention->axe->name_axe}}</option>
                             <option value="">Choisissez un Axe</option>
                             @foreach ($axe as $axe)
                                <option value="{{ $axe->id }}">{{ $axe->name_axe }}</option>
                             @endforeach

                         </select>
                       </div>

                        <div class="status-error">
                                @if($errors->get('axe_id'))
                                @foreach($errors->get('axe_id') as $message)
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
                            <select name="composante_id" id="composante_id" class="form-control">
                                <option value="{{$actionintervention->composante->id}}">{{$actionintervention->composante->name_composante}}</option>
                            </select>
                          </div>
   
                           <div class="status-error">
                                   @if($errors->get('composante_id'))
                                   @foreach($errors->get('composante_id') as $message)
                                               <li class="alert alert-danger">{{ $message }}</li>
                                           @endforeach
                               @endif
                           </div>
                           <div class="col form-group">
                            <div class="form-group">
                                 <label for="" class="col-form-label-lg">
                                 Sous-Composante
                             </label>
                            </div>
                         <select name="souscomposante_id" id="souscomposante_id" class="form-control">
                                <option value="{{$actionintervention->souscomposante->id}}">{{$actionintervention->souscomposante->name_souscomposante}}</option>
                            </select>
                          </div>
   
                           <div class="status-error">
                                   @if($errors->get('souscomposante_id'))
                                   @foreach($errors->get('souscomposante_id') as $message)
                                               <li class="alert alert-danger">{{ $message }}</li>
                                           @endforeach
                               @endif
                           </div>
                           <div class="col form-group">
                            <div class="form-group">
                                 <label for="" class="col-form-label-lg">
                                 Action/Intervention
                             </label>
                            </div>
                            <div class="form-group">
                            <input name="name_actionintervention" id="name_actionintervention" class="form-control" value="{{$actionintervention->name_actionintervention}}">
                            </div>
   
                           <div class="status-error">
                                   @if($errors->get('name_actionintervention'))
                                   @foreach($errors->get('name_actionintervention') as $message)
                                               <li class="alert alert-danger">{{ $message }}</li>
                                           @endforeach
                               @endif
                           </div>
                   </div>
                   <div class="col form-group">
                    <div class="form-group">
                         <label for="" class="col-form-label-lg">
                         Code Action/Intervention
                     </label>
                    </div>
                    <div class="form-group">
                    <input name="code_actionintervention" id="code_actionintervention" class="form-control" value="{{$actionintervention->code_actionintervention}}">
                    </div>

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
