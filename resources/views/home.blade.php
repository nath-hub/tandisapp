@include('layouts.head')
@include('layouts.header')

@include('layouts.headsection')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<main>
    <div class="container py-5 d-none d-md-block">
        <div class="row  shadow-lg rounded">
            <div class="col-3 text-center">
                <img class="rounded" height="150px" width="200px" src="{{ asset('assets/images/pp.jpg' ?? $user->photo) }}"
                    alt="Image" />
                <div class="py-1">
                    <a href="{{ route('home.projet') }}" class="btn btn-success">investir</a>
                </div>
                <a href="{{ route('profile.edit') }}" class="btn btn-success">modifier mon compte</a>
                <div class="py-1">

                    @if (Route::has('password.request'))
                        <a class="btn btn-success" href="{{ route('password.request') }}">
                            {{ __('changer mon mot de passe') }}
                        </a>
                    @endif
                </div>
                @if ($user->type === 'ENTERPRISE')
                    <div class="py-3">
                        <a class="btn btn-success" href="{{ route('enterprise.edit', $enterprise->id) }}">
                            changer les infos de l'entreprise
                        </a>
                    </div>
                @endif
                <div class="accordion-item">
                    <h3 class="accordion-header" id="headingTwo">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse"
                            data-bs-target="#profil" aria-expanded="true" aria-controls="collapseTwo">
                            Profile
                        </button>
                    </h3>
                </div>

                <div class="accordion-item">
                    <h3 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#invest" aria-expanded="false" aria-controls="collapseTwo">
                            Investissements
                        </button>
                    </h3>
                </div>
                @if ($user->type === 'ENTERPRISE')
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#enterprise" aria-expanded="false" aria-controls="collapseTwo">
                                Mon Entreprise
                            </button>
                        </h3>
                    </div>
                @endif
            </div>

            <div class="col-8">

                <div id="profil" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="gy-3">
                            <table class="table caption-top">
                                <caption>Informations de utilisateur</caption>

                                <tbody>
                                    <tr>
                                        <th scope="row">Nom : </th>
                                        <td>{{ $user->name }} </td>

                                    </tr>
                                    <tr>
                                        <th scope="row">Email: </th>
                                        <td>{{ $user->email }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Téléphone : </th>
                                        <td>{{ $user->phone }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Statut: </th>
                                        <td>{{ $user->statut }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Date de creation : </th>
                                        <td>{{ $user->created_at }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pays: </th>
                                        <td>{{ $user->country }} </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Ville : </th>
                                        <td>{{ $user->town }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Date de naissance: </th>
                                        <td>{{ $user->birth_date }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Type de compte: </th>
                                        <td>{{ $user->type }} </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="invest" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        <h4 class="py-3"> Mes investissements </h4>
                        <table class="table table-striped table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col-3">Entreprise</th>
                                    <th scope="col-1">Phase</th>
                                    <th scope="col-2">Montant</th>
                                    <th scope="col-1">Qté</th>
                                    <th scope="col-2">Date</th>
                                    <th scope="col-2">Statut</th>
                                    <th scope="col-2">Recu</th>
                                </tr>
                            </thead>
                            @if (isset($invest))
                                @foreach ($invest as $item)
                                    @if (isset($phase))
                                        @foreach ($phase as $phases)
                                            @if (isset($enterprises))
                                                @foreach ($enterprises as $enter)
                                                    <tbody>
                                                        <tr class="table-active">
                                                            <td>{{ $enter->name_enterprise }}</td>
                                                            <th>{{ $phases->phase }}</th>
                                                            <td>{{ $item->total_payer }}</td>
                                                            <td>{{ $item->nombre_action }}</td>
                                                            <td>{{ $item->created_at }}</td>
                                                            <td>{{ $phases->statut_phase }}</td>
                                                            <td><a class="btn btn-outline-warning"
                                                                    href="{{ asset($user->type) }}">Lire le
                                                                    PDF</a></td>
                                                        </tr>
                                                    </tbody>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @else
                                <p>Vous n'avez pas encore investis !!!</p>
                            @endif
                        </table>
                    </div>
                </div>

                @if ($user->type === 'ENTERPRISE')
                    <div id="enterprise" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="gy-3">
                                <table class="table caption-top">
                                    <caption>Informations de l'entreprise</caption>

                                    <tbody>
                                        <tr>
                                            <th scope="row">Siren : </th>
                                            <td>{{ $enterprise->siren }} </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email: </th>
                                            <td>{{ $enterprise->commercial_register }} </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">name_enterprise : </th>
                                            <td>{{ $enterprise->name_enterprise }} </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">address: </th>
                                            <td>{{ $enterprise->address }} </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">livres: </th>
                                            <td><a class="btn btn-outline-warning"
                                                    href="{{ asset($enterprise->livres) }}">Lire le
                                                    PDF</a></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">politique : </th>
                                            <td> <a class="btn btn-outline-warning"
                                                    href="{{ asset($enterprise->politique) }}">Lire le
                                                    PDF</a> </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">objectif: </th>
                                            <td>{{ $enterprise->objectif }} </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">montant_actuel: </th>
                                            <td>{{ $enterprise->montant_actuel }} </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">web_site: </th>
                                            <td> <a class="btn btn-link" href="{{ $enterprise->web_site }}">
                                                    Visiter le site</a> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">description: </th>
                                            <td>{{ $enterprise->description }} </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 p-3 float-right">
                            <a class="btn btn-warning" href="{{ URL::previous() }}">
                                <i class="fas fa-arrow-left"></i> Retour</a>
                            <button type="submit" class="btn btn-danger"> Se déconnecter</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
    <div class=" d-block d-sm-none">
        <div class="shadow-lg rounded">
            <div class="">
                <div class="row">
                    <div class="col-4 py-4">
                        <img src="{{ asset('assets/images/pp.jpg' ?? $user->photo) }}" alt="Image de profil"
                            class="rounded-circle" width="150" height="140">
                    </div>
                    <div class="col-8">
                        <div class="py-3">
                            <a href="{{ route('home.projet') }}" class="btn btn-success">investir</a>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="btn btn-success">modifier mon
                            compte</a>
                        <div class="py-3">
                            @if (Route::has('password.request'))
                                <a class="btn btn-success" href="{{ route('password.request') }}">
                                    {{ __('changer mon mot de passe') }}
                                </a>
                            @endif
                        </div>
                        @if ($user->type === 'ENTERPRISE')
                            <div class="py-3">
                                <a class="btn btn-success" href="{{ route('enterprise.edit', $enterprise->id) }}">
                                    changer les infos de l'entreprise
                                </a>
                            </div>
                        @endif
                    </div>
                </div>



                <a class="accordion-button border bg-success collapsed p-3" data-bs-toggle="collapse"
                    data-bs-target="#profil">
                    <h5>Informations Personnelles +</h5>
                </a>
                <a class="accordion-button border bg-success collapsed p-3" data-bs-toggle="collapse"
                    data-bs-target="#investi">
                    <h5>Mes Investissements +</h5>
                </a>
                @if ($user->type === 'ENTERPRISE')
                    <a class="accordion-button border bg-success collapsed p-3" data-bs-toggle="collapse"
                        data-bs-target="#enterprise">
                        <h5> Mon Entreprise +</h5>
                    </a>
                @endif

                <div id="profil" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="py-5">

                            <table class="table caption-top">
                                <caption>Informations de utilisateur</caption>

                                <tbody>
                                    <tr>
                                        <th scope="row">Nom : </th>
                                        <td>{{ $user->photo }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email: </th>
                                        <td>{{ $user->email }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Téléphone : </th>
                                        <td>{{ $user->phone }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Statut: </th>
                                        <td>{{ $user->statut }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Date de creation : </th>
                                        <td>{{ $user->created_at }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pays: </th>
                                        <td>{{ $user->country }} </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Ville : </th>
                                        <td>{{ $user->town }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Date de naissance: </th>
                                        <td>{{ $user->birth_date }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Type de compte: </th>
                                        <td>{{ $user->type }} </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="investi" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="container overflow-hidden">
                            <div class="card table-responsive">
                                <h3>Mes investissements</h3>
                                <table class="table table-striped table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th scope="col-2">Entreprise</th>
                                            <th scope="col-3">Phase</th>
                                            <th scope="col-2">Montant</th>
                                            <th scope="col-2">Qté</th>
                                            <th scope="col-3">Date</th>
                                            <th scope="col-3">Statut</th>
                                            <th scope="col-2">Lire</th>
                                        </tr>
                                    </thead>

                                    @if (isset($invest))
                                        @foreach ($invest as $item)
                                            @if (isset($phase))
                                                @foreach ($phase as $phases)
                                                    @if (isset($enterprises))
                                                        @foreach ($enterprises as $enter)
                                                            <tbody>
                                                                <tr class="table-active">
                                                                    <td>{{ $enter->name_enterprise }}</td>
                                                                    <th>{{ $phases->phase }}</th>
                                                                    <td>{{ $item->total_payer }}</td>
                                                                    <td>{{ $item->nombre_action }}</td>
                                                                    <td>{{ $item->created_at }}</td>
                                                                    <td>{{ $phases->statut_phase }}</td>
                                                                    <td><a class="btn btn-outline-warning"
                                                                            href="{{ asset($user->type) }}">Lire le
                                                                            PDF</a></td>
                                                                </tr>
                                                            </tbody>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @else
                                        <p>Vous n'avez pas encore investis !!!</p>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($user->type === 'ENTERPRISE')
                    <div id="enterprise" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="gy-3">
                                <table class="table caption-top">
                                    <caption>Informations de l'entreprise</caption>

                                    <tbody>
                                        <tr>
                                            <th scope="row">Siren : </th>
                                            <td>{{ $enterprise->siren }} </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email: </th>
                                            <td>{{ $enterprise->commercial_register }} </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">name_enterprise : </th>
                                            <td>{{ $enterprise->name_enterprise }} </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">address: </th>
                                            <td>{{ $enterprise->address }} </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">livres: </th>
                                            <td><a class="btn btn-outline-warning"
                                                    href="{{ asset($enterprise->livres) }}">Lire le
                                                    PDF</a></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">politique : </th>
                                            <td> <a class="btn btn-outline-warning"
                                                    href="{{ asset($enterprise->politique) }}">Lire le
                                                    PDF</a> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">objectif: </th>
                                            <td>{{ $enterprise->objectif }} </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">montant_actuel: </th>
                                            <td>{{ $enterprise->montant_actuel }} </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">web_site: </th>
                                            <td> <a class="btn btn-link" href="{{ $enterprise->web_site }}">
                                                    Visiter le site</a> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">description: </th>
                                            <td>{{ $enterprise->description }} </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-6 p-3 float-right">
                            <a class="btn btn-warning" href="{{ URL::previous() }}">
                                <i class="fas fa-arrow-left"></i> Retour</a>
                            <button type="submit" class="btn btn-danger"> Se déconnecter</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</main>


@include('layouts.footer')
