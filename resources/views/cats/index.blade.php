@extends ('layout')

@section('title')
    All Categories
@endsection

@section('content')

@foreach($cats as $cate)
<div class="container">

<h1><a href="{{url('/cate/show',$cate->id)}}">{{$cate ->name}}</a></h1>
<p>{{$cate ->desc}}</p>
<a href="{{ route('cate.create')}}" class="btn btn-info">Create</a>
<a href="{{ route('cate.edit', $cate->id)}}" class="btn btn-success">Edit</a>
<a href="{{ route('cate.delete', $cate->id)}}" class="btn btn-danger">Delete</a>

<hr>
</div>

@endforeach





@endsection


