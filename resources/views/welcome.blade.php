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

    <div class="container mx-auto p-4">
        <!-- Pagination -->
        <div class="flex justify-center">
            {{ $posts->links() }}
        </div>

        <!-- Main content page -->
        <div class="grid grid-cols-4 gap-4 mt-4">
            @foreach( $posts as $post )
                <div>
                    <div class="card bg-base-200 shadow-xl">
                        <!-- <figure>
                            <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                                alt="Shoes" />
                        </figure> -->
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            <p>{{ $post->snippet }}</p>
                            <!-- <div class="card-actions justify-end">
                                <button class="btn btn-primary">Buy Now</button>
                            </div> -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
