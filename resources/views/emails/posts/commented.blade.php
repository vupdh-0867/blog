<html>
<h4>Hi {{$post->user->name}}</h4>

<p>Someone has commented on your posts <a href="{{route('posts.show', $post->id)}}">here</a></p>

</html>
