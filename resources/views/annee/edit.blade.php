@extends('layouts.app')
@section('content')
<div class="grid">
    <div class="container" style="margin-top:2%">
        <div class="row bg-white shadow-sm">
            <h4 class="col display-4 text-center">Modifier une Année</h4>
        </div>
         <form action="{{ url('annee/'.$annee->id) }}" method="post">
              @csrf
                <input type="hidden" name="_method" value="PUT">
            <div class="container bg-white shadow-sm" style="margin-top:2%">
               <div class="row">
                   <div class="col form-group">
                       <label for="" class="col-form-label-lg">
                           Annee
                       </label>
                       <input type="text" name="name_annees" id="name_annees" class="form-control"  value="{{ $axe->name_annees }}">

                         @if($errors->get('name_annees'))
                                @foreach($errors->get('name_annees') as $message)
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
