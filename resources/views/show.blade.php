@extends ('layout')

@section('title')
    show books
@endsection

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid" src="{{asset('uploads/books/'.$book->image)}}" alt="">

        </div>
        <div class="col-md-4">
            <h1>Book ID : {{$book -> id}}</h1>
            <h1>{{$book ->name}}</h1>
            <p>{{$book->desc}}</p>
            <h3>Categories :</h3>
            <ul>
                @foreach ($book->categories as $cate)   {{-- categories  function bta3t el model  --}}
                <li>
                    {{$cate->name}}
                </li>
                @endforeach
            </ul>


            <a href="{{url('/books')}}">All Books</a>

        </div>
    </div>





</div>

@endsection


