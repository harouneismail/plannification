@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Ajouter un Programme</h4>
        </div>
         <form action="{{ url('axe') }}" method="post">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%; padding-bottom:2%">
               <div class="row">
                   <div class="col form-group">
                       <div class="form-group">
                            <label for="" class="col-form-label-lg">
                            Programme
                        </label>
                       </div>
                       <div class="form-group">
                         <input type="text" name="name_axe" id="name_axe" class="form-control"  value="{{ old('name_axe') }}">
                       </div>

                        <div class="status-error">
                                @if($errors->get('name_axe'))
                                @foreach($errors->get('name_axe') as $message)
                                            <li class="alert alert-danger">{{ $message }}</li>
                                        @endforeach
                            @endif
                        </div>
                   </div>
                   <div class="col form-group">
                    <div class="form-group">
                         <label for="" class="col-form-label-lg">
                         Code Programme
                     </label>
                    </div>
                    <div class="form-group">
                      <input type="text" name="code_axe" id="code_axe" class="form-control"  value="{{ old('code_axe') }}">
                    </div>

                     <div class="status-error">
                             @if($errors->get('code_axe'))
                             @foreach($errors->get('code_axe') as $message)
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
