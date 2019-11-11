@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="card comment-item">
                <div class="card-header">
                    {{$post->created_at}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->content}}</p>
                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">@lang('home.join')</a>
                    @if(Gate::allows('delete-post', $post))
                    {!! Form::open(['url' => route('posts.destroy', $post->id), 'method' => 'delete', 'class' => 'delete-form']) !!}
                    <button class="btn btn-danger" onclick="return confirm('@lang('message.delete_confirm')')">@lang('home.delete')</button>
                    {!! Form::close() !!}
                    @endif
                </div>
            </div>
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
