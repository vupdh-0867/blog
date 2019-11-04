@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="card">
                <div class="card-header">
                    {{ $post->user->name }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->content}}</p>
                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">Join</a>
                    @if($post->user->id === Auth::id())
                        {!! Form::open(['url' => route('posts.destroy', $post->id), 'method' => 'delete', 'class' => 'delete-form']) !!}
                            <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Delete</button>
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
