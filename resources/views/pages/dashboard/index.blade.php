@extends('apps')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-6 mb-6 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Welcome, {{ Session::get('name') }}! 🎉</h5>
                            <p class="mb-4">
                                You have done <span class="fw-bold">{{$total_transaction_staff}}</span> transactions at all. <br/>Keep up the good work!.
                            </p>
                            <a href="{{ url('/transaction') }}" class="btn btn-sm btn-outline-primary">View All Transactions</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img
                                src="../assets/img/illustrations/man-with-laptop-light.png"
                                height="140"
                                alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png"
                                />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 order-1">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img
                                        src="../assets/img/icons/unicons/chart-success.png"
                                        alt="chart success"
                                        class="rounded"
                                        />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Transaksi</span>
                            <h3 class="card-title mb-2">{{ $total_transaction }}</h3>
                            <small class="text-success fw-semibold">
                                <a href="{{ url('/transaction') }}">view more <i class="bx bx-right-arrow-alt"></i></a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img
                                        src="../assets/img/icons/unicons/wallet-info.png"
                                        alt="Credit Card"
                                        class="rounded"
                                        />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Barang</span>
                            <h3 class="card-title mb-2">{{ $total_product }}</h3>
                            <small class="text-info fw-semibold">
                                <a href="{{ url('/product') }}">view more <i class="bx bx-right-arrow-alt"></i></a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Pembeli</span>
                            <h3 class="card-title mb-2">{{ $total_customer }}</h3>
                            <small class="text-danger fw-semibold">
                                <a href="{{ url('/customer') }}">view more <i class="bx bx-right-arrow-alt"></i></a>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">10 Transaksi Terakhir</h5>
                <div class="card-body">
                    <table class="table table-product table-striped">
                        <thead>
                            <tr>
                                <th height="50">No</th>
                                <th height="50">Customer Name</th>
                                <th height="50">Product Name</th>
                                <th height="50">QTY</th>
                                <th height="50">Price</th>
                                <th height="50">Total Price</th>
                                <th height="50">Staff Name</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @if(count($transactions) > 0)
                                @foreach($transactions as $key => $trx)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $trx->customer_name }}</td>
                                        <td>{{ $trx->product_name }}</td>
                                        <td>{{ $trx->qty }}</td>
                                        <td>{{ $trx->product_price }}</td>
                                        <td>{{ $trx->product_price * $trx->qty }}</td>
                                        <td>{{ $trx->staff_name }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9" class="text-center">No Data Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
<!-- / Content -->
@endsection