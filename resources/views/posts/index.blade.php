{{-- resources/views/posts/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-info mb-3">Create New Post</a>
    
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none text-dark">{{ $post->title }}</a>
                        </h5>
                        <p class="card-text">
                            {{ Str::limit($post->content, 100) }} <!-- Limit content length for previews -->
                        </p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary">Read More</a>
                    </div>
                    <div class="card-footer text-muted">
                        {{ $post->created_at->diffForHumans() }} <!-- Display when the post was created -->
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
