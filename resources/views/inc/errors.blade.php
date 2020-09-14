@if($errors->any())
<div class="alert alert-danger w-75 m-auto">

@foreach($errors->all() as $error)

<p>{{$error}}</p>

@endforeach

</div>

@endif
