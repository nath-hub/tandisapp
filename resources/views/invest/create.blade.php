<!DOCTYPE html>
<html class="no-js" lang="en">

<body>
    @include('layouts.head')
    @include('layouts.header')
    @include('layouts.headsection')


    <div class="container py-5 d-none d-md-block">
        <div class="text-center shadow-lg rounded">

            <form action="{{ route('invest.store', ['enterprise' => $enterprise->id]) }}" method="POST">
                @csrf
                <div class="gy-3">
                    <table class="table caption-top">
                        <h3 class="text-center text-success font-weight-bold mb-4">Investir dans
                            <strong> {{ $enterprise->name_enterprise }}</strong>
                        </h3>

                        <tbody>
                            <tr>
                                <th scope="row">Nom : </th>
                                <td>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="form-group border " style="border-radius: 10px;">
                                                <input type="name" placeholder="Noms" class="form-control"
                                                    name="name" disabled value="{{ $user->name }}">
                                                @if ($errors->has('name'))
                                                    <span
                                                        class="text-danger text-left">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group border " style="border-radius: 10px;">
                                                <input type="text" placeholder="Email " class="form-control"
                                                    name="email" disabled aria-describedby="emailHelp"
                                                    value="{{ $user->email }}">
                                                @if ($errors->has('email'))
                                                    <span
                                                        class="text-danger text-left">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col-2">Téléphone : </th>
                                <td>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="form-group border " style="border-radius: 10px;">
                                                <input type="number" placeholder="Téléphone" class="form-control"
                                                    name="phone" disabled value="{{ $user->phone }}">
                                                @if ($errors->has('phone'))
                                                    <span
                                                        class="text-danger text-left">{{ $errors->first('phone') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group border " style="border-radius: 10px;">
                                                <input type="text" placeholder="{{ $enterprise->name_enterprise }}"
                                                    class="form-control" name="enterprise_id" disabled
                                                    value=" {{ $enterprise->name_enterprise }}">
                                                @if ($errors->has('name_enterprise'))
                                                    <span
                                                        class="text-danger text-left">{{ $errors->first('name_enterprise') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Prix d'une action : </th>
                                <td>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="form-group border " style="border-radius: 10px;">
                                                <input type="number" placeholder="Prix d'une action" id="unitPrice"
                                                    value="{{ $phase->prix_action }}" disabled class="form-control"
                                                    name='prix_action'>
                                                @if ($errors->has('prix_action'))
                                                    <span
                                                        class="text-danger text-left">{{ $errors->first('prix_action') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group border " style="border-radius: 10px;">
                                                <input type="number" placeholder="Prix total a payer" id="totalPrice"
                                                    class="form-control" name="total_payer"
                                                    onchange="calculatePriceUnity()">
                                                @if ($errors->has('total_payer'))
                                                    <span
                                                        class="text-danger text-left">{{ $errors->first('total_payer') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Nombre d'action : </th>
                                <td>
                                    <div class="col-5">
                                        <div class="form-group border " style="border-radius: 10px;">
                                            <input type="number" placeholder="Nombre d'action" class="form-control"
                                                name="nombre_action" id="quantity" onchange="calculateTotalPrice()">
                                            @if ($errors->has('nombre_action'))
                                                <span
                                                    class="text-danger text-left">{{ $errors->first('nombre_action') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                    <div class="row">
                        <div class="col-md-6 p-3 float-right">
                            <button type="submit" class="btn btn-success"> Aller au paiement</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class=" d-block d-sm-none">
        <div class="shadow-lg rounded">

            <form action="{{ route('invest.store', ['enterprise' => $enterprise->id]) }}" method="POST">
                @csrf
                <div class="gy-3">
                    <table class="table caption-top">
                        <h3 class="text-center text-success font-weight-bold mb-4">Investir dans </h3>
                        <tbody>
                            <tr>
                                <th scope="row">Nom : </th>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group border " style="border-radius: 10px;">
                                                <input type="name" placeholder="Noms" class="form-control"
                                                    name="name" disabled value="{{ $user->name }}">
                                                @if ($errors->has('name'))
                                                    <span
                                                        class="text-danger text-left">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Email : </th>
                                <td>
                                    <div class="col">
                                        <div class="form-group border " style="border-radius: 10px;">
                                            <input type="email" disabled id="disabledTextInput" placeholder="Email "
                                                class="form-control" name="email" value="{{ $user->email }}">
                                            @if ($errors->has('email'))
                                                <span
                                                    class="text-danger text-left">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </td> 
                            </tr>
                            <tr>
                                <th scope="col-5">Téléphone : </th>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group border " style="border-radius: 10px;">
                                                <input type="number" disabled placeholder="Téléphone"
                                                    class="form-control" name="phone" value="{{ $user->phone }}">
                                                @if ($errors->has('phone'))
                                                    <span
                                                        class="text-danger text-left">{{ $errors->first('phone') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col-2">Entreprise</th>
                                <td>
                                    <div class="col">
                                        <div class="form-group border " style="border-radius: 10px;">
                                            <input type="text" placeholder="Entreprise" class="form-control"
                                                name="name_enterprise" disabled value="{{ $enterprise->name_enterprise }}">
                                            @if ($errors->has('name_enterprise'))
                                                <span
                                                    class="text-danger text-left">{{ $errors->first('name_enterprise') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Prix d'une action : </th>
                                <td>
                                    <div class="col">
                                        <div class="form-group border " style="border-radius: 10px;">
                                            <input type="number" placeholder="Prix d'une action" id="unitPrice"
                                                value="{{ $phase->prix_action }}" disabled class="form-control"
                                                name='prix_action'>
                                            @if ($errors->has('prix_action'))
                                                <span
                                                    class="text-danger text-left">{{ $errors->first('prix_action') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Prix total</th>
                                <td>
                                    <div class="col">
                                        <div class="form-group border " style="border-radius: 10px;">
                                            <input type="number" placeholder="Prix total a payer" id="totalPrice"
                                                class="form-control" name="total_payer"
                                                onchange="calculatePriceUnity()">
                                            @if ($errors->has('total_payer'))
                                                <span
                                                    class="text-danger text-left">{{ $errors->first('total_payer') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Nombre d'action : </th>
                                <td>
                                    <div class="col">
                                        <div class="form-group border " style="border-radius: 10px;">
                                            <input type="number" placeholder="Nombre d'action" class="form-control"
                                                name="nombre_action" id="quantity" onchange="calculateTotalPrice()">
                                            @if ($errors->has('nombre_action'))
                                                <span
                                                    class="text-danger text-left">{{ $errors->first('nombre_action') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-6 p-3 float-right">
                            <button type="submit" class="btn btn-success"> Aller au paiement</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



    @include('layouts.footer')

</body>
<script>
    function calculateTotalPrice() {
        let quantite = Number(document.getElementById("quantity").value);

        let prix = Number(document.getElementById("unitPrice").value);

        let total = Number(quantite * prix);
        document.getElementById("totalPrice").value = total;
    }

    function calculatePriceUnity() {
        let quantite = Number(document.getElementById("unitPrice").value);

        let prix = Number(document.getElementById("totalPrice").value);

        let total = Number(prix / quantite);
        document.getElementById("quantity").value = total;
    }
</script>

</html>
