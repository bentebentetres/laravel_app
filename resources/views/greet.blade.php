<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greet Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .post-box {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .post-box h3 {
            color: #333;
        }

        .post-box p {
            color: #555;
        }

        .post-box a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        .post-box a:hover {
            text-decoration: underline;
        }

        .button {
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #2980b9;
        }

        form input, form textarea, form button {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        form input[type="text"], form textarea {
            width: 100%;
            box-sizing: border-box;
        }

        form button {
            background-color: #2c3e50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            padding: 10px 20px;
        }

        form button:hover {
            background-color: #34495e;
        }
    </style>
</head>

<body>

    @auth
    <header>
        <h1>You're Logged In</h1>
    </header>

    <div class="container">

        <form action="/logout" method="POST" style="text-align: right; margin-bottom: 20px;">
            @csrf
            <button class="button">Log Out</button>
        </form>

        <div class="post-box">
            <h2>Create Posts</h2>
            <form action="/createPost" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Post Title">
                <textarea name="description" placeholder="Content"></textarea>
                <button type="submit" class="button">Create Post</button>
            </form>
        </div>

        <div class="post-box">
            <h2>All Posts</h2>
            @foreach($posts as $post)
            <div style="background-color: #ecf0f1; padding: 15px; margin-bottom: 10px; border-radius: 5px;">
                <h3>{{$post['title']}}</h3>
                <p>{{$post['description']}}</p>
                <p><a href="/editPost/{{$post->id}}">Edit</a></p>
                <form action="/deletePost/{{$post->id}}" method="POST" style="margin-top: 10px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button" style="background-color: #e74c3c;">Delete</button>
                </form>
            </div>
            @endforeach
        </div>

    </div>

    @else
    <header>
        <h1>Welcome to Laravel!</h1>
    </header>

    <div class="container">
        <form action="/task" method="POST">
            @csrf
            <input name="name" type="text" placeholder="Name">
            <input name="email" type="text" placeholder="Email">
            <input name="password" type="text" placeholder="Password">
            <button type="submit" class="button">ADD</button>
        </form>
    </div>
    @endauth

</body>
</html>
