@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@else @if(session('alert'))
<div class="alert alert-danger display-4">
    {{ session('alert') }}
</div>
@else @if(session('age'))
<div class="alert alert-danger display-4">
    {{ session('alert') }}
</div>
@endif
@endif
@endif