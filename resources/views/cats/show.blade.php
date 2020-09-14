@extends ('layout')

@section('title')
    show Category
@endsection

@section('content')

<div class="container mt-5">
            <h1>category ID : {{$cate -> id}}</h1>

            <h1>category Name :{{$cate ->name}}</h1>

                <h3>Books :</h3>



            <ul>
                @foreach ($cate->books as $book) {{-- books  function bta3t el model  --}}
                <li>
                    {{$book->name}}
                </li>
                @endforeach
            </ul>

<a href="{{ route('cate.list') }}">All cates</a>


</div>


@endsection


