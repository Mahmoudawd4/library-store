@extends ('layout')

@section("title")

Edit Category - {{$cate->id}}

@endsection


@section('content')


@include ('inc.errors')


    <form class="form-group w-75 py-5 m-auto " method="POST" action="{{ route('cate.update', $cate->id ) }}">

        @csrf

      <input type="text" name="name"  class="form-control" placeholder="name" value="{{ old('name') ?? $cate ->name}}">
      
      <button type="submit" class="btn btn-primary mt-5">submit</button>
    </form>




@endsection
