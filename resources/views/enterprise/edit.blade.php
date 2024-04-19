<body>

    @include('layouts.head')
    @include('layouts.header')
    @include('layouts.headsection')


    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Modifier les informations de l'entreprise</h4>
                </div>

            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('enterprise.update', $enterprise->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="container py-5 d-none d-md-block">
                <div class="row  shadow-lg rounded">

                    <div class="col-12">
                        <div>
                            <div class="accordion-body">
                                <div class="gy-3">
                                    <caption>Modifier les informations de l'entreprise</caption>

                                    <table class="table caption-top">

                                        {{-- <div class="user-image-container">
                                            <img id="imagePreview" class="rounded-circle" height="200px" width="200px"
                                                src="{{ $enterprise->image }}" value="{{ $enterprise->image }}" /><br />

                                            <div class="custom-file-upload py-3">
                                                <button type="button" class="btn btn-success"
                                                    id="imageUploadButton">Choisir
                                                    une image de couverture</button>
                                                <input type="file"
                                                    class="d-none  @error('imageS') is-invalid @enderror"
                                                    id="imageUpload" name="images" accept="image/*"
                                                    onchange="handleImageUpload(this)">
                                                @if ($errors->has('images'))
                                                    <span class="text-danger text-left">{{ $errors->first('images') }}</span>
                                                @endif
                                            </div>
                                        </div> --}}

                                        <div class="user-image-container">
                                            <img id="imagePreview" class="rounded-circle" height="200px" width="200px"
                                                src="{{ asset($enterprise->image) }}"
                                                value="{{ $enterprise->image }}" /><br />
            
                                            <div class="custom-file-upload py-3">
                                                <button type="button" class="btn btn-success" id="imageUploadButton">Choisir
                                                    une image de couverture</button>
                                                <input type="file" class="d-none  @error('photo') is-invalid @enderror"
                                                    id="imageUpload" name="photo" accept="image/*"
                                                    onchange="handleImageUpload(this)">
                                                @if ($errors->has('photo'))
                                                    <span class="text-danger text-left">{{ $errors->first('photo') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <tbody>
                                            <tr>
                                                <th scope="row">siren : </th>
                                                <td>
                                                    <div class="col-12">
                                                        <div class="form-group border " style="border-radius: 10px;">
                                                            <input type="text" placeholder="siren"
                                                                class="form-control" value="{{ $enterprise->siren }}"
                                                                name="sirens" aria-describedby="sirensHelp">
                                                            @if ($errors->has('sirens'))
                                                                <span
                                                                    class="text-danger text-left">{{ $errors->first('sirens') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">register commercial : </th>
                                                <td>
                                                    <div class="col-12">
                                                        <div class="form-group border " style="border-radius: 10px;">
                                                            <input type="commercial_register"
                                                                placeholder="commercial_register" class="form-control"
                                                                value="{{ $enterprise->commercial_register }}"
                                                                name="commercial_registers">
                                                            @if ($errors->has('commercial_registers'))
                                                                <span
                                                                    class="text-danger text-left">{{ $errors->first('commercial_registers') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">nom enterprise : </th>
                                                <td>
                                                    <div class="col-12">
                                                        <div class="form-group border " style="border-radius: 10px;">
                                                            <input type="text" placeholder="name_enterprise"
                                                                class="form-control"
                                                                value="{{ $enterprise->name_enterprise }}"
                                                                name="name_enterprises"
                                                                aria-describedby="name_enterprisesHelp">
                                                            @if ($errors->has('name_enterprises'))
                                                                <span
                                                                    class="text-danger text-left">{{ $errors->first('name_enterprises') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">address: </th>
                                                <td>
                                                    <div class="col-12">
                                                        <div class="form-group border " style="border-radius: 10px;">
                                                            <input type="text" placeholder="address"
                                                                class="form-control" value="{{ $enterprise->address }}"
                                                                name="addres" aria-describedby="addresHelp">
                                                            @if ($errors->has('addres'))
                                                                <span
                                                                    class="text-danger text-left">{{ $errors->first('addres') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">livres : </th>
                                                <td>
                                                    <div class="col-12">
                                                        <div class="form-group border " style="border-radius: 10px;">
                                                            @if (!empty($enterprise->livres))
                                                                <a class="btn btn-outline-warning"
                                                                    href="{{ url($enterprise->livres) }}">Lire le
                                                                    PDF</a>
                                                            @endif
                                                            <input type="file" placeholder="livres"
                                                                class="form-control" value="{{ $enterprise->livres }}"
                                                                name="livress" accept=".pdf"
                                                                aria-describedby="livressHelp">
                                                            @if ($errors->has('livress'))
                                                                <span
                                                                    class="text-danger text-left">{{ $errors->first('livress') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Politique : </th>
                                                <td>
                                                    <div class="col-12">
                                                        <div class="form-group border " style="border-radius: 10px;">
                                                            @if (!empty($enterprise->politique))
                                                                <a class="btn btn-outline-warning"
                                                                    href="{{ asset($enterprise->politique) }}">Lire le
                                                                    PDF</a>
                                                            @endif

                                                            <input type="file" placeholder="politique"
                                                                class="form-control"
                                                                value="{{ $enterprise->politique }}" name="politiques"
                                                                aria-describedby="politiquesHelp">
                                                            @if ($errors->has('politiques'))
                                                                <span
                                                                    class="text-danger text-left">{{ $errors->first('politiques') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">objectif : </th>
                                                <td>
                                                    <div class="col-12">
                                                        <div class="form-group border " style="border-radius: 10px;">
                                                            <input type="number" placeholder="objectif"
                                                                class="form-control"
                                                                value="{{ $enterprise->objectif }}" name="objectifs"
                                                                aria-describedby="objectifsHelp">
                                                            @if ($errors->has('objectifs'))
                                                                <span
                                                                    class="text-danger text-left">{{ $errors->first('objectifs') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">montant actuel : </th>
                                                <td>
                                                    <div class="col-12">
                                                        <div class="form-group border " style="border-radius: 10px;">
                                                            <input type="number" placeholder="montant actuel"
                                                                class="form-control"
                                                                value="{{ $enterprise->montant_actuel }}"
                                                                name="montant_actuels"
                                                                aria-describedby="montant_actuelsHelp">
                                                            @if ($errors->has('montant_actuels'))
                                                                <span
                                                                    class="text-danger text-left">{{ $errors->first('montant_actuels') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">Prix d'une action : </th>
                                                <td>
                                                    <div class="col-12">
                                                        <div class="form-group border " style="border-radius: 10px;">
                                                            <input type="number" placeholder="Prix d'une action"
                                                                class="form-control"
                                                                value="{{ $enterprise->prix_action }}"
                                                                name="prix_action">
                                                            @if ($errors->has('prix_action'))
                                                                <span
                                                                    class="text-danger text-left">{{ $errors->first('prix_action') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">Nombre d'action : </th>
                                                <td>
                                                    <div class="col-12">
                                                        <div class="form-group border " style="border-radius: 10px;">
                                                            <input type="number" placeholder="Nombre d'action"
                                                                class="form-control"
                                                                value="{{ $enterprise->nombre_action }}"
                                                                name="nombre_action">
                                                            @if ($errors->has('nombre_action'))
                                                                <span
                                                                    class="text-danger text-left">{{ $errors->first('nombre_action') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">site web : </th>
                                                <td>
                                                    <div class="col-12">
                                                        <div class="form-group border " style="border-radius: 10px;">
                                                            <input type="text" placeholder="site web"
                                                                class="form-control"
                                                                value="{{ $enterprise->web_site }}" name="web_sites"
                                                                aria-describedby="web_sitesHelp">
                                                            @if ($errors->has('web_sites'))
                                                                <span
                                                                    class="text-danger text-left">{{ $errors->first('web_sites') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">description : </th>
                                                <td>
                                                    <div class="col-12">
                                                        <div class="form-group border " style="border-radius: 10px;">
                                                            <input type="text" placeholder="description"
                                                                class="form-control"
                                                                value="{{ $enterprise->description }}"
                                                                name="descriptions"
                                                                aria-describedby="descriptionsHelp">
                                                            @if ($errors->has('descriptions'))
                                                                <span
                                                                    class="text-danger text-left">{{ $errors->first('descriptions') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 p-3 float-right">
                                <button type="submit" class="btn btn-success"> Enregistrer</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class=" d-block d-sm-none">
                <div class="shadow-lg rounded">
                    <div class="">
                        <div class="row">

                            <div id="profil" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="user-image-container">
                                        <img id="imagePreview" class="rounded-circle" height="200px" width="200px"
                                            src="{{ $enterprise->image }}" value="{{ $enterprise->image }}" /><br />

                                        <div class="custom-file-upload py-3">
                                            <button type="button" class="btn btn-success"
                                                id="imageUploadButton">Choisir
                                                une image de couverture</button>
                                            <input type="file"
                                                class="d-none  @error('image') is-invalid @enderror"
                                                id="imageUpload" name="image" accept="image/*"
                                                onchange="handleImageUpload(this)">
                                            @if ($errors->has('image'))
                                                <span
                                                    class="text-danger text-left">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="py-5">

                                        <table class="table caption-top">
                                            <caption>Modifier les informations d'une entreprise</caption>

                                            <tbody>
                                                <tr>
                                                    <th scope="row">siren : </th>
                                                    <td>
                                                        <div class="col-12">
                                                            <div class="form-group border "
                                                                style="border-radius: 10px;">
                                                                <input type="siren" placeholder="siren"
                                                                    class="form-control"
                                                                    value="{{ $enterprise->siren }}" name="siren"
                                                                    aria-describedby="sirenHelp">
                                                                @if ($errors->has('siren'))
                                                                    <span
                                                                        class="text-danger text-left">{{ $errors->first('siren') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">register commercial : </th>
                                                    <td>
                                                        <div class="col-12">
                                                            <div class="form-group border "
                                                                style="border-radius: 10px;">
                                                                <input type="commercial_register"
                                                                    placeholder="commercial_register"
                                                                    class="form-control"
                                                                    value="{{ $enterprise->commercial_register }}"
                                                                    name="commercial_register"
                                                                    aria-describedby="commercial_registerHelp">
                                                                @if ($errors->has('commercial_register'))
                                                                    <span
                                                                        class="text-danger text-left">{{ $errors->first('commercial_register') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">nom enterprise : </th>
                                                    <td>
                                                        <div class="col-12">
                                                            <div class="form-group border "
                                                                style="border-radius: 10px;">
                                                                <input type="text" placeholder="name_enterprise"
                                                                    class="form-control"
                                                                    value="{{ $enterprise->name_enterprise }}"
                                                                    name="name_enterprise"
                                                                    aria-describedby="name_enterpriseHelp">
                                                                @if ($errors->has('name_enterprise'))
                                                                    <span
                                                                        class="text-danger text-left">{{ $errors->first('name_enterprise') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">address: </th>
                                                    <td>
                                                        <div class="col-12">
                                                            <div class="form-group border "
                                                                style="border-radius: 10px;">
                                                                <input type="text" placeholder="address"
                                                                    class="form-control"
                                                                    value="{{ $enterprise->address }}" name="address"
                                                                    aria-describedby="addressHelp">
                                                                @if ($errors->has('address'))
                                                                    <span
                                                                        class="text-danger text-left">{{ $errors->first('address') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">livres : </th>
                                                    <td>
                                                        <div class="col-12">
                                                            <div class="form-group border "
                                                                style="border-radius: 10px;">
                                                                @if (!empty($enterprise->livres))
                                                                    <a class="btn btn-outline-warning"
                                                                        href="{{ url($enterprise->livres) }}">Lire le
                                                                        PDF</a>
                                                                @endif
                                                                <input type="file" placeholder="livres"
                                                                    class="form-control"
                                                                    value="{{ $enterprise->livres }}" name="livres"
                                                                    accept=".pdf" aria-describedby="livresHelp">
                                                                @if ($errors->has('livres'))
                                                                    <span
                                                                        class="text-danger text-left">{{ $errors->first('livres') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Politique : </th>
                                                    <td>
                                                        <div class="col-12">
                                                            <div class="form-group border "
                                                                style="border-radius: 10px;">
                                                                @if (!empty($enterprise->politique))
                                                                    <a class="btn btn-outline-warning"
                                                                        href="{{ asset($enterprise->politique) }}">Lire
                                                                        le
                                                                        PDF</a>
                                                                @endif

                                                                <input type="file" placeholder="politique"
                                                                    class="form-control"
                                                                    value="{{ $enterprise->politique }}"
                                                                    name="politique" aria-describedby="politiqueHelp">
                                                                @if ($errors->has('politique'))
                                                                    <span
                                                                        class="text-danger text-left">{{ $errors->first('politique') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">objectif : </th>
                                                    <td>
                                                        <div class="col-12">
                                                            <div class="form-group border "
                                                                style="border-radius: 10px;">
                                                                <input type="number" placeholder="objectif"
                                                                    class="form-control"
                                                                    value="{{ $enterprise->objectif }}"
                                                                    name="objectif" aria-describedby="objectifHelp">
                                                                @if ($errors->has('objectif'))
                                                                    <span
                                                                        class="text-danger text-left">{{ $errors->first('objectif') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">montant actuel : </th>
                                                    <td>
                                                        <div class="col-12">
                                                            <div class="form-group border "
                                                                style="border-radius: 10px;">
                                                                <input type="number" placeholder="montant actuel"
                                                                    class="form-control"
                                                                    value="{{ $enterprise->montant_actuel }}"
                                                                    name="montant_actuel"
                                                                    aria-describedby="montant_actuelHelp">
                                                                @if ($errors->has('montant_actuel'))
                                                                    <span
                                                                        class="text-danger text-left">{{ $errors->first('montant_actuel') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th scope="row">Prix d'une action : </th>
                                                    <td>
                                                        <div class="col-12">
                                                            <div class="form-group border "
                                                                style="border-radius: 10px;">
                                                                <input type="number" placeholder="Prix d'une action"
                                                                    class="form-control"
                                                                    value="{{ $enterprise->prix_action }}"
                                                                    name="prix_actions">
                                                                @if ($errors->has('prix_actions'))
                                                                    <span
                                                                        class="text-danger text-left">{{ $errors->first('prix_actions') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">Nombre d'action : </th>
                                                    <td>
                                                        <div class="col-12">
                                                            <div class="form-group border "
                                                                style="border-radius: 10px;">
                                                                <input type="number" placeholder="Nombre d'action"
                                                                    class="form-control"
                                                                    value="{{ $enterprise->nombre_action }}"
                                                                    name="nombre_actions">
                                                                @if ($errors->has('nombre_actions'))
                                                                    <span
                                                                        class="text-danger text-left">{{ $errors->first('nombre_actions') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">site web : </th>
                                                    <td>
                                                        <div class="col-12">
                                                            <div class="form-group border "
                                                                style="border-radius: 10px;">
                                                                <input type="text" placeholder="site web"
                                                                    class="form-control"
                                                                    value="{{ $enterprise->web_site }}"
                                                                    name="web_site" aria-describedby="web_siteHelp">
                                                                @if ($errors->has('web_site'))
                                                                    <span
                                                                        class="text-danger text-left">{{ $errors->first('web_site') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">description : </th>
                                                    <td>
                                                        <div class="col-12">
                                                            <div class="form-group border "
                                                                style="border-radius: 10px;">
                                                                <input type="text" placeholder="description"
                                                                    class="form-control"
                                                                    value="{{ $enterprise->description }}"
                                                                    name="description"
                                                                    aria-describedby="descriptionHelp">
                                                                @if ($errors->has('description'))
                                                                    <span
                                                                        class="text-danger text-left">{{ $errors->first('description') }}</span>
                                                                @endif
                                                            </div>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </form>
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

</body>


@include('layouts.footer')
