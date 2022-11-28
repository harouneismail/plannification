@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Sauvegarder une Moughataa</h4>
        </div>
         <form action="{{ url('mough') }}" method="post">
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
                             @foreach ($wilaya as $wilaya)
                                <option value="{{ $wilaya->id }}">{{ $wilaya->nomwilaya }}</option>
                             @endforeach

                         </select>
                       </div>

                        <div class="status-error">
                                @if($errors->get('nomwilaya'))
                                @foreach($errors->get('nomwilaya') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label-lg">
                            Moughataa
                        </label>
                       </div>
                       <div class="form-group">
                         <input name="nommough" id="nommough" class="form-control" value="{{ old('nommough') }}" placeholder="Tapez ici une Moughataa">
                       </div>

                        <div class="status-error">
                                @if($errors->get('nommough'))
                                @foreach($errors->get('nommough') as $message)
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
