@include('layouts.head')
<section class="tj-service-section">
    <div class="container">

        <div class="row no-gutters shadow-lg">
            <div class="col-md-5 d-none d-md-block">
                <img src="{{ asset('assets/images/blog/b2.jpeg') }}" height="650" />
            </div>
            <div class=" d-block d-sm-none text-center">
                <img src="{{ asset('assets/images/im9.png') }}" height="150" width="150" />
            </div>
            <div class="col-md-6 bg-white py-4">
                <h3 class=" text-center">Connexion</h3>
                <div class="form-style">

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group border mb-3" style="border-radius: 10px;">

                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" placeholder="Email"
                                    autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group border mb-3" style="border-radius: 10px;">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="Mot de passe">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-flex align-items-center justify-content-between">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Se souvenir de moi!') }}
                                </label>
                            </div>

                            <div class="pb-4">
                                <button type="submit" class="btn btn-success w-100 font-weight-bold mt-2">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                        <div class="sideline pb-4">OU</div>
                        <div class="pb-4">
                            <div class="row">

                                <div class="col-6">
                                    <form method="GET" action="{{ route('users.facebook') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary w-100 font-weight-bold"><i
                                                class="fa-brands fa-facebook" aria-hidden="true"></i></button>
                                    </form>
                                </div>

                                <div class="col-6">
                                    <form method="GET" action="{{ route('users.google') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger w-100 font-weight-bold "><i
                                                class="fa-brands fa-google" aria-hidden="true"></i></button>
                                    </form>
                                </div>

                            </div>

                        </div>
                        <div class="pb-4">
                            Vous n'avez pas de compte ? <a style= 'color:green;'
                                href="{{ route('register') }}">S'inscrire</a> <br />
                        </div>

                        @if (Route::has('password.request'))
                            <a style= 'color:green;' href="{{ route('password.request') }}">
                                {{ __('Mot de passe oublié') }}
                            </a>
                        @endif 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/odometer.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/js/imagesloaded-pkgd.js') }}"></script>
<script src="{{ asset('assets/js/meanmenu.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
