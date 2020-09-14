@extends ('layout')

@section("title")

Login

@endsection


@section('content')

    @include ('inc.errors')

    <form class="form-group w-75 py-5 m-auto " method="POST" action="{{route('handel.login')}}" >

        @csrf

      <input type="text" name="email"  class="form-control mt-4" placeholder="email" value="{{old('email')}}" >
      <input type="text" name="password"  class="form-control mt-4" placeholder="password" value="{{old('password')}}" >

      <button type="submit" class="btn btn-primary mt-5">Login</button>
    </form>




@endsection

