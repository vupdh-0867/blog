@extends('layouts.app')

@section('content')
<div class="container">
    <div class="comment-panel">
        {!! Form::open(['url' => route('posts.update', $post->id), 'method' => 'put']) !!}
        @csrf
        <div class="form-group">
            <label>@lang('home.title')</label>
            <input type="text" class="form-control" name="title" value="{{$post->title}}">
        </div>
        @if($errors->has('title'))
        @foreach($errors->get('title') as $message)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endforeach
        @endif
        <div class="form-group">
            <label>@lang('home.content')</label>
            <textarea class="form-control" name="content" rows="3">{{$post->content}}</textarea>
        </div>
        @if($errors->has('content'))
        @foreach($errors->get('content') as $message)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endforeach
        @endif
        <button class="btn btn-success">@lang('home.post')</button>
        {!! Form::close() !!}
    </div>
</div>
@endsection
