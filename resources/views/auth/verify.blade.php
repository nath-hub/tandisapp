@include('layouts.head')
@include('layouts.header')
@include('layouts.headsection')

<body> 
    <div class="container py-5">
        <div class="text-center shadow-lg rounded py-4">
            <div class="tj-sec-heading-two">
                <h2 class="title">
                    <span>Vérifiez votre adresse e-mail</span>
                </h2>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse électronique.') }}
                        </div>
                    @endif

                    {{ __('Avant de poursuivre, veuillez vérifier votre courrier électronique pour obtenir un lien de vérification.') }}
                    {{ __("Si vous n'avez pas reçu l'email") }},
                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit"
                            class="btn btn-link p-0 m-0 align-baseline">{{ __('cliquez ici pour en demander un autre') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>


@include('layouts.footer')
