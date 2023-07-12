@extends('web.invoicelayout')


@section('main')

<header class="top-bar align-center">
  <div class="top-bar-title">
    <h1>Reserve a seat in a  <small>{{ $school->name }}</small> school</h1>
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
              <h2>Reserve Information</h2>
            </td>
          </tr>
          <tr class="intro">
            <td class="">
              Hello, {{ $parent->name }}.<br>
              We would like to inform you of the success of the request to reserve a seat at {{ $school->name }} School, and we wish {{ $child->name }} an enjoyable and happy study followed by success and excellence.
            </td>
            <td class="text-right">
              <span class="num">Reserve {{ $order->order_code }}</span><br>
              {{ $order->created_at }}
            </td>
          </tr>

          <tr class="totals">
            <td></td>
            <td>
              <table>
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
            <h5>Reserve Information</h5>
            <p>{{ $parent->name }}<br>
              {{ $parent->area->name() }}.<br>
              {{ $parent->area->city->name() }}<br>
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
