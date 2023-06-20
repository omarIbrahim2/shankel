@extends('web.invoicelayout')


@section('main')

<header class="top-bar align-center">
  <div class="top-bar-title">
    <h1>Your Order Invoice</h1>
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
              <img src="{{asset("assets")}}/images/logo/logo.png" alt="Shankl" />
            </td>
            <td class="align-right">
              <h2>Invoice</h2>
            </td>
          </tr>
          <tr class="intro">
            <td class="">
              Hello, {{ $user->name }}.<br>
              Thank you for your order.
            </td>
            <td class="text-right">
              <span class="num">Order {{ $order->barcode }}</span><br>
              {{ $order->created_at }}
            </td>
          </tr>
          <tr class="details">
            <td colspan="2">
              <table>
                <thead>
                  <tr>
                    <th class="desc">Service Name</th>
                    <th class="desc">Service Description</th>
                    <th class="qty">Quantity</th>
                    <th class="amt">Price</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($services as $service)
                      
                  <tr class="item">
                    <td class="desc">{{ $service->name }}</td>
                    <td class="desc">{{ $service->desc }}</td>
                    <td class="qty">{{ $service->pivot->quantity }}</td>
                    <td class="amt">{{ $service->price }} JOD</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </td>
          </tr>
          <tr class="totals">
            <td></td>
            <td>
              <table>
                
                <tr class="total">
                  <td>Total</td>
                  <td>{{ $order->total_price }} JOD</td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <section class="additional-info">
        <div class="row">
          <div class="columns">
            <h5>Billing Information</h5>
            <p>{{ $user->name }}<br>
              {{ $user->area->name }}<br>
              {{ $user->area->city->name }}<br>
              Jordan</p>
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
