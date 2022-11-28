@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{url('directioncentrale/'.$directioncentrale->id)}}"    method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('DELETE')}}
            </form>
        </div>
    </div>
</div>
@endsection

