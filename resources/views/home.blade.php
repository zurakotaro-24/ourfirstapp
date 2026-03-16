<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    @auth
        <p>Congrats nakalogin ka</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Log out</button>
        </form>
        <div style="border: 3px solid black">
            <h2>Create a New Post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Post Title">
                <textarea name="body" placeholder="Body Content..."></textarea>
                <button>Submit</button>
            </form>
        </div>
        <div style="border: 3px solid black">
            <h2>All Posts</h2>
            @foreach ($posts as $post)
                <div style="background-color: gray; padding: 10px; margin: 10px;">
                    <h3>{{ $post->title }} by {{ $post->user->name }}</h3>
                    <p>{{ $post['body'] }}</p>
                    <p><a href="/edit-post/{{ $post->id }}">Edit</a></p>
                    <form action="/delete-post/{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <div style="border: 3px solid black">
        <h2>Register</h2>
        {{-- FOR ALL ERROR VALIDATIONS
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
            <form action="/register" method="POST">
                @csrf
                <input type="text" placeholder="name" name="name" value="{{ old('name') }}"/>
                {{-- FOR EACH ERROR VALIDATION --}}
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror 

                <input type="text" placeholder="email" name="email" value="{{ old('email') }}"/>
                {{-- FOR EACH ERROR VALIDATION --}}
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror 

                <input type="password" placeholder="password" name="password"/>
                {{-- FOR EACH ERROR VALIDATION --}}
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror 

                <button type="submit">Register</button>
            </form>
        </div>
        <div style="border: 3px solid black">
        <h2>Login</h2>
        {{-- FOR ALL ERROR VALIDATIONS
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
            <form action="/login" method="POST">
                @csrf
                <input type="text" placeholder="name" name="loginname" value="{{ old('name') }}"/>
                {{-- FOR EACH ERROR VALIDATION --}}
                @error('loginname')
                    <div class="text-danger">{{ $message }}</div>
                @enderror 

                <input type="password" placeholder="password" name="loginpassword"/>
                {{-- FOR EACH ERROR VALIDATION --}}
                @error('loginpassword')
                    <div class="text-danger">{{ $message }}</div>
                @enderror 

                <button type="submit">Login</button>
            </form>
        </div>
    @endauth
</body>
</html>