@extends('web.invoicelayout')


@section('main')

<header class="top-bar align-center">
  <div class="top-bar-title">
    <h1>فاتورة طلبك </h1>
  </div>
</header>
<div class="row expanded">
  <main class="columns">
    <div class="inner-container">
    <header class="row align-center">
        &nbsp;&nbsp;<a class="button print_button"><i class="ion ion-ios-printer-outline"></i>اطبع الفاتورة</a>
      </header>
    <section class="row">
      <div class="callout large invoice-container">
        <table class="invoice">
          <tr class="header">
            <td class="">
              <img src="{{asset('assets')}}/images/logo/logo.png" alt="Shankl" />
            </td>
            <td class="align-right">
              <h2>الفاتورة</h2>
            </td>
          </tr>
          <tr class="intro">
            <td class="">
               {{ $user->name }} اهلا <br>
              شكرا لطلبك من شنكل
            </td>
            <td class="text-right">
              <span class="num">{{ $order->barcode }} كود الطلب</span><br>
              {{ $order->created_at }}
            </td>
          </tr>
          <tr class="details">
            <td colspan="2">
              <table>
                <thead>
                  <tr>
                    <th class="desc">اسم الخدمة</th>
                    <th class="desc">وصف الخدمة</th>
                    <th class="qty">الكمية</th>
                    <th class="amt">السعر</th>
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
  
        </section>
      </div>
    </section>
    </div>
  </main>
</div>
@endsection
