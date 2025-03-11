<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greet Page</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Tailwind CSS included -->
</head>
<body class="bg-gray-100 text-gray-800"> <!-- Tailwind utility classes -->

    @auth
    <header class="bg-gray-800 text-white p-5 text-center shadow-md"> <!-- Tailwind utility classes -->
        <h1 class="text-xl font-semibold">Welcome Back!</h1>
    </header>

    <div class="container mx-auto p-5 max-w-3xl"> <!-- Tailwind utility classes -->

        <form action="/logout" method="POST" class="text-right mb-5"> <!-- Tailwind utility classes -->
            @csrf
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Log Out</button> <!-- Tailwind utility classes -->
        </form>

        <div class="bg-white p-6 rounded-lg shadow-md mb-6"> <!-- Tailwind utility classes -->
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Create a New Post</h2>
            <form action="/createPost" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Post Title" required class="w-full p-3 mb-3 border rounded focus:outline-none focus:ring focus:ring-blue-300"> <!-- Tailwind utility classes -->
                <textarea name="description" placeholder="Content" rows="5" required class="w-full p-3 border rounded focus:outline-none focus:ring focus:ring-blue-300"></textarea> <!-- Tailwind utility classes -->
                <button type="submit" class="w-full mt-3 bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Create Post</button> <!-- Tailwind utility classes -->
            </form>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md"> <!-- Tailwind utility classes -->
            <h2 class="text-lg font-semibold text-gray-700 mb-4">All Posts</h2>
            @foreach($posts as $post)
            <div class="bg-gray-100 p-4 rounded-lg shadow-sm mb-4 hover:shadow-md transition"> <!-- Tailwind utility classes -->
                <h3 class="text-lg font-medium text-gray-800">{{$post['title']}}</h3>
                <p class="text-gray-600">{{$post['description']}}</p>
                <div class="flex gap-2 mt-3"> <!-- Tailwind utility classes -->
                    <a href="/editPost/{{$post->id}}" class="flex-1 bg-blue-500 text-white px-4 py-2 rounded text-center hover:bg-blue-600">Edit</a> <!-- Tailwind utility classes -->
                    <form action="/deletePost/{{$post->id}}" method="POST" class="flex-1"> <!-- Tailwind utility classes -->
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600">Delete</button> <!-- Tailwind utility classes -->
                    </form>
                </div>
            </div>
            @endforeach
        </div>

    </div>

    @else
    <header class="bg-gray-800 text-white p-5 text-center shadow-md"> <!-- Tailwind utility classes -->
        <h1 class="text-xl font-semibold">Welcome to Laravel!</h1>
    </header>

    <div class="container mx-auto p-5 max-w-md"> <!-- Tailwind utility classes -->
        <div class="bg-white p-6 rounded-lg shadow-md"> <!-- Tailwind utility classes -->
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Sign Up</h2>
            <form action="/task" method="POST">
                @csrf
                <input name="name" type="text" placeholder="Name" required class="w-full p-3 mb-3 border rounded focus:outline-none focus:ring focus:ring-blue-300"> <!-- Tailwind utility classes -->
                <input name="email" type="email" placeholder="Email" required class="w-full p-3 mb-3 border rounded focus:outline-none focus:ring focus:ring-blue-300"> <!-- Tailwind utility classes -->
                <input name="password" type="password" placeholder="Password" required class="w-full p-3 mb-3 border rounded focus:outline-none focus:ring focus:ring-blue-300"> <!-- Tailwind utility classes -->
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Sign Up</button> <!-- Tailwind utility classes -->
            </form>
        </div>
    </div>
    @endauth

</body>
</html>
