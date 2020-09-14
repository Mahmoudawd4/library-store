@extends ('layout')

@section("title")

create Note

@endsection


@section('content')

    @include ('inc.errors')

    <form class="form-group w-75 py-5 m-auto " method="POST" action="{{route('notes.store')}}" >

        @csrf

      <textarea  class="form-control mt-2" name="content" placeholder="content"  rows="3">{{old('content')}}</textarea>

      <button type="submit" class="btn btn-primary mt-5">Add Note</button>
    </form>




@endsection

