<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestion Reservas - Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="backdrop-grayscale-50">

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <!-- Recogida de datos para registro de  usuarios: Nombre email password -->
                            <h2 class="fw-bold mb-2 text-uppercase">Registro</h2>
                            <p class="text-white-50 mb-5">Registro de nuevo usuario</p>

                            <form action="{{ route('register') }}"  method="POST">
                                @csrf
                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <input type="text" name="name" class="form-control form-control-lg" value="{{ old('name') }}" required />
                                    <label class="form-label" for="name">Nombre Completo</label>
                                </div>

                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <input type="email" name="email"  class="form-control form-control-lg" value="{{ old('email') }}" required/>
                                    <label class="form-label" for="typeEmailX">Email</label>
                                </div>

                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <input type="password" name="password" class="form-control form-control-lg" required/>
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div>

                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <input type="password" name="password_confirmation" class="form-control form-control-lg" required/>
                                    <label class="form-label">Confirmar Password</label>
                                </div>

                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Registrarse</button>
                            </form>


                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                            </div>

                            {{-- Test Bootstrap Button and FontAwesome Icon --}}
                            <div class="mt-4">
                                <button type="button" class="btn btn-primary">
                                    <i class="fas fa-check"></i> Test Button
                                </button>
                            </div>

                        </div>

                        <div>
                            <p class="mb-0">¿Ya tienes cuenta?<a href="{{route('login')}}" class="text-white-50 fw-bold">Login </a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Removed old script imports, as they are now handled by Vite --}}
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>
