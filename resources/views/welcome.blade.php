<!DOCTYPE html>
<html lang="es">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header id="head">
        <img id="head-img" src="https://manzanillo.gob.mx/assets/img/escudo_de_armas.png">
        <div id="link">
            <a href="{{route('programa')}}">Inicio</a>
            <a href="#">Cuenta</a>
        </div>
    </header>
    
    <p id="main-title">Sistema de inicio de sesión</p>
    <div id="container">
        <div id="main">
            <img id="main-img" src="https://manzanillo.gob.mx/assets/img/escudo_de_armas.png">
            <input id="main-mail" type="text" placeholder="Correo">
            <input id="main-pwd" type="password" placeholder="Contraseña">
            <button id="main-loginbtn">Iniciar sesión</button>
        </div>
    </div>
</body>
</html>