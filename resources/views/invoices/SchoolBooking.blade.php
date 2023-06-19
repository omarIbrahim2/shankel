@extends('web.invoicelayout')


@section('main')

<header class="top-bar align-center">
  <div class="top-bar-title">
    <h1>Invoice Template <small>with Foundation Flex-Grid Layout</small></h1>
  </div>
</header>
<div class="row expanded">
  <main class="columns">
    <div class="inner-container">
    <header class="row align-center">
        <a class="button hollow secondary"><i class="ion ion-chevron-left"></i> Go Back to Purchases</a>
        &nbsp;&nbsp;<a class="button print_button"><i class="ion ion-ios-printer-outline"></i> Print Invoice</a>
      </header>
    <section class="row">
      <div class="callout large invoice-container">
        <table class="invoice">
          <tr class="header">
            <td class="">
              <img src="http://www.travelerie.com/wp-content/uploads/2014/04/PlaceholderLogoBlue.jpg" alt="Company Name" />
            </td>
            <td class="align-right">
              <h2>Invoice</h2>
            </td>
          </tr>
          <tr class="intro">
            <td class="">
              Hello, Philip Brooks.<br>
              Thank you for your order.
            </td>
            <td class="text-right">
              <span class="num">Order #00302</span><br>
              October 18, 2017
            </td>
          </tr>
          <tr class="details">
            <td colspan="2">
              <table>
                <thead>
                  <tr>
                    <th class="desc">Item Description</th>
                    <th class="id">Item ID</th>
                    <th class="qty">Quantity</th>
                    <th class="amt">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="item">
                    <td class="desc">Name or Description of item</td>
                    <td class="id num">MH792AM</td>
                    <td class="qty">1</td>
                    <td class="amt">$100.00</td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
          <tr class="totals">
            <td></td>
            <td>
              <table>
                <tr class="subtotal">
                  <td class="num">Subtotal</td>
                  <td class="num">$100.00</td>
                </tr>
                <tr class="fees">
                  <td class="num">Shipping & Handling</td>
                  <td class="num">$0.00</td>
                </tr>
                <tr class="tax">
                  <td class="num">Tax (7%)</td>
                  <td class="num">$7.00</td>
                </tr>
                <tr class="total">
                  <td>Total</td>
                  <td>$107.00</td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <section class="additional-info">
        <div class="row">
          <div class="columns">
            <h5>Billing Information</h5>
            <p>Philip Brooks<br>
              134 Madison Ave.<br>
              New York NY 00102<br>
              United States</p>
          </div>
          <div class="columns">
            <h5>Payment Information</h5>
            <p>Credit Card<br>
              Card Type: Visa<br>
              &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; 1234
              </p>
          </div>
        </div>
        </section>
      </div>
    </section>
    </div>
  </main>
</div>
@endsection
