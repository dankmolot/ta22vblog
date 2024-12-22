<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="navbar bg-base-100">
        <div class="flex-1">
            <a class="btn btn-ghost text-xl" href="/">myBlog</a>
        </div>
        <div class="flex-none">
            @if (Auth::check())
                <a href="/dashboard" class="btn btn-outline btn-primary">Dashboard</a>
            @else
                <a href="/login" class="btn btn-outline btn-primary">Login</a>
            @endif
        </div>
    </div>

    @unless (Auth::check())
        <div class="flex justify-center mt-8">
            <p class="mx-auto">To view posts, you need to <a class="underline" href="{{ route('login') }}">login</a></p>
        </div>
    @endunless

    <div class="container mx-auto p-4">
        <!-- Pagination -->
        <div class="flex justify-center">
            {{ $posts->links() }}
        </div>

        <!-- Main content page -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mt-4">
            @foreach( $posts as $post )
                <div>
                    <div class="card bg-base-200 shadow-xl">
                        <div class="card-body">
                            <!-- Title -->
                            <h2 class="card-title">{{ $post->title }}</h2>

                            <!-- Short description -->
                            <p>{{ $post->snippet }}</p>

                            <!-- Tags -->
                            <div class="card-actions">
                                @foreach( $post->tags as $tag )
                                    <a class="badge">{{ $tag->name }}</a>
                                @endforeach
                            </div>

                            <!-- Author, date and actions -->
                            <div class="card-actions justify-between items-center mt-4">
                                <div class="flex flex-col opacity-50 text-sm">
                                    <span>{{ $post->created_at->diffForHumans() }}</span>
                                    <span>By {{ $post->user->name }}</span>
                                </div>
                                <a class="btn btn-primary" href="{{ route('post.show', $post) }}">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-8">
            {{ $posts->links() }}
        </div>
    </div>
</body>

</html>
