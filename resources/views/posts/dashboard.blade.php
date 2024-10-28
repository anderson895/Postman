<!-- resources/views/posts/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <p>Welcome to your dashboard!</p>
        <p>Here are your posts:</p>

        <!-- Display user posts -->
        @if($posts->isEmpty())
            <p>No posts found.</p>
        @else
            <ul>
                @foreach($posts as $post)
                    <li>
                        <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
