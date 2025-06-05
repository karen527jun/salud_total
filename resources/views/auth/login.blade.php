<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('recursos/sweetalert/sweetalert2.min.css') }}">
    <title>Document</title>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center"
        style="height: 100vh; background-image: url('/images/fondo-login.jpg'); background-size: cover;background-position: center; background-repeat: no-repeat">
        <div class="container" style="width: 450px;">
            <div class="card p-5"
                style="min-height: 350px; background-color: rgba(255, 255, 255, 0.664); border-radius: 15px;">
                <h1 class="text-center">
                    Sistema control de pacientes
                </h1>
                <h4 class="text-center py-3">
                    Iniciar sesión
                </h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                {{-- Mostrar mensajes flash (ej. si el login falló) --}}
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label for="email">Correo electrónico</label>
                        <input name="email" class="form-control" type="text">
                    </div>
                    <div class="mt-4">
                        <label for="password">Contraseña</label>
                        <input name="password" type="password" class="form-control" type="text">
                    </div>
                    <div class="mt-4" style="height: 1px; border: rgb(230, 230, 230) solid 1px">

                    </div>
                    <div class="pt-4 d-flex justify-content-center imt">
                        <button class="btn btn-info text-white">
                            Iniciar sesión
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('recursos/jquery.min.js') }}"></script>
    <script src="{{ asset('recursos/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('recursos/js/custom.js') }}"></script>
</body>

</html>
