<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
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
=======
    <title>Contrat d'Investissement - TANDIS-COOP.CA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            width: 655px;
/*            margin-left: 400px;*/
            margin-right: 300px;
            padding: 20px;
            position: relative;
            color: #003;
            border: 1px solid #21a300;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(1, 112, 0, 0.2);
            overflow: hidden;
        }
         
        .content {
            position: relative;
            z-index: 2;
        }
        .background {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('https://raw.githubusercontent.com/nath-hub/tandisapp/devellop/public/assets/images/coop.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0.2; /* Ajustez cette valeur entre 0 et 1 pour l'effet de disparition */
            filter: blur(3px);
            z-index: 1;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 255, 0.2); /* Teinte bleue */
            z-index: 2;
        }
        .content {
            position: relative;
            z-index: 3;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .logo {
            width: 130px;
            height: auto;
        }
        h1 {
            font-size: 28px;
            color: red; /* Green */
>>>>>>> cbe4112 (update)
            text-decoration: underline;
            text-align: center;
        }
        h2 {
            font-size: 22px;
            color: #095228; /* Blue */
            text-decoration: underline;
            margin-top: 30px;
        }
        p, ul {
            margin: 10px 0;
        }
        .contact-info {
            font-weight: bold;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            padding: 5px 0;
/*            color: #FF0000; /* Red */*/
        }
        .signature {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }
        .signature div {
            width: 45%;
            text-align: center;
            color: #008000; /* Green */
        }
        .img{
            height: 200px;
            width: 200px;
        }
        footer {
            text-align: center;
            margin-top: 30px;
        }
<<<<<<< HEAD

=======
>>>>>>> cbe4112 (update)
    </style>
</head>
<body>
  <div class="container">
        <div class="background"></div>
        <div class="overlay"></div>
        <div class="content">
<header>
   <table style="width: 100%; margin-bottom: 3px;">
    <tr>
        <td style="width: 20%; text-align: left; vertical-align: middle;">
            <img src="https://raw.githubusercontent.com/nath-hub/tandisapp/devellop/public/assets/images/im2.png" alt="Logo 1" style="width: 130px; height: auto;">
        </td>
        <td style="width: 60%; text-align: center; vertical-align: middle;">
            <p style="margin: 0; font-size: 12px; line-height: 1.2; color: #095228;">
                TANDIS-COOP.CA<br>
                ENTREPRISE DE PRODUCTION, TRANSFORMATION, DISTRIBUTION<br>
                ET COMMERCIALISATION DES PRODUITS AGRO-PASTORAUX<br>
                Nos produits d'origine camerounaise, 100% naturels respectent toutes les normes environnementales<br>
                Contact : (+237) 698-96-26-15 / 678-79-01-36<br>
                E-mail : tandisinvestment@gmail.com
            </p>
            <h1 style="font-size: 17px;">Contrat d'Investissement</h1>
        </td>
        <td style="width: 20%; text-align: right; vertical-align: middle;">
            <img src="https://raw.githubusercontent.com/nath-hub/tandisapp/devellop/public/assets/images/coop-removebg-preview.png" alt="Logo 2" style="width: 130px; height: auto;">
        </td>
    </tr>
</table>
</header>

<<<<<<< HEAD
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
            <p>Le soussigné détient <strong>{{$action->nombre_action}}</strong> parts dans la société pour un montant total investi de <strong>{{$action->total_payer}}</strong>
                en raison de <strong>{{$action->prix_action}}</strong> l'action</p>
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
=======
<p style="margin: 0; font-size: 13px; line-height: 1.2;">Le présent contrat est signé et prend effet à compter du 2024-08-02 Entre :</p>

<p class="contact-info" style="margin: 0; font-size: 13px; line-height: 1.2;">
    TANDIS-COOP.CA (l’entreprise) et représenté par M. TANANFOUET Pascalo<br>
    E-mail : tandisinvestment@gmail.com<br>
    Tel : (+237) 698-96-26-15<br>
    Siège social : Yaoundé, Cameroun
</p>

<p style="margin: 0; font-size: 13px; line-height: 1.2;">Et :</p>

<p class="contact-info" style="margin: 0; font-size: 13px; line-height: 1.2;">
    {{$user->name}} (L’acheteur), répondant au {{$user->phone}},<br>
    Résidant en/au {{$user->country}},<br>
    E-mail : {{$user->email}}
</p>

<p style="margin: 0; font-size: 13px; line-height: 1.2;">En effet,</p>
>>>>>>> cbe4112 (update)

<p style="margin: 0; font-size: 13px; line-height: 1.2;">
    Le soussigné détient <strong> {{$action->nombre_action}} </strong> parts dans la société pour un montant total investi de <strong>{{$action->total_payer}} franc CFA</strong> en raison de <strong>{{$action->prix_action}} franc CFA</strong> l'action.
</p><br>

<<<<<<< HEAD
            <div class="align">
                <p class="date">Fait à yaounde, le {{$data->created_at}}</p>
            </div>

            <div class="align">
                <p class="invest">L'investisseur</p>

                <br> <br> <br>

                <p style="color:#037b13;">Societe Cooperative avec Conseil d'administration</p>
                <p style="color:#037b13;">Tandis COOP-CA</p>
                <p style="color:#037b13;">N : 24/042/CMR/IJ/01/004/CCA/002004/002004001</p>
                <p style="color:#037b13;">Siege social : Douala-Cameroun</p>
            </div>
=======
<p style="margin: 0; font-size: 13px; line-height: 1.2;">
    En signant le présent contrat de souscription, le soussigné reconnaît que la société se fonde sur l’exactitude et l’intégrité du respect de ses obligations prévues par les lois sur les titres applicables en la matière.
</p>

<p style="margin: 0; font-size: 13px; line-height: 1.2;">
    Le soussigné reconnaît et atteste par ailleurs qu’il a lu le livre projet, la politique d’achat et détention des parts, et ainsi que tout document ou information en complémentaire.
</p>
>>>>>>> cbe4112 (update)

<h2 style="font-size: 15px;">Conditions générales :</h2>

<<<<<<< HEAD
                <p class="enter">L'entreprise</p>
                <img class="img" src="https://raw.githubusercontent.com/nath-hub/tandisapp/devellop/public/assets/images/signa.png" alt="" />
            </div>

            <div class="space"></div>
        </div>
    </div>

</body>

=======
<ul style="margin: 0; font-size: 13px; line-height: 1.2;">
    <li>L’Entreprise s’engage à utiliser les fonds investis conformément à son plan d’affaires et à informer régulièrement l’Investisseur de l’avancement du projet.</li>
    <li>L’Investisseur reconnaît avoir pris connaissance des risques liés à cet investissement et accepte de les assumer.</li>
    <li>Tout litige découlant de ce contrat sera soumis à la juridiction compétente du tribunal de Yaoundé / Cameroun.</li>
</ul>

<p style="margin: 0; font-size: 12px; line-height: 1.2;">Fait à Yaoundé, le 2024-08-09</p>

 
<div style="margin-top: 10px; width: 100%;">
    <div style="float: left; width: 45%; text-align: center; color: #095228;">
        <p style="font-size: 12px;">L'Investisseur</p>
        <p style="font-size: 12px;">{{$user->name}}</p>
        <!-- <img src="" alt="Signature Investisseur" style="height: 200px; width: 200px;"> -->
    </div>
    <div style="float: right; width: 45%; text-align: center; color: #095228;">
        <p style="font-size: 12px;">L'Entreprise</p>
        <p style="font-size: 12px;">TANANFOUET Pascalo</p>
        <img src="https://raw.githubusercontent.com/nath-hub/tandisapp/devellop/public/assets/images/signa-removebg-preview.png" alt="Signature Entreprise" style="height: 130px; width: 150px;">
    </div>
</div>
<div style="clear: both;"></div>

<footer style="margin: 0; font-size: 12px; line-height: 1.2;">
    <p>Société Coopérative avec Conseil d'administration Tandis COOP-CA</p>
    <p>N : 24/042/CMR/IJ/01/004/CCA/002004/002004001</p>
    <p>Siège social : Yaoundé, Cameroun</p>
</footer>
 </div>
    </div>
</body>
>>>>>>> cbe4112 (update)
</html>