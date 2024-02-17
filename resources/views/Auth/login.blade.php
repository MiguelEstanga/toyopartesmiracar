<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="contenerdor">
        <div class="formulario">
            <div class="container-sm">
                <div
                    class="container-sm center"
                >
                    <img
                    width="50%"
                    style="margin: auto ; "
                    src="{{asset("logo.png")}}" alt="">
                </div>
                <h4 class="text-center alert">
                    Iniciar sesión<br/>

                    @if (session('mensage'))
                        <span style="color:red">
                            {{session('mensage')}}
                        </span>
                    @endif
                </h4>

            </div>
            <div class="container">
                <form action="{{route("auth")}}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="ejemplo@ejemplo.com">
                        <label for="floatingInput">Correo electrónico </label>
                    </div>
                    <div class="form-floating">
                        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Contraseña">
                        <label for="floatingPassword">Contraseña</label>
                    </div>
                    <div class="container-sm boton-conten">
                        <button class="btn btn-primary">
                            Iniciar sesión
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
<style>
    .center{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    body:{
        background: #ffffff !important;
    }
</style>
</html>
