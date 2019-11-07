@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="card comment-item">
                <div class="card-header">
                    {{ $post->user->name }} - {{$post->created_at}}
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
            <div class="comment-panel">
                <h4>@lang('home.post_title')</h4>
                <form method="post" action="{{route('posts.store')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>@lang('home.title')</label>
                        <input type="text" class="form-control" name="title">
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
                        <textarea class="form-control" name="content" rows="3"></textarea>
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
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
