@extends('web.invoicelayout')


@section('main')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div id="invoice">
                <div class="toolbar hidden-print">
                    <div class="text-end">
                        <button type="button" class="btn btn-dark print-inv"><i class="fa fa-print"></i> طباعه</button>
                    </div>
                    <hr>
                </div>
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row">

                                <div class="col company-details">
                                    <h2 class="name">
                                        <a target="_blank" href="javascript:;">
                                            شنكل
                                        </a>
                                    </h2>
                                    <div>  العنوان: {{$Shankel->address('ar')}}</div>
                                    <div>رقم الهاتف: {{$Shankel->phone}}</div>
                                    <div class="email"><a
                                            href="mailto:shankal@info.com">{{$Shankel->email}}</a>
                                    </div>
                                </div>
                                <div class="col text-start">
                                    <a href="javascript:;">
                                    <img src="{{asset('assets')}}/images/logo/logo.png" width="80" alt>
                                    </a>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                            <div class="col invoice-details">
                                    <h1 class="invoice-id">فاتورة رقم : {{$order->id}}</h1>
                                    <div class="date">تاريخ الفاتورة : {{$order->created_at}}</div>
                                    <div class="date">كود الفاتورة : {{$order->barcode}}</div>
                                </div>
                                <div class="col invoice-to">
                                    <div class="text-gray-light"> الفاتورة الي </div>
                                    <h2 class="to"> الاستاذ {{$user->name('ar')}}</h2>
                                    <div class="address">{{$user->area->name('ar')}}</div>
                                    <div class="email"><a
                                            href="">{{$user->email}}</a>
                                    </div>
                                </div>

                            </div>
                            <div class="notices mb-3 alert-success">
                                <div class="notice">تم دفع المبلغ بنجاج و شراء الخدمات من  شنكل</div>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        
                                        <th class="text-left">الوصف</th>
                                        <th class="text-right">  السعر الخدمة</th>
                                        <th class="text-left">الكمية</th>
                                        <th class="text-right">الاجمالي</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($services as $service)
                                       
                                   
                                    <tr>
                                        <td class="text-left">
                                            <h3>
                                                <a target="_blank" href="javascript:;">
                                                          الخدمة : {{$service->name('ar')}}
                                                </a>
                                            </h3>
                                            <a target="_blank" href="javascript:;">
                                               {!! $service->name('ar') !!}
                                            </a> 
                                        </td>
                                        <td>{{$service->price}}</td>
                                        <td class="qty">{{$service->pivot->quantity}}</td>
                                        <td class="total">{{$service->price * $service->pivot->quantity}}</td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">الاجمالي:{{$order->total_price}} </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="thanks">
                                <p>شكرا جزيلا</p>
                                <div class="sign">
                                    <h4>الأمضاء</h4>
                                    <img src="{{asset('assets')}}/images/logo/sign.png" alt="signature">
                                </div>
                            </div>

                        </main>
                      
                    </div>

                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
