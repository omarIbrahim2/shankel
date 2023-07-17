@extends('web.invoicelayout')


@section('main')

<section class="container">
<header class="top-bar align-center">
  <div class="top-bar-title">
    <h4>   <small>......</small> تم حجز مقعد في مدرسة</h4>
  </div>
</header>
<div class="row expanded">
  <main class="columns">
    <div class="inner-container">
    <header class="row align-center">
        &nbsp;&nbsp;<a class="button print_button"><i class="ion ion-ios-printer-outline"></i> اطبع الفاتورة</a>
      </header>
    <section class="row">
      <div class="callout large invoice-container">
        <table class="invoice">
          <tr class="header">
            <td class="">
              <img src="{{asset("assets")}}/images/logo/logo.png" alt="Shankl" />
            </td>
            <td class="align-right">
              <h2>معلومات الحجز</h2>
            </td>
          </tr>
          <tr class="intro">
            <td class="">
              ....مرحبا<br>
                .....نود ابلاغك بان تم حجز مقعد لطفلك بنجاح في مدرسة
            </td>
            <td class="text-right">
              <span class="num"> ...... كود الحجز :</span><br>
              ......
            </td>
          </tr>

          <tr class="totals">
            <td></td>
            <td>
              <table>
                <tr class="total">
                  <td>الاجمالي</td>
                  <td>107.00</td>
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
</section>
@endsection
