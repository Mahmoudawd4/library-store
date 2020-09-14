@extends ('layout')

@section("title")

create Categories

@endsection


@section('content')

    @include ('inc.errors')

    <form class="form-group w-75 py-5 m-auto " method="POST" action="{{route('cate.store')}}" >

        @csrf

      <input type="text" name="name"  class="form-control" placeholder="name" value="{{old('name')}}" >

      <button type="submit" class="btn btn-primary mt-5">submit</button>
      
    </form>




@endsection

