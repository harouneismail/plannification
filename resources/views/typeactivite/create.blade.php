@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Ajouter un Type d'Activité</h4>
        </div>
         <form action="{{ url('typeactivite') }}" method="post">
            @csrf
            <div class="container bg-white shadow-sm" style="margin-top:2%">
               <div class="row">
                   <div class="col form-group">
                       <div class="form-group">
                            <label for="" class="col-form-label-lg">
                            Type d'Activité
                        </label>
                       </div>
                       <div class="form-group">
                         <input type="text" name="name_typeactivites" id="name_typeactivites" class="form-control"  value="{{ old('name_typeactivites') }}">
                       </div>

                        <div class="status-error">
                                @if($errors->get('name_typeactivites'))
                                @foreach($errors->get('name_typeactivites') as $message)
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
