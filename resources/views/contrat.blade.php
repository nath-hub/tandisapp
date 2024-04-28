<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrat</title>
</head>

<body>
    <style>
        body {
            padding: 20px;
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
            -webkit-font-smoothing: antialiased;
            background-color: #037b13;
            display: flex;
            justify-content: center;
        }

        .cart {
            height: auto;
            background: #ebeaea;
            padding: 5vh;
            margin-top: 5vh;
            max-width: 110vh;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #21a300;
            border-radius: 10px;
        }

        .align {
            text-align: justify;
        }

        .invest {
            text-align: left;
        }

        .enter {
            text-align: right;
            margin-top: -5vh;
        }

        .date {
            text-align: right;
        }

        .img {
            float: right;
            width: 200px;
            height: 100px;
        }
    </style>

    <div class="cart">
        <img src="https://raw.githubusercontent.com/nath-hub/tandisapp/devellop/public/assets/images/im2.png"
            height="100px" width="100px" alt="">
        <h3 style="color: rgb(255, 0, 0); text-align:center; text-decoration: underline;"> <strong>Contrat
                d'investissement</strong> </h3><br>
        <p>Le present contrat est signé et prend effet à compter du 2023-05-02u</p>
        <p>Entre :</p>
        <p><strong>TANDIS-INVEST</strong> (l’entreprise) et représenté par <strong>NGOUGOURE NGAPOUT Jamiilah</strong>
            d'adresse mail <strong>jamiilahngapout7@gmail.com</strong> et de numéro <strong>696340823</strong> , dont le
            siège social est
            au/en <strong>Cameroon (Cameroun)</strong></p>
        <p>Et :</p>
        <p><strong>{{ $user->name }}</strong> (L’acheteur), résidant en/au Cameroun et de
            matricule<strong>dd5649b0cc3293f6cca9a98ff00d1bf5</strong></p>
        <p>En effet,</p>
        <p>Le soussigné détient <strong>106</strong> parts dans la société</p>
        <p>En signant le présent contrat de souscription, le soussigné reconnait que la société se fonde sur
            l’exactitude et l’intégrité du respect de ses obligations prévues par les lois sur les titres applicables
            en la matière.</p>
        <p>Le soussigné reconnait et atteste par ailleurs qu’il a lu le livre projet, la politique d’achat et
            détention des parts, et ainsi que tout document ou information en complémentaire.</p>
        <div>
            <ul>
              <h3> Conditions générales :</h3>  
                <li>
                    L’Entreprise s’engage à utiliser les fonds investis conformément à son plan d’affaires et à informer
                    régulièrement l’Investisseur de l’avancement du projet.
                </li>
                <li>
                    L’Investisseur reconnaît avoir pris connaissance des risques liés à cet investissement et accepte de
                    les assumer.
                </li>
                <li>
                    Tout litige découlant de ce contrat sera soumis à la juridiction compétente du tribunal de [ville /
                    pays].
                </li>

            </ul>
        </div>

        <div class="align">
            <p class="date">Fait à {{ $enterprise->address }}, le {{ $data->created_at }}</p>
        </div>

        <div class="align">
            <p class="invest">L'investisseur</p>
        </div>

        <div class="align">

            <p class="enter">L'entreprise</p>
            <img class="img" src="{{ asset('assets/images/sign.png') }}" alt="">
        </div>
</body>

</html>
