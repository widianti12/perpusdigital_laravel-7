<!DOCTYPE html>
<html lang="en">
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
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group position-relative has-icon-left mb-4">
                                <input id="nama_lengkap" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required autocomplete="nama_lengkap" placeholder="Username"  autofocus>
                                <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('nama_lengkap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>
                                <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>


                        <div class="form-group position-relative has-icon-left mb-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" >
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password Confirmation">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password-confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat"  placeholder="Adress"autofocus>
                                <div class="form-control-icon">
                                <i class=""></i>
                            </div>
                            @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Already have an account? <a href="/login"
                                class="font-bold">Log
                                in</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>     
