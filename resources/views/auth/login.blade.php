<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
</head>
<body>
    @if (session()->has('login'))
        <p>
            {{session('login')}}
        </p>
    @endif

    @if (session()->has('register'))
        <p>
            {{session('register')}}
        </p>    
    @endif

    @guest
        <form action="{{route('login')}}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button class="submit">Login</button>
        </form>        
    @endguest

    @auth
        <a href="{{route('logout')}}" name="logout">Logout</a>
    @endauth

</body>
</html>