<!DOCTYPE html>
<html class="no-js" lang="en">

  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
<body>


  <header class="container"> 
    <div class="row">
        <div class="col">
            <img src="{{ asset('assets/images/pp.jpg') }}" height="200" alt="Company Logo">
        </div>
        <div class="col text-right">
            <h2 class="name">Company Name</h2>
            <address>
                455 Foggy Heights, AZ 85004, US<br>
                <a href="tel:6025190450">(602) 519-0450</a><br>
                <a class="link" href="mailto:company@example.com">company@example.com</a>
            </address>
        </div>
    </div> 
</header>

<div class="border"></div>

<main class="container">

  <div class="row">
      <div class="col-6">
          <h5 class="text-muted">INVOICE TO:</h5>
          <h2 class="mb-3">John Doe</h2>
          <address>
              796 Silver Harbour, TX 79273, US<br>
              <a href="mailto:john@example.com">john@example.com</a>
          </address>
      </div>
      <div class="col-6">
          <h1 class="h1 text-primary mb-3">INVOICE 3-2-1</h1>
          <p class="text-muted">
              <span>Date of Invoice:</span> 01/06/2014<br>
              <span>Due Date:</span> 30/06/2014
          </p>
      </div>
  </div>

  <table class="table table-success table-striped table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">DESCRIPTION</th>
        <th scope="col">UNIT PRICE</th>
        <th scope="col">QUANTITY</th>
        <th scope="col">TOTAL</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">2</th>
        <td>Website Design
          Creating a recognizable design solution based on the company's existing visual identity</td>
        <td>$40.0</td>
        <td>30</td>
        <td>$1,200.00</td>
      </tr>
    </tbody>

    <tfoot>
      <tr>
        <td colspan="2"></td>
        <td colspan="2">SUBTOTAL</td>
        <td>$5,200.00</td>
      </tr>
      <tr>
        <td colspan="2"></td>
        <td colspan="2">TAX 25%</td>
        <td>$1,300.00</td>
      </tr>
      <tr>
        <td colspan="2"></td>
        <td colspan="2">GRAND TOTAL</td>
        <td>$6,500.00</td>
      </tr>
    </tfoot>
    
  </table>

  <div id="notices">
    <div>NOTICE:</div>
    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
  </div>
</main>
 
</html>