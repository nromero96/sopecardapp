<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sopecard - Registro</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/png" sizes="16x16">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-11 col-lg-12 col-md-11 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><b>REGISTROS NACIONALES SOPECARD</b></h1>
                                    </div>

                                    <form method="POST" action="{{ route('register') }}" class="user">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6 mb-3 mb-md-2">
                                                <label for="trato" class="form-label mb-0">Trato: <span class="text-danger">*</span></label>
                                                <select id="trato" class="form-control @error('trato') is-invalid @enderror" name="trato" required autocomplete="trato" autofocus>
                                                    <option value="" disabled selected>Seleccione un trato</option>
                                                    <option value="Dr.">Dr.</option>
                                                    <option value="Dra.">Dra.</option>
                                                </select>
                                                @error('trato')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3 mb-md-2">
                                                <label for="name" class="form-label mb-0">Nombre: <span class="text-danger">*</span></label>
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3 mb-md-2">
                                                <label for="lastname" class="form-label mb-0">Apellidos: <span class="text-danger">*</span></label>
                                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                                @error('lastname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3 mb-md-2">
                                                <label for="email" class="form-label mb-0">Correo: <span class="text-danger">*</span></label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3 mb-md-2">
                                                <label for="phone" class="form-label mb-0">Teléfono: </label>
                                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3 mb-md-2">
                                                <label for="password" class="form-label mb-0">Contraseña: <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" aria-describedby="buttonpassword">
                                                    <div class="input-group-append">
                                                      <button class="btn btn-outline-secondary" type="button" id="buttonpassword">
                                                        <i class="fas fa-eye" id="togglePassword"></i>
                                                      </button>
                                                    </div>
                                                </div>

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                    
                                            <div class="col-md-6 mb-3 mb-md-2">
                                                <label for="password-confirm" class="form-label mb-0">Confirmar Contraseña: <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" aria-describedby="buttonpasswordconfirm">
                                                    <div class="input-group-append">
                                                      <button class="btn btn-outline-secondary" type="button" id="buttonpasswordconfirm">
                                                        <i class="fas fa-eye" id="togglePasswordConfirm"></i>
                                                      </button>
                                                    </div>
                                                </div>
                                                <span id="passwordIqual" class="d-none"></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 mb-3 mb-md-2">
                                                <label for="sede" class="form-label d-block mb-0">Sede:</label>
                                                <select id="sede" class="form-control @error('sede') is-invalid @enderror" name="sede" autocomplete="sede" autofocus>
                                                    <option value="" disabled selected>Seleccione una sede</option>
                                                    @foreach($sedes as $sede)
                                                        <option value="{{ $sede->id }}" {{ old('sede') == $sede->id ? 'selected' : '' }}>{{ $sede->name }} - {{ $sede->address }}</option>
                                                    @endforeach
                                                </select>
                                                @error('sede')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 mb-3 mb-md-2">
                                                <label for="registro" class="form-label d-block mb-0">Registro: <span class="text-danger">*</span></label>
                                                <select id="registro" class="form-control @error('registro') is-invalid @enderror" name="registro" required autocomplete="registro" autofocus>
                                                    <option value="" disabled selected>Seleccione un registro</option>
                                                    <option value="REPECCA">REPECCA</option>
                                                    <option value="RENAVAL">RENAVAL</option>
                                                    <option value="RENIMA">RENIMA</option>
                                                    <option value="INPER-HP">INPER-HP</option>
                                                </select>
                                                @error('registro')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                            
                                        <div class="row">
                                            <div class="col-md-12 mb-3 mt-1 mb-md-2">
                                                <div class="form-check">
                                                    <input type="hidden" name="is_acept_terms" value="0">
                                                    <input class="form-check-input" type="checkbox" value="1" id="is_acept_terms" name="is_acept_terms" {{ old('is_acept_terms') ? 'checked' : '' }} required>
                                                    <label class="form-check-label" for="is_acept_terms" style="margin-top: 2px;">
                                                        Acepto los <a href="#" data-toggle="modal" data-target="#termsModal">términos y condiciones</a> y la <a href="#" data-toggle="modal" data-target="#privacyModal">política de privacidad</a>.
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        

                                        <button type="submit" class="btn btn-primary btn-user btn-block mt-1">
                                            <b>{{ __('Registrarme') }}</b>
                                        </button>

                                    </form>
                                    
                                    <div class="text-center mt-3">
                                        ¡Ya tengo una cuenta! 
                                        <a class="small" href="{{ route('login') }}">
                                            <b>Iniciar Sesión</b>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>


    {{-- Modal Terminos y condiciones --}}
    <div class="modal fade" id="termsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="termsModalLabel">Terminos y condiciones</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p class="text-justify">
                    Al registrarte en Sopecard, aceptas cumplir con los términos y condiciones establecidos. Estos términos incluyen el uso adecuado de la plataforma, la protección de tus datos personales y el respeto a las políticas de privacidad. Si no estás de acuerdo con estos términos, te recomendamos que no utilices nuestros servicios.
                </p>
                <p class="text-justify">
                    Sopecard se reserva el derecho de modificar estos términos en cualquier momento. Te recomendamos que revises periódicamente esta sección para estar al tanto de cualquier cambio. Al continuar utilizando nuestros servicios después de que se hayan realizado cambios, aceptas los nuevos términos y condiciones.
                </p>
                <p class="text-justify">
                    Si tienes alguna pregunta o inquietud sobre nuestros términos y condiciones, no dudes en ponerte en contacto con nosotros a través de nuestro servicio de atención al cliente.
                </p>
                <p class="text-justify">
                    Al hacer clic en "Acepto los términos y condiciones", confirmas que has leído, entendido y aceptado estos términos. Si no estás de acuerdo con alguno de ellos, por favor no utilices nuestros servicios.
                </p>
            </div>
        </div>
        </div>
    </div>

    {{-- Modal Politica de privacidad --}}
    <div class="modal fade" id="privacyModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="privacyModalLabel">Politica de privacidad</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p class="text-justify">
                    En Sopecard, valoramos tu privacidad y nos comprometemos a proteger tus datos personales. Esta política de privacidad describe cómo recopilamos, utilizamos y protegemos la información que nos proporcionas al registrarte en nuestra plataforma.
                </p>
                <p class="text-justify">
                    Al registrarte en Sopecard, aceptas que recopilemos y utilicemos tus datos personales de acuerdo con esta política. Nos comprometemos a no compartir tu información con terceros sin tu consentimiento, excepto cuando sea necesario para cumplir con la ley o proteger nuestros derechos.
                </p>
                <p class="text-justify">
                    Si tienes alguna pregunta o inquietud sobre nuestra política de privacidad, no dudes en ponerte en contacto con nosotros a través de nuestro servicio de atención al cliente.
                </p>
                <p class="text-justify">
                    Al hacer clic en "Acepto la política de privacidad", confirmas que has leído, entendido y aceptado esta política. Si no estás de acuerdo con alguno de los términos, por favor no utilices nuestros servicios.
                </p>
            </div>
        </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->

    <script>
        $(document).ready(function() {
            $('#password-confirm').on('keyup', function() {
                if ($(this).val() === $('#password').val()) {
                    $('#passwordIqual').removeClass('d-none').addClass('text-success').text('Las contraseñas coinciden');
                    $('#passwordIqual').removeClass('text-danger');
                } else {
                    $('#passwordIqual').removeClass('d-none').addClass('text-danger').text('Las contraseñas no coinciden');
                    $('#passwordIqual').removeClass('text-success');
                }
            });

            //opcion de mostrar/ocultar contraseña
            const togglePassword = document.querySelector('#togglePassword');
            const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
            const password = document.querySelector('#password');
            const passwordConfirm = document.querySelector('#password-confirm');

            const buttonpassword = document.querySelector('#buttonpassword');
            const buttonpasswordconfirm = document.querySelector('#buttonpasswordconfirm');

            buttonpassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
            buttonpasswordconfirm.addEventListener('click', function() {
                const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordConfirm.setAttribute('type', type);
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });

        });
    </script>

</body>

</html>