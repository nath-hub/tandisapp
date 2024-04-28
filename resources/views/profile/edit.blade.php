@include('layouts.head')
@include('layouts.header')
@include('layouts.headsection')


<div class="container mt-2 d-none d-md-block">
    <div class="row  shadow-lg rounded">
        <div class="col-5">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <form action="{{ route('users.update', auth()->user()->id) }}" method="POST"
                        enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        @method('PUT')
                        <li class="list-group-item">

                            <div class="user-image-container">
                                <img id="imagePreview" class="rounded-circle" height="200px" width="200px"
                                    src="{{ asset(auth()->user()->photo) }}"
                                    value="{{ auth()->user()->photo }}" /><br />

                                <div class="custom-file-upload py-3">
                                    <button type="button" class="btn btn-success" id="imageUploadButton">Choisir
                                        une image de profil</button>
                                    <input type="file" class="d-none  @error('photo') is-invalid @enderror"
                                        id="imageUpload" name="photo" accept="image/*"
                                        onchange="handleImageUpload(this)">
                                    @if ($errors->has('photo'))
                                        <span class="text-danger text-left">{{ $errors->first('photo') }}</span>
                                    @endif
                                </div>
                                <label for="">
                                    CNI recto : <input type="file" class="@error('cnirecto') is-invalid @enderror"
                                        value="{{ auth()->user()->cnirecto }}" name="cnirecto" accept="image/*">
                                </label>

                                <label for="">
                                    CNI verso : <input type="file" class="@error('cniverso') is-invalid @enderror"
                                        value="{{ auth()->user()->cniverso }}" name="cniverso" accept="image/*">
                                </label>
                            </div>

                        </li>
                        <li class="list-group-item">
                            <button type="submit" class="btn btn-success py-3">Ajouter</button>
                        </li>
                        <li class="list-group-item">
                            <a class="btn btn-success py-3" href="edit">
                                changer mon mot de passe
                            </a>
                        </li>
                       
                    </form>
                </ul>

            </div>
        </div>


        <div class="col-7">
            <form action="{{ route('user-profile-information.update') }}" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method('PUT')
                <div class="card">
                    <h5 class="card-title">Informations de utilisateur</h5>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <th scope="row">Nom : </th>
                            <td>
                                <div class="col">
                                    <div class="form-group border " style="border-radius: 10px;">
                                        <input type="name" placeholder="Noms" class="form-control"
                                            value="{{ old('name') ?? auth()->user()->name }}" required name="name"
                                            aria-describedby="nameHelp">
                                        @if ($errors->has('name'))
                                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </td>
                        </li>
                        <li class="list-group-item">
                            <th scope="row">Email : </th>
                            <td>
                                <div class="col">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') ?? auth()->user()->email }}" required
                                        autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </td>
                        </li>

                        <li class="list-group-item">

                            <th scope="row">Téléphone : </th>
                            <td>
                                <div class="col">
                                    <div class="form-group border " style="border-radius: 10px;">
                                        <input type="number" placeholder="Téléphone" class="form-control"
                                            value="{{ old('phone') ?? auth()->user()->phone }}" name="phone"
                                            aria-describedby="phoneHelp">
                                        @if ($errors->has('phone'))
                                            <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </li>
                        <li class="list-group-item">
                            <th scope="row">Ville : </th>
                            <td>
                                <div class="col">
                                    <div class="form-group border " style="border-radius: 10px;">
                                        <input type="text" placeholder="Ville" name="town" class="form-control"
                                            value="{{ old('town') ?? auth()->user()->town }}"
                                            aria-describedby="townHelp">
                                        @if ($errors->has('town'))
                                            <span class="text-danger text-left">{{ $errors->first('town') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </li>
                        <li class="list-group-item">
                            <th scope="row">Pays: </th>
                            <td>
                                <div class="col">
                                    <div class="form-group border " style="border-radius: 10px;">
                                        <input type="text" placeholder="Pays" class="form-control"
                                            value="{{ old('country') ?? auth()->user()->country }}" name="country"
                                            aria-describedby="countryHelp">
                                        @if ($errors->has('country'))
                                            <span class="text-danger text-left">{{ $errors->first('country') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </li>
                        <li class="list-group-item">
                            <th scope="row">Date de naissance : </th>
                            <td>
                                <div class="col">
                                    <div class="form-group border " style="border-radius: 10px;">
                                        <input type="date" placeholder="Date de naissance" class="form-control"
                                            value="{{ old('birth_date') ?? auth()->user()->birth_date }}"
                                            name="birth_date" aria-describedby="birth_dateHelp">
                                        @if ($errors->has('birth_date'))
                                            <span
                                                class="text-danger text-left">{{ $errors->first('birth_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </li>
                        <li class="list-group-item">
                            <th scope="row">Type de compte : </th>
                            <td>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Type
                                        de compte : </label>
                                    <select class="form-select" name="type" id="inputGroupSelect01">
                                        <option value="{{ old('type') ?? auth()->user()->type }}" selected>
                                            Choissisez...
                                        </option>
                                        <option value="ENTERPRISE">Entreprise</option>
                                        <option value="INVEST">Investisseur</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="text-danger text-left">{{ $errors->first('type') }}</span>
                                    @endif
                                </div>
                            </td>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 p-3 float-right">
                        <button type="submit" class="btn btn-success"> Enregistrer</button>
                    </div>
                    <a class="btn btn-warning" href="/home">
                        <i class="fas fa-arrow-left"></i> Retour</a>
                </div>
            </form>
        </div>

    </div>

</div>



<div class=" d-block d-sm-none">

    <div class="shadow-lg rounded">
        <div class="">
            <div class="row">
                <form action="{{ route('users.update', auth()->user()->id) }}" method="POST"
                    enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    @method('PUT')
                    <div class="col-5">
                        <img id="imagePreview" class="rounded-circle" height="200px" width="200px"
                            src="{{ asset(auth()->user()->photo) }}" value="{{ auth()->user()->photo }}" /><br />

                    </div>
                    <li class="list-group-item">

                        <label for="">
                            Photo profile : <input type="file" class="@error('cniverso') is-invalid @enderror"
                            id="imageUpload" value="{{ auth()->user()->photo }}" name="photo" accept="image/*">
                        </label>
                        <label for="">
                            CNI recto : <input type="file" class="@error('cnirecto') is-invalid @enderror"
                                value="{{ auth()->user()->cnirecto }}" name="cnirecto" accept="image/*">
                        </label>

                        <label for="">
                            CNI verso : <input type="file" class="@error('cniverso') is-invalid @enderror"
                                value="{{ auth()->user()->cniverso }}" name="cniverso" accept="image/*">
                        </label>

                    </li>
                    <button type="submit" class="btn btn-success py-3">Ajouter</button>
                </form>

                <div class="col-7">
                    

                   
                    <div class="py-3">
                        <a class="btn btn-success" href="edit">
                            changer mon mot de passe
                        </a>
                    </div>
                   
                </div>
            </div>


            <div id="profil" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <form action="{{ route('user-profile-information.update') }}" method="POST"
                    enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    @method('PUT')
                    <div class="accordion-body">
                        <div class="py-5">

                            <table class="table caption-top">
                                <caption>Modifier les informations d'un utilisateur</caption>

                                <tbody>
                                    <tr>
                                        <th scope="row">Nom : </th>
                                        <td>
                                            <div class="col">
                                                <div class="form-group border " style="border-radius: 10px;">
                                                    <input type="name" placeholder="Noms" class="form-control"
                                                        value="{{ old('name') ?? auth()->user()->name }}"
                                                        name="name" aria-describedby="nameHelp">
                                                    @if ($errors->has('name'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Email : </th>
                                        <td>
                                            <div class="col">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email"
                                                    value="{{ old('email') ?? auth()->user()->email }}" required
                                                    autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Téléphone : </th>
                                        <td>
                                            <div class="col">
                                                <div class="form-group border " style="border-radius: 10px;">
                                                    <input type="phone" placeholder="Téléphone"
                                                        class="form-control"
                                                        value="{{ old('phone') ?? auth()->user()->phone }}"
                                                        name="phone" aria-describedby="phoneHelp">
                                                    @if ($errors->has('phone'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('phone') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ville : </th>
                                        <td>
                                            <div class="col">
                                                <div class="form-group border " style="border-radius: 10px;">
                                                    <input type="text" placeholder="Ville" name="town"
                                                        class="form-control"
                                                        value="{{ old('town') ?? auth()->user()->town }}"
                                                        aria-describedby="townHelp">
                                                    @if ($errors->has('town'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('town') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pays: </th>
                                        <td>
                                            <div class="col">
                                                <div class="form-group border " style="border-radius: 10px;">
                                                    <input type="text" placeholder="Pays" class="form-control"
                                                        value="{{ old('country') ?? auth()->user()->country }}"
                                                        name="country" aria-describedby="countryHelp">
                                                    @if ($errors->has('country'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('country') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Date de naissance : </th>
                                        <td>
                                            <div class="col">
                                                <div class="form-group border " style="border-radius: 10px;">
                                                    <input type="date" placeholder="Date de naissance"
                                                        class="form-control"
                                                        value="{{ old('birth_date') ?? auth()->user()->birth_date }}"
                                                        name="birth_date" aria-describedby="birth_dateHelp">
                                                    @if ($errors->has('birth_date'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('birth_date') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Type de compte : </th>
                                        <td>
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupSelect01">Type
                                                    de compte : </label>
                                                <select class="form-select" name="type" id="inputGroupSelect01">
                                                    <option value="{{ old('type') ?? auth()->user()->type }}"
                                                        selected>Choissisez...
                                                    </option>
                                                    <option value="ENTERPRISE">Entreprise</option>
                                                    <option value="INVEST">Investisseur</option>
                                                </select>
                                                @if ($errors->has('type'))
                                                    <span
                                                        class="text-danger text-left">{{ $errors->first('type') }}</span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6 p-3 float-right">
                            <button type="submit" class="btn btn-success"> Enregistrer</button>
                            <a class="btn btn-warning" href="/home">
                                <i class="fas fa-arrow-left"></i> Retour</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const imageUpload = document.getElementById('imageUpload');
    const imagePreview = document.getElementById('imagePreview');

    const addFileBtn = document.querySelector('.add-file-btn');

    const imageUploadButton = document.getElementById('imageUploadButton');

    imageUploadButton.addEventListener('click', function() {
        imageUpload.click();
    });

    imageUpload.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>


@include('layouts.footer')
