@extends ('layout')

@section("title")

create Book

@endsection


@section('content')

    @include ('inc.errors')

    <form class="form-group w-75 py-5 m-auto " method="POST" action="{{route('book.store')}}" enctype="multipart/form-data">

        @csrf

      <input type="text" name="name"  class="form-control" placeholder="name" value="{{old('name')}}" >
      <textarea  class="form-control mt-2" name="desc" placeholder="descraption"  rows="3">{{old('desc')}}</textarea>
        <input type="file" name="image" >

        <h6>Select Categories : </h6>
        @foreach ($cates as $cate)
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="category_ids[]" id="" value="{{$cate->id}}" >
              <label class="form-check-label">
                {{$cate->name}}
              </label>
            </div>

        @endforeach



      <button type="submit" class="btn btn-primary mt-5">submit</button>
    </form>




@endsection

