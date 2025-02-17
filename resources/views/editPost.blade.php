<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="/editPost/{{$post->id}}" method="POST">
        @csrf   
        @method("PUT")
        <input type="text" name="title" value="{{$post->title}}">
        <textarea name="description">{{$post->description}}</textarea>
        <button>Save</button>
    </form>
</body>
</html>