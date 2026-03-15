<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    @auth
        <p>Congrats nakalogin ka</p>
    @else
        <div style="border: 3px solid black">
        <h2>Register</h2>
        {{-- FOR ALL ERROR VALIDATIONS --}}
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="/register" method="POST">
                @csrf
                <input type="text" placeholder="name" name="name" value="{{ old('name') }}"/>
                {{-- FOR EACH ERROR VALIDATION
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror --}}

                <input type="text" placeholder="email" name="email" value="{{ old('email') }}"/>
                {{-- FOR EACH ERROR VALIDATION
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror --}}

                <input type="password" placeholder="password" name="password"/>
                {{-- FOR EACH ERROR VALIDATION
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror --}}

                <button type="submit">Register</button>
            </form>
        </div>
    @endauth
</body>
</html>