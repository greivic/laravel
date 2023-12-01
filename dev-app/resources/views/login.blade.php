<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<link rel="stylesheet" href="{{ asset('login_style.css') }}">

<div class="loginBox"> <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
        <h3>Iniciar sesión</h3>
        <form  method="POST" action="{{route ('session')}}">
        @csrf
            <div class="inputBox"> 
            <input id="uname" type="text" name="name" required placeholder="Usuario"> 
            <input id="gmail" type="text"name="email" required placeholder="Correo"> 
            <input id="pass" type="password" name="password" placeholder="Contraseña" required> </div> 
            <input type="submit" value="Iniciar">
        </form> 
        <div class="text-center">
            <p style="color: #59238F;"><a href="{{route('register')}}">Registrarse</a></p>
        </div>
        
    </div>
</body>
</html>
