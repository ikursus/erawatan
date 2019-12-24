@if (session('alert-danger'))
<div class="alert alert-danger">
    {{ session('alert-danger') }}
</div>
@endif