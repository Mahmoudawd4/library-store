@extends ('layout')

@section('title')
    All books
@endsection

@section('content')

@auth
@foreach (Auth::user()->notes as $note)
<p class="container">{{$note->content}}</p>


@endforeach

<a href="{{ route('notes.create')}}" class="btn btn-primary ml-5">Create Note</a>

@endauth



<h1 class="container">All BooKs</h1>
@foreach($Books as $Book)
<div class="container">

<h1><a href="{{url('/books/show',$Book->id)}}">{{$Book ->name}}</a></h1>
<p>{{$Book ->desc}}</p>

@auth
<a href="{{ route('book.create')}}" class="btn btn-info">Create</a>
<a href="{{ route('book.edit', $Book->id)}}" class="btn btn-success">Edit</a>

@if (Auth::user()->is_Admin==1)
<a href="{{ route('book.delete', $Book->id)}}" class="btn btn-danger">Delete</a>
@endif
@endauth


<hr>
</div>

@endforeach





@endsection


