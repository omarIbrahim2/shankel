@extends('web.invoicelayout')


@section('main')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div id="invoice">
                <div class="toolbar hidden-print">
                    <div class="text-end">
                        <button type="button" class="btn btn-dark print-inv"><i class="fa fa-print"></i> Print</button>
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
                                            Arboshiki
                                        </a>
                                    </h2>
                                    <div>455 Foggy Heights, AZ 85004, US</div>
                                    <div>(123) 456-789</div>
                                    <div class="email"><a
                                            href="mailto:shankal@info.com">shankal@info.com</a>
                                    </div>
                                </div>
                                <div class="col text-start">
                                    <a href="javascript:;" >
                                        <img src="{{asset('assets')}}/images/logo/logo.png" width="80" alt>
                                    </a>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                            <div class="col invoice-details">
                                    <h1 class="invoice-id">INVOICE 3-2-1</h1>
                                    <div class="date">Date of Invoice: 01/10/2018</div>
                                    <div class="date">Due Date: 30/10/2018</div>
                                </div>
                                <div class="col invoice-to">
                                    <div class="text-gray-light">INVOICE TO:</div>
                                    <h2 class="to">John Doe</h2>
                                    <div class="address">796 Silver Harbour, TX 79273, US</div>
                                    <div class="email"><a
                                            href="mailto:shankal@info.com">shankal@info.com</a>
                                    </div>
                                </div>

                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-left">DESCRIPTION</th>
                                        <th class="text-right">AMOUNT</th>
                                        <th class="text-right">PRICE</th>
                                        <th class="text-right">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="no">04</td>
                                        <td class="text-left">
                                            <h3>
                                                <a target="_blank" href="javascript:;">
                                                    Youtube channel
                                                </a>
                                            </h3>
                                            <a target="_blank" href="javascript:;">
                                                Useful videos
                                            </a> to improve your Javascript skills. Subscribe and stay tuned
                                        </td>
                                        <td class="unit">$0.00</td>
                                        <td class="qty">100</td>
                                        <td class="total">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="no">01</td>
                                        <td class="text-left">
                                            <h3>Website Design</h3>Creating a recognizable design solution based on the
                                            company's existing visual identity
                                        </td>
                                        <td class="unit">$40.00</td>
                                        <td class="qty">30</td>
                                        <td class="total">$1,200.00</td>
                                    </tr>
                                    <tr>
                                        <td class="no">02</td>
                                        <td class="text-left">
                                            <h3>Website Development</h3>Developing a Content Management System-based
                                            Website
                                        </td>
                                        <td class="unit">$40.00</td>
                                        <td class="qty">80</td>
                                        <td class="total">$3,200.00</td>
                                    </tr>
                                    <tr>
                                        <td class="no">03</td>
                                        <td class="text-left">
                                            <h3>Search Engines Optimization</h3>Optimize the site for search engines
                                            (SEO)
                                        </td>
                                        <td class="unit">$40.00</td>
                                        <td class="qty">20</td>
                                        <td class="total">$800.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>

                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">TOTAL</td>
                                        <td>$6,500.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="thanks">
                                <p>Thank you!</p>
                                <div class="sign">
                                    <h4>SIGNATURE</h4>
                                    <img src="{{asset('assets')}}/images/logo/sign.png" alt="signture">
                                </div>
                            </div>

                        </main>
                        <footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
                    </div>

                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
