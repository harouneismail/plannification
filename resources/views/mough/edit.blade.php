@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Modifier une Moughataa</h4>
        </div>
         <form action="{{ url('mough/'.$mough->id) }}" method="post">
              @csrf
                <input type="hidden" name="_method" value="PUT">
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
                             <option value="{{ $mough->wilaya->id }}">{{ $mough->wilaya->nomwilaya }}</option>
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
                         <input name="nommough" id="nommough" class="form-control" value="{{ $mough->nommough }}" placeholder="Tapez ici une Moughataa">
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
                   <button type="submit" class="col btn btn-warning" style="font-size: 1.5rem">Modifier</button>
            </div>
        </form>
     </div>

</div>
@endsection
