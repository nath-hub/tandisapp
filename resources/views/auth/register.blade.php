<!DOCTYPE html>
<html class="no-js" lang="en">

@include('layouts.head')

<body>

    <div class="container">
        <div class="row pb-5">
            <div class="tj-sec-heading text-center">

                <div class="d-md-none d-sm-block">
                    <img src="{{ asset('assets/images/im2.jpg') }}" height="250" />
                </div>

            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error!</strong> <br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="row no-gutters shadow-lg pb-5">
            <div class="col-md-5 d-none d-md-block">
                <img src="{{ asset('assets/images/blog/b2.jpeg') }}" height="850" />
            </div>
            <div class="col-md-6 bg-white py-5 md-2">
                <h3 class="pb-3 text-center">S'inscrire</h3>
                <div class="form-style">

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group pb-1 border mb-3" style="border-radius: 10px;">
                                <input id="name" type="text" placeholder="Nom" 
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group border mb-3" style="border-radius: 10px;">
                                <input id="email" type="email" placeholder="Email" 
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group pb-1 border mb-3" style="border-radius: 10px;">
                                <input type="number" name="phone" placeholder="Phone" class="form-control"
                                    value="{{ old('phone') }}" aria-describedby="phoneHelp">
                                @if ($errors->has('phone'))
                                    <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                            <div class="form-group  border mb-3" style="border-radius: 10px;">
                                <input id="password" type="password" placeholder="Password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group  border mb-3" style="border-radius: 10px;">
                                 
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Confirmation du mot de passe">
                                </div>
                            </div>
 
                            <div class="d-none" style="border-radius: 10px;">
                                <input type="file" value="{{ asset('assets/images/pp.jpg') }}" name="photo"
                                    placeholder="photo" class="form-control" value="{{ old('photo') }}"
                                    aria-describedby="photoHelp">
                                @if ($errors->has('photo'))
                                    <span class="text-danger text-left">{{ $errors->first('photo') }}</span>
                                @endif
                            </div>

                            <div class="form-check mb-3">
                                <input type="checkbox" name="type" class="form-check-input" id="show-fields">
                                <label class="form-check-label" for="show-fields">
                                    Je suis une entreprise
                                </label>
                            </div>

                            <div class="collapse" data-bs-target="#show-fields">
                                <div class="form-group pb-1 border mb-3" style="border-radius: 10px;">
                                    <input type="name" name="name_enterprise" placeholder="Nom de l'entreprise"
                                        class="form-control" aria-describedby="nameHelp">
                                </div>

                                <div class="form-group pb-1 border mb-3" style="border-radius: 10px;">
                                    <input type="name" name="address" placeholder="adresse de l'entreprise"
                                        class="form-control" aria-describedby="nameHelp">
                                </div>

                                <div class="form-group pb-1 border mb-3" style="border-radius: 10px;">
                                    <input type="web_site" name="web_site" placeholder="Site de l'entreprise *"
                                        class="form-control" aria-describedby="web_siteHelp">
                                </div>
                            </div>


                            <div class="d-flex align-items-center justify-content-between">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck"
                                    required>
                                <label class="form-check-label" for="invalidCheck">
                                    j'accepte les termes et conditions d'utilisation de Tandis Investment
                                </label>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <div class="pb-4">
                                        <button type="submit" class="btn btn-success w-100 font-weight-bold mt-2">S'inscrire</button>
                                    </div>
                                </div>
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
                        Vous n'avez pas de compte ? <a style= 'color:green;' href="{{ __('login') }}">Se Connecter</a> <br />
                    </div>


                    <a href="#section1" style= 'color:green;'>Mot de passe oublié</a>

                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>
{{-- @include('element.footer') --}}

<script>
    const checkbox = document.getElementById('show-fields');
    const collapse = document.querySelector('.collapse');

    checkbox.addEventListener('change', () => {
        collapse.classList.toggle('show');
    });
</script>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/odometer.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/js/imagesloaded-pkgd.js') }}"></script>
<script src="{{ asset('assets/js/meanmenu.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
