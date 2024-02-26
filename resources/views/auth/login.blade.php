<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/css/pages/auth.css')}}">
</head>
<body>
<div id="auth">

<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="index.html"><img src="{{asset('template/dist/assets/images/logo/logo.png')}}" alt="Logo"></a>
            </div>
            <h1 class="auth-title">Log in.</h1>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <form action="index.html">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Username" autofocus>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-4">Log in</button>
                    </form>
                    <div class="text-center mt-4 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="/register"
                                class="font-bold">Sign
                                up</a>.</p>
                        <p><a class="font-bold" href="{{ route('password.request') }}">Forgot password?</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>
</body>
</html>
