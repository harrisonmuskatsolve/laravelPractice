@extends('partials.layout')

@section('content')
    <div class="col-md-8 blog-main">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <hr>
        <div class="comments">
            <ul class="list-group">
                @foreach ($post->comments as $comment)
                    <li class="list-group-item">
                        <strong>
                            {{$comment->created_at->diffForHumans()}}: 
                        </strong>
                        {{$comment->body}}
                    </li>
                @endforeach
            </ul>
        </div>
        <hr>
        <div class="card">
            <div class="card-block">
            <form method="POST" action="/posts/{{$post->id}}/comments">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="body" cols="30" rows="10" placeholder="Your comment here" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Add Comment</button>
                    </div>
                </form>
            </div>
            @include('partials.formerror')
        </div>
    </div>
@endsection