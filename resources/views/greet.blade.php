<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greet Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }

        .post-box {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 25px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .post-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }

        .post-box h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .post-box h3 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 20px;
        }

        .post-box p {
            color: #555;
            line-height: 1.6;
        }

        .post-box a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .post-box a:hover {
            color: #2980b9;
            text-decoration: underline;
        }

        .button {
            background-color: #3498db;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #2980b9;
        }

        form input, form textarea, form button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        form input:focus, form textarea:focus {
            border-color: #3498db;
            outline: none;
        }

        form button {
            background-color: #2c3e50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            padding: 12px 20px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #34495e;
        }

        .post-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .post-actions .button {
            flex: 1;
        }

        .post-actions .button.delete {
            background-color: #e74c3c;
        }

        .post-actions .button.delete:hover {
            background-color: #c0392b;
        }

        .post-item {
            background-color: #ecf0f1;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .post-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .post-item h3 {
            margin-top: 0;
        }

        .post-item p {
            margin-bottom: 15px;
        }

        @media (max-width: 600px) {
            .container {
                width: 95%;
                padding: 10px;
            }

            .post-box {
                padding: 15px;
            }

            form input, form textarea, form button {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    @auth
    <header>
        <h1>Welcome Back!</h1>
    </header>

    <div class="container">

        <form action="/logout" method="POST" style="text-align: right; margin-bottom: 20px;">
            @csrf
            <button class="button">Log Out</button>
        </form>

        <div class="post-box">
            <h2>Create a New Post</h2>
            <form action="/createPost" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Post Title" required>
                <textarea name="description" placeholder="Content" rows="5" required></textarea>
                <button type="submit" class="button">Create Post</button>
            </form>
        </div>

        <div class="post-box">
            <h2>All Posts</h2>
            @foreach($posts as $post)
            <div class="post-item">
                <h3>{{$post['title']}}</h3>
                <p>{{$post['description']}}</p>
                <div class="post-actions">
                    <a href="/editPost/{{$post->id}}" class="button">Edit</a>
                    <form action="/deletePost/{{$post->id}}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button delete">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

    </div>

    @else
    <header>
        <h1>Welcome to Laravel!</h1>
    </header>

    <div class="container">
        <div class="post-box">
            <h2>Sign Up</h2>
            <form action="/task" method="POST">
                @csrf
                <input name="name" type="text" placeholder="Name" required>
                <input name="email" type="email" placeholder="Email" required>
                <input name="password" type="password" placeholder="Password" required>
                <button type="submit" class="button">Sign Up</button>
            </form>
        </div>
    </div>
    @endauth

</body>
</html>