<!DOCTYPE html>
<html lang="en">

<head>
    <title>Survei</title>
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Tambahkan Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <!-- Tambahkan ikon panah kembali di kiri atas -->
                                    <div class="text-left mb-4">
                                        <a href="{{ route('home') }}" class="btn btn-link">
                                            <i class="fas fa-arrow-left"></i>
                                        </a>
                                    </div>
                                    <!-- End Tambahkan ikon panah kembali di kiri atas -->
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">{{ __('Login Admin') }}</h1>
                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger border-left-danger" role="alert">
                                            <ul class="pl-4 my-2">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </form>

                                    <hr>

                                    @if (Route::has('password.request'))
                                        <div class="text-center">
                                            <a class="small" href="{{ route('password.request') }}">
                                                {{ __('Forgot Password?') }}
                                            </a>
                                        </div>
                                    @endif

                                    @if (Route::has('register'))
                                        <div class="text-center">
                                            <a class="small"
                                                href="{{ route('register') }}">{{ __('Create an Account!') }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
