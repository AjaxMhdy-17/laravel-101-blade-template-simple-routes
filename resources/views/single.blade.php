
<!-- inherite app template -->

@extends('layouts.app') 

<!-- setting title  -->
@section('title',$task->title)


<!-- setting content  -->
@section('content')
    <h1>
        {{$task->title}}
    </h1>
    <p>
        {{$task->description}}
    </p>

    @if($task->long_description)
    <div>{{$task->long_description}}</div>
    @endif

    <p>
        created at {{$task->created_at}}
    </p>

    <p>
        created at {{$task->updated_at}}
    </p>
@endsection
<!-- end of content section  -->