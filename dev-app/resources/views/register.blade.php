<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<link rel="stylesheet" href="{{ asset('login_style.css') }}">

<div class="loginBox"> <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
        <h3>Registrar usuario</h3>
        <center>        <div class="form-group">
                    <select class="form-control item submit-btn" name="role" id="role">
                        <option value="admin">Administrador</option>
                        <option value="user">Usuario</option>
                    </select>
                </div></center>
<br>
        <form  method="POST" action="{{route ('session')}}">
        @csrf
            <div class="inputBox"> 
            <input id="uname" type="text" name="name" required placeholder="Usuario"> 
            <input id="gmail" type="text"name="email" required placeholder="Correo"> 
            <input id="pass" type="password" name="password" placeholder="Contraseña" required> </div> 

                <div class="form-row submit-btn">
                        <div class="input-data">
                            <div class="inner"></div>
                            <input type="submit" value="Crear">
                        </div>
                    </div>

        </form> 
        
        <h4><a href="{{route('login')}}">Ya tengo una cuenta</a></h4>
        
    </div>
</body>
</html>
