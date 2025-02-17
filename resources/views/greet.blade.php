<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greet Page</title>
</head>

<body>
    @auth
    <h1>You're Loged In</h1>
    <form action="/logout" method="POST">
        @csrf
        <button>Log Out</button>
    </form>

    <div style="border: 3px solid black">
        <h2>Create Posts</h2>
        <form action="/createPost" method="POST">
            @csrf
            <input type="text" name="title" placeholder="PostTitle">
            <textarea name="body" placeholder="content"></textarea>
            <button>Create Post</button>
        </form>
    </div>


    @else
    <h1>Hello, Welcome to Laravel!</h1>
    <div>
        <form action="/task" method='POST'>
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="text" placeholder="password">
            <button>ADD</button>
        </form>
    </div>
    

    @endauth

    
</body>
</html>
