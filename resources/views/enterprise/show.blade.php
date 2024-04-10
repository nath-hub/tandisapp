<!DOCTYPE html>
<html class="no-js" lang="en">

<body>

    @include('layouts.head')
    @include('layouts.header')
    @include('layouts.headsection')

    <div class="container py-5 d-md-block">
        <div class="row  shadow-lg rounded">
             
            <div class="col-12">
                <div class="gy-5">
                    <table class="table caption-top">
                        <h3>Informations sur l'entreprise</h3>

                        <tbody>
                            <tr>
                                <th scope="row">Siren : </th>
                                <td>{{ $enterprises->siren }} </td>
                            </tr>
                            <tr>
                                <th scope="row">Email: </th>
                                <td>{{ $enterprises->commercial_register }} </td>
                            </tr>
                            <tr>
                                <th scope="row">name_enterprise : </th>
                                <td>{{ $enterprises->name_enterprise }} </td>
                            </tr>
                            <tr>
                                <th scope="row">address: </th>
                                <td>{{ $enterprises->address }} </td>
                            </tr>
                            <tr>
                                <th scope="row">livres: </th>
                                <td><a class="btn btn-outline-warning" href="{{ asset($enterprises->livres) }}">Lire le
                                        PDF</a></td>
                            </tr>

                            <tr>
                                <th scope="row">politique : </th>
                                <td> <a class="btn btn-outline-warning" href="{{ asset($enterprises->politique) }}">Lire
                                        le
                                        PDF</a> </td>
                            </tr>

                            <tr>
                                <th scope="row">objectif: </th>
                                <td>{{ $enterprises->objectif }} </td>
                            </tr>
                            <tr>
                                <th scope="row">montant_actuel: </th>
                                <td>{{ $enterprises->montant_actuel }} </td>
                            </tr>
                            <tr>
                                <th scope="row">web_site: </th>
                                <td> <a class="btn btn-link" href="{{ $enterprises->web_site }}">
                                        Visiter le site</a> </td>
                            </tr>
                            <tr>
                                <th scope="row">description: </th>
                                <td>{{ $enterprises->description }} </td>
                            </tr>

                        </tbody>
                    </table>
                    <div>
                        <a class="tj-primary-btn btn" href="{{ URL::previous() }}">
                            <i class="fas fa-arrow-left"></i> Retour</a>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</body>

@include('layouts.footer')

</html>
