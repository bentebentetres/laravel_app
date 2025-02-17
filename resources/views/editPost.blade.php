<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
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

        .form-box {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .form-box h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .form-box input,
        .form-box textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        .form-box textarea {
            resize: vertical;
            height: 150px;
        }

        .button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .button:hover {
            background-color: #2980b9;
        }

        .back-button {
            background-color: #e74c3c;
            padding: 10px 20px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #c0392b;
        }

    </style>
</head>
<body>

    <header>
        <h1>Edit Post</h1>
    </header>

    <div class="container">
        <div class="form-box">
            <form action="/editPost/{{$post->id}}" method="POST">
                @csrf   
                @method("PUT")
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{$post->title}}" required>

                <label for="description">Description</label>
                <textarea name="description" id="description" required>{{$post->description}}</textarea>

                <button type="submit" class="button">Save Changes</button>
            </form>
        </div>

        <a href="/" class="back-button">Back to All Posts</a>
    </div>

</body>
</html>
