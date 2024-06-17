<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Contrat</title>
</head>

<body>
    <style>
        body {
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
            -webkit-font-smoothing: antialiased;
            /* background-color: #037b13; */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 700px !important;
        }

        .cart {
            padding: 3vh;
            padding-top: 150vh;
            margin-top: 100vh;
            max-width: 250vh;
            width: 150vh;
            border: 1px solid #21a300;
            position: relative;
            padding-bottom: 50vh;
            margin-bottom: 100vh;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(7, 112, 0, 0.2);
        }

        .align {
            text-align: justify;
        }

        .invest {
            text-align: left;
        }

        .enter {
            text-align: right;
            margin-top: -10%;
        }

        .space {
            padding-bottom: 100px;
        }

        .date {
            text-align: right;
        }

        .img {
            float: right;
            width: 200px;
            height: 100px;
        }

        hr {
            height: 2px;
            background-color: rgb(21, 125, 0);
            border: none;
        }

        .conteneur {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .image {
            width: 100px;
            height: auto;
        }

        .images {
            width: 100px;
            height: auto;
            margin-top: -10%;
        }

        .texte {
            text-align: center;
        }

        .card-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://raw.githubusercontent.com/nath-hub/tandisapp/devellop/public/assets/images/coop.png');
            background-size: cover;
            background-repeat: repeat;
            background-position: center;
            z-index: 1;
        }

        .card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(209, 212, 255, 0.8);
            z-index: 1;
        }

        .card-content {
            position: relative;
            z-index: 2;
            /* color: rgb(2, 1, 1); */
            /* text-align: center; */
            padding: 30px;
        }

        h3 {
            color: #037b13;
            text-decoration: underline;
        }

    </style>

    <div class="cart">


        <div class="card-background"></div>
        <div class="card-overlay"></div>
        <div class="card-content">

            <div class="conteneur">
                <img src="https://raw.githubusercontent.com/nath-hub/tandisapp/devellop/public/assets/images/im2.png" alt="Image gauche" class="image" />
                <div class="texte">
                    <h3>TANDIS-COOP.CA</h3>
                    <P style="font-size: 0.7em; font-weight: bold; color: #037b13;">ENTREPRISE DE PRODUCTION, TRANSFORMATION, DISTRIBUTION</P>
                    <P style="font-size: 0.7em; font-weight: bold; color: #037b13;">ET COMMERCIALISATION DES PRODUITS AGRO-PASTORAUX</p>
                    <P style="font-size: 0.6em; font-weight: bold; color: #037b13;">Nos produits d'origine camerounaise, 100% naturels respectent toutes les normes environnementales</P>
                    <P style="font-size: 0.6em; font-weight: bold; color: #037b13;">Contact : (+237) 698-96-26-15 / 678-79-01-36 </P>
                    <P style="font-size: 0.6em; font-weight: bold; color: #037b13;">E-mail : tandisinvestment@gmail.com </P>
                </div>

                <img src="https://raw.githubusercontent.com/nath-hub/tandisapp/devellop/public/assets/images/coop.png" alt="Image droite" class="images" />
            </div>

            

            <hr>

            <h3 style="color: rgb(255, 0, 0); text-align:center; text-decoration: underline;">
                <strong>Contrat
                    d'investissement</strong>
            </h3><br>
            <p>Le present contrat est signé et prend effet à compter du 2023-05-02 Entre :</p>
            <p></p>
            <p><strong>TANDIS-COOP.CA</strong> (l’entreprise) et représenté par <strong>M. TANANFOUET Pascalo</strong>
                d'adresse mail <strong>tandisinvestment@gmail.com</strong> et de numéro <strong>698962615</strong> ,
                dont le
                siège social est
                au/en <strong>Yaoundé Cameroon</strong></p>
            <p>Et :</p>
            <p><strong> {{$user->name}} </strong> (L’acheteur), repondant au {{$user->phone}}, résidant en/au {{$user->country}} et d'adresse
                <strong>{{$user->email}}</strong>
            </p>
            <p>En effet,</p>
            <p>Le soussigné détient <strong>{{$data->nombre_action}}</strong> parts dans la société pour un montant total investi de <strong>{{$data->total_payer}}</strong>
                en raison de <strong>{{$data->prix_action}}</strong> l'action</p>
            <p>En signant le présent contrat de souscription, le soussigné reconnait que la société se fonde sur
                l’exactitude et l’intégrité du respect de ses obligations prévues par les lois sur les titres
                applicables
                en la matière.</p>
            <p>Le soussigné reconnait et atteste par ailleurs qu’il a lu le livre projet, la politique d’achat et
                détention des parts, et ainsi que tout document ou information en complémentaire.</p>
            <div>
                <ul>
                    <h3> Conditions générales :</h3>
                    <li>
                        L’Entreprise s’engage à utiliser les fonds investis conformément à son plan d’affaires et à
                        informer
                        régulièrement l’Investisseur de l’avancement du projet.
                    </li>
                    <li>
                        L’Investisseur reconnaît avoir pris connaissance des risques liés à cet investissement et
                        accepte de
                        les assumer.
                    </li>
                    <li>
                        Tout litige découlant de ce contrat sera soumis à la juridiction compétente du tribunal de
                        [{{$user->town}} / {{$user->country}}].
                    </li>

                </ul>
            </div>

            <div class="align">
                <p class="date">Fait à yaounde, le {{$data->created_at}}</p>
            </div>

            <div class="align">
                <p class="invest">L'investisseur</p>
            </div>

            <div class="align">

                <p class="enter">L'entreprise</p>
                <img class="img" src="https://raw.githubusercontent.com/nath-hub/tandisapp/devellop/public/assets/images/sign.png" alt="" />
            </div>

            <div class="space"></div>
        </div>
    </div>

</body>

</html>