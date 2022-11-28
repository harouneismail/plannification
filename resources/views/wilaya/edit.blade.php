@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Modifier une Wilaya</h4>
        </div>
         <form action="{{ url('wilaya/'.$wilaya->id) }}" method="post">
              @csrf
                <input type="hidden" name="_method" value="PUT">
            <div class="container bg-white shadow-sm" style="margin-top:2%">
               <div class="row">
                   <div class="col form-group">
                       <label for="" class="col-form-label-lg">
                           Wilaya
                       </label>
                       <input type="text" name="nomwilaya" id="" class="form-control" placeholder="Tapez ici une Wilaya..." value="{{ $wilaya->nomwilaya }}">

                         @if($errors->get('nomwilaya'))
                                @foreach($errors->get('nomwilaya') as $message)
                                    <li class="alert alert-danger">{{ $message }}</li>
                                @endforeach
                        @endif
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
