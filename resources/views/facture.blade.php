<!DOCTYPE html>
<html lang="en, id">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    A Simple Invoice Template Responsive and clean with HTML CSS SCSS
  </title>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/invoice.css" />
</head>

<body>
  <style>
    @import "https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap";

    * {
      margin: 0 auto;
      padding: 0 auto;
      user-select: none;
    }

    body {
      padding: 20px;
      font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
      -webkit-font-smoothing: antialiased;
      background-color: #037b13;
    }

    .wrapper-invoice {
      display: flex;
      justify-content: center;
    }

<<<<<<< HEAD
/*# sourceMappingURL=invoice.css.map */
    </style>
    <section class="wrapper-invoice">
      <!-- switch mode rtl by adding class rtl on invoice class -->
      <div class="invoice">
        <div class="invoice-information">
          <p><b>Invoice</b> : #LL93784</p>
          <p><b>Created Date </b>: {{$data->created_at}}</p> 
        </div> 
          <div class="invoice-logo-brand"> 
          <img src="https://raw.githubusercontent.com/nath-hub/tandisapp/devellop/public/assets/images/im2.png" alt="Image gauche" class="image" />
        </div>  
        <!-- invoice head -->
        <div class="invoice-head">
          <div class="head client-info">
            <p></p>
            <p>Happy Yaoundé - Cameroun</p>
            <p>tandisinvestment@gmail.com</p>
            <p>+(237) 698 962 615</p>
          </div>
          <div class="head client-data">
            <p>-</p>
            <p> Noms : {{$user->name}}</p>
            <p>Téléphone : {{$user->phone}}</p>
            <p>Adress : {{$user->ville}}{{$user->pays}}</p>
            <p>Email : {{$user->email}}</p>
          </div>
        </div>
        <!-- invoice body-->
        <div class="invoice-body">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Description</th>
                <th>Nom de l'entreprise</th>
                <th>Prix unitaire</th>
                <th>Quantite</th>
                <th>Total</th> 
              </tr>
            </thead>
            <tbody>
              <tr>
                <td > </td>
                <td>Achat d'actions</td>
                <td> {{$enterprise->name_enterprise}}</td>
                <td>{{$data->prix_action}} XAF</td>
                <td>{{$data->nombre_action}} actions</td>
                <td>{{$data->sous_total}} XAF</td>
              </tr>
              
            </tbody>
          </table><br><br>
          <div class="flex-table">
            <div class="flex-column"></div>
            <div class="flex-column">
              <table class="table-subtotal">
                <tbody>
                  <tr>
                    <td>Sous total</td>
                    <td>{{$data->sous_total}} XAF</td>
                  </tr>
                  <tr>
                    <td>Taxe 3%</td>
                    <td>+ {{$data->remise}} XAF</td>
                  </tr>
                  <tr>
                    <td>Total</td>
                    <td>{{$data->total_payer}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- invoice total  -->
          <div class="invoice-total-amount">
            <p>Total	A Payer : {{$data->total_payer}} XAF</p>
          </div>
        </div>
        <div class="tm_left_footer">
          <p class="tm_mb2"><b class="tm_primary_color">Information de payment:</b></p>
          <p class="tm_m0">Noms :{{$user->name}} <br> Paiement numerique<br>Amount: {{$data->total_payer}} XAF</p>
        </div>
        <!-- invoice footer -->
        <div class="invoice-footer">
          <p>Termes & Condition</p>
          <p>La facture a été créée sur un ordinateur et est valable sans signature ni sceau.</p>
=======
    .wrapper-invoice .invoice {
      height: auto;
      background: #ebeaea;
      padding: 5vh;
      margin-top: 5vh;
      max-width: 110vh;
      width: 100%;
      box-sizing: border-box;
      border: 1px solid #dcdcdc;
    }

    .wrapper-invoice .invoice .invoice-information {
      float: right;
      text-align: right;
    }

    .wrapper-invoice .invoice .invoice-information b {
      color: "#0F172A";
    }

    .wrapper-invoice .invoice .invoice-information p {
      font-size: 2vh;
      color: rgb(34, 34, 34);
    }

    .wrapper-invoice .invoice .invoice-logo-brand h2 {
      text-transform: uppercase;
      font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
      font-size: 2.9vh;
      color: "#0F172A";
    }

    .wrapper-invoice .invoice .invoice-logo-brand img {
      max-width: 100px;
      width: 100%;
      object-fit: fill;
    }

    .wrapper-invoice .invoice .invoice-head {
      display: flex;
      margin-top: 8vh;
    }

    .wrapper-invoice .invoice .invoice-head .head {
      width: 100%;
      box-sizing: border-box;
    }

    .wrapper-invoice .invoice .invoice-head .client-info {
      text-align: left;
    }

    .wrapper-invoice .invoice .invoice-head .client-info h2 {
      font-weight: 500;
      letter-spacing: 0.3px;
      font-size: 2vh;
      color: "#0F172A";
    }

    .wrapper-invoice .invoice .invoice-head .client-info p {
      font-size: 2vh;
      color: rgb(48, 48, 48);
    }

    .wrapper-invoice .invoice .invoice-head .client-data {
      text-align: right;
    }

    .wrapper-invoice .invoice .invoice-head .client-data h2 {
      font-weight: 500;
      letter-spacing: 0.3px;
      font-size: 2vh;
      color: "#0F172A";
    }

    .wrapper-invoice .invoice .invoice-head .client-data p {
      font-size: 2vh;
      color: rgb(42, 42, 42);
    }

    .wrapper-invoice .invoice .invoice-body {
      margin-top: 8vh;
    }

    .wrapper-invoice .invoice .invoice-body .table {
      border-collapse: collapse;
      width: 100%;
    }

    .wrapper-invoice .invoice .invoice-body .table thead tr th {
      font-size: 2vh;
      border: 1px solid #dcdcdc;
      text-align: left;
      padding: 1vh;
      background-color: #76df59;
    }

    .wrapper-invoice .invoice .invoice-body .table tbody tr td {
      font-size: 2vh;
      border: 1px solid #656565;
      text-align: left;
      padding: 1vh;
      background-color: #edebeb;
    }

    .wrapper-invoice .invoice .invoice-body .table tbody tr td:nth-child(2) {
      text-align: right;
    }

    .wrapper-invoice .invoice .invoice-body .flex-table {
      display: flex;
    }

    .wrapper-invoice .invoice .invoice-body .flex-table .flex-column {
      width: 100%;
      box-sizing: border-box;
    }

    .wrapper-invoice .invoice .invoice-body .flex-table .flex-column .table-subtotal {
      border-collapse: collapse;
      box-sizing: border-box;
      width: 100%;
      margin-top: 2vh;
    }

    .wrapper-invoice .invoice .invoice-body .flex-table .flex-column .table-subtotal tbody tr td {
      font-size: 2vh;
      border-bottom: 1px solid #484848;
      text-align: left;
      padding: 1vh;
      background-color: #eaeaea;
    }

    .wrapper-invoice .invoice .invoice-body .flex-table .flex-column .table-subtotal tbody tr td:nth-child(2) {
      text-align: right;
    }

    .wrapper-invoice .invoice .invoice-body .invoice-total-amount {
      margin-top: 1rem;
    }

    .wrapper-invoice .invoice .invoice-body .invoice-total-amount p {
      font-weight: bold;
      color: "#0F172A";
      text-align: right;
      font-size: 2vh;
    }

    .wrapper-invoice .invoice .invoice-footer {
      margin-top: 4vh;
    }

    .wrapper-invoice .invoice .invoice-footer p {
      font-size: 1.7vh;
      color: gray;
    }

    .copyright {
      margin-top: 2rem;
      text-align: center;
    }

    .copyright p {
      color: gray;
      font-size: 1.8vh;
    }

    @media print {
      .table thead tr th {
        -webkit-print-color-adjust: exact;
        background-color: #eeeeee !important;
      }

      .copyright {
        display: none;
      }
    }

    .rtl {
      direction: rtl;
      font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    }

    .rtl .invoice-information {
      float: left !important;
      text-align: left !important;
    }

    .rtl .invoice-head .client-info {
      text-align: right !important;
    }

    .rtl .invoice-head .client-data {
      text-align: left !important;
    }

    .rtl .invoice-body .table thead tr th {
      text-align: right !important;
    }

    .rtl .invoice-body .table tbody tr td {
      text-align: right !important;
    }

    .rtl .invoice-body .table tbody tr td:nth-child(2) {
      text-align: left !important;
    }

    .rtl .invoice-body .flex-table .flex-column .table-subtotal tbody tr td {
      text-align: right !important;
    }

    .rtl .invoice-body .flex-table .flex-column .table-subtotal tbody tr td:nth-child(2) {
      text-align: left !important;
    }

    .rtl .invoice-body .invoice-total-amount p {
      text-align: left !important;
    }

    /*# sourceMappingURL=invoice.css.map */
  </style>
  <section class="wrapper-invoice">
    <!-- switch mode rtl by adding class rtl on invoice class -->
    <div class="invoice">
      <div class="invoice-information">
        <p><b>Invoice</b> : #LL93784</p>
        <p><b>Created Date </b>: {{$data->created_at}}</p>
      </div>
      <div class="invoice-logo-brand">
        <img src="https://raw.githubusercontent.com/nath-hub/tandisapp/devellop/public/assets/images/im2.png" alt="Image gauche" class="image" />
      </div>
      <!-- invoice head -->
      <div class="invoice-head">
        <div class="head client-info">
          <p></p>
          <p>Happy Yaoundé - Cameroun</p>
          <p>tandisinvestment@gmail.com</p>
          <p>+(237) 698 962 615</p>
        </div>
        <div class="head client-data">
          <p>-</p>
          <p> Noms : {{$user->name}}</p>
          <p>Téléphone : {{$user->phone}}</p>
          <p>Adress : {{$user->ville}}{{$user->pays}}</p>
          <p>Email : {{$user->email}}</p>
>>>>>>> cbe4112 (update)
        </div>
      </div>
      <!-- invoice body-->
      <div class="invoice-body">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Description</th>
              <th>Nom de l'entreprise</th>
              <th>Prix unitaire</th>
              <th>Quantite</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> </td>
              <td>Achat d'actions</td>
              <td> {{$enterprise->name_enterprise}}</td>
              <td>{{$data->prix_action}} XAF</td>
              <td>{{$data->nombre_action}} actions</td>
              <td>{{$data->sous_total}} XAF</td>
            </tr>

          </tbody>
        </table><br><br>
        <div class="flex-table">
          <div class="flex-column"></div>
          <div class="flex-column">
            <table class="table-subtotal">
              <tbody>
                <tr>
                  <td>Sous total</td>
                  <td>{{$data->sous_total}} XAF</td>
                </tr>
                <tr>
                  <td>Taxe 3%</td>
                  <td>+ {{$data->remise}} XAF</td>
                </tr>
                <tr>
                  <td>Total</td>
                  <td>{{$data->total_payer}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- invoice total  -->
        <div class="invoice-total-amount">
          <p>Total A Payer : {{$data->total_payer}} XAF</p>
        </div>
      </div>
      <div class="tm_left_footer">
        <p class="tm_mb2"><b class="tm_primary_color">Information de payment:</b></p>
        <p class="tm_m0">Noms :{{$user->name}} <br> Paiement numerique<br>Amount: {{$data->total_payer}} XAF</p>
      </div>
      <!-- invoice footer -->
      <div class="invoice-footer">
        <p>Termes & Condition</p>
        <p>La facture a été créée sur un ordinateur et est valable sans signature ni sceau.</p>
      </div>
    </div>
  </section>
  <div class="copyright">
    <p>Created by 🤗 nath-hub</p>
  </div>
</body>

</html>