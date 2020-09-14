@extends ('layout')

@section("title")

Edit Book - {{$book->id}}

@endsection


@section('content')


@include ('inc.errors')


    <form class="form-group w-75 py-5 m-auto " method="POST" action="{{ route('book.update', $book->id ) }}" enctype="multipart/form-data">

        @csrf

      <input type="text" name="name"  class="form-control" placeholder="name" value="{{ old('name') ?? $book ->name}}">
      <textarea  class="form-control mt-2" name="desc" placeholder="descraption"  rows="3">{{ old('desc') ?? $book ->desc}}</textarea>
      <input type="file" name="image" >

      <button type="submit" class="btn btn-primary mt-5">update</button>
    </form>




@endsection
