@extends('layout.app')

@section('styles')
    <link rel="stylesheet" href="./css/dataTables.bootstrap5.min.css" />
@endsection

@section('content')
    {{-- Navbar --}}
    @include('components.Sidebar')
    {{-- Contents --}}
    <div class="adminContentBar" id="adminContentBar">
        @include('components.Topbar')
        {{-- Product List --}}


        <div class="container mb-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex">

                        <div class="my-3 ">
                            <a class="btn btn-success" href="{{ url('make-transaction') }}">

                                <i class="fas fa-money-check-alt me-2"></i>
                                <span> Sell Product </span>
                            </a>
                        </div>

                    </div>

                    <hr>
                    <h5>All Sold Products List</h5>
                    <hr>
                    <table id="example" data-order='[[ 3, "desc" ]]' class="table table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Total Price</th>
                                <th>Sold Quantity</th>
                                <th>Sell Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->name }}</td>
                                    <td>{{ $transaction->total_price }} Tk</td>
                                    <td>{{ $transaction->sell_quantity }} {{ $transaction->unit }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>
                                        <a class=" btn btn-secondary"
                                            href="{{ url('transaction-details/' . $transaction->id) }}">View</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
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
    @elseif (session('error'))
        <script>
            swal("Error !", "{{ session('error') }}", "error", {
                button: false,
                // button: "OK",
                timer: 3000,
            })
        </script>
    @else
        <div></div>
    @endif
@endsection


@section('scripts')
    <script src="js/jquery-3.7.0.js"></script>
    <script src="js/dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap5.min.js"></script>

    <script>
        new DataTable("#example", {
            scrollX: true,
            scrollCollapse: true,
            scrollY: "50vh",
        });
    </script>
@endsection
