@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Modifier une Source de Finacement</h4>
        </div>
         <form action="{{ url('sourcedefina/'.$sourcedefina->id) }}" method="post">
              @csrf
                <input type="hidden" name="_method" value="PUT">
            <div class="container bg-white shadow-sm" style="margin-top:2%">
               <div class="row">
                   <div class="col form-group">
                       <label for="" class="col-form-label-lg">
                           Source de Finacement
                       </label>
                       <input type="text" name="name_sourcefinance" id="name_sourcefinance" class="form-control"  value="{{ $sourcedefina->name_sourcefinance }}">

                         @if($errors->get('name_sourcefinance'))
                                @foreach($errors->get('name_sourcefinance') as $message)
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
