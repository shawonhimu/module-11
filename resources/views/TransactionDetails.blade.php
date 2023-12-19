@extends('layout.app')

@section('content')
    {{-- Navbar --}}
    @include('components.Sidebar')
    {{-- Contents --}}
    <div class="adminContentBar" id="adminContentBar">
        @include('components.Topbar')
        {{-- Product List --}}


        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="mt-3 newCard p-4">
                        <div class=" d-flex justify-content-between ">
                            <div>
                                <h2>Transaction Details</h2>
                            </div>
                            <div>
                                <a class=" btn btn-info text-light" href="{{ url('transactions') }}">Transaction List</a>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    @foreach ($singleTransaction as $transactionItem)
                                        <h4>Customer</h4>
                                        <hr>
                                        <h6> Name: {{ $transactionItem->customer_name }}</h6>
                                        <h6> Phone: {{ $transactionItem->customer_phone }}</h6>

                                        <h4 class="mt-2 mt-md-4">Seller</h4>
                                        <hr>
                                        <h6> Name: {{ $transactionItem->keeper_name }}</h6>
                                        <h6> Phone: {{ $transactionItem->keeper_phone }}</h6>
                                        <h6> Designation: {{ $transactionItem->designation }}</h6>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6">
                                <ul class="border py-3">
                                    <h5>Product Details</h5>
                                    <hr>
                                    @foreach ($singleTransaction as $transactionItem)
                                        <li>Product Name: {{ $transactionItem->name }}</li>
                                        <li>Product Price: {{ $transactionItem->price }} Tk</li>
                                        <li>Product Quantity: {{ $transactionItem->sell_quantity }}
                                            ({{ $transactionItem->unit }})
                                        </li>
                                        <hr>
                                        <li>
                                            <h5>Total Price: {{ number_format($transactionItem->total_price, 2) }} Tk</h5>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

    </div>
    @if (session('success'))
        <script>
            swal("Success !", "{{ session('success') }}", "success", {
                button: false,
                // button: "OK",
                timer: 2000,
            })
        </script>
    @endif
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
@endsection
