@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <h6 class="card-title"><i>by {{$post->user->name}}</i></h6>
                    <p class="card-text">{{$post->content}}</p>
                    @if(Gate::allows('delete-post', $post))
                    {!! Form::open(['url' => route('posts.destroy', $post->id), 'method' => 'delete']) !!}
                    <button class="btn btn-danger" onclick="return confirm('@lang('message.delete_confirm')')">@lang('home.delete')</button>
                    {!! Form::close() !!}
                    @endif
                </div>
            </div>
            <form method="post" action="{{route('comments.store')}}">
                {{csrf_field()}}
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="form-group">
                    <label for="content">@lang('home.comment_title')</label>
                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">@lang('home.comment')</button>
            </form>
            <div class="comment-panel">
                @foreach($post->comments as $comment)
                <div class="card comment-item">
                    <div class="card-header">
                        {{$comment->user->name}}
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{{$comment->content}}</p>
                            <footer class="blockquote-footer">About <cite title="Source Title">{{$comment->created_at}}</cite></footer>
                        </blockquote>
                        @if($comment->user->id === Auth::id())
                        {!! Form::open(['url' => route('comments.destroy', $comment->id), 'method' => 'delete', 'class' => 'delete-form']) !!}
                            <button style="float:right;" class="btn btn-danger" onclick="return confirm('@lang('message.delete_confirm')')">@lang('home.delete')</button>
                        {!! Form::close() !!}
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
