@extends ('layout')

@section("title")

Register

@endsection


@section('content')

    @include ('inc.errors')

    <form class="form-group w-75 py-5 m-auto " method="POST" action="{{route('handel.register')}}" >

        @csrf

      <input type="text" name="name"  class="form-control mt-4" placeholder="name" value="{{old('name')}}" >
      <input type="text" name="email"  class="form-control mt-4" placeholder="email" value="{{old('email')}}" >
      <input type="text" name="password"  class="form-control mt-4" placeholder="password" value="{{old('password')}}" >

      <button type="submit" class="btn btn-primary mt-5">Register</button>
    </form>




@endsection

