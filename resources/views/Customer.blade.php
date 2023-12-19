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


        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex">
                        <div class="my-3 me-3">
                            <a class="btn btn-primary" href="{{ url('new-product/') }}">

                                <i class="fas fa-plus"></i>
                                <span> New Product </span>
                            </a>
                        </div>
                        <div class="my-3 ">
                            <a class="btn btn-success" href="{{ url('make-transaction') }}">

                                <i class="fas fa-money-check-alt me-2"></i>
                                <span> Sell Product </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="my-3">
                            <form action="/add-customer" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Name</span>
                                    <input type="text" class="form-control" name="customerName" placeholder="Enter Name"
                                        required />
                                    <span class="input-group-text">Phone</span>
                                    <input type="text" class="form-control" name="customerPhone"
                                        placeholder="Enter Phone" required />
                                    <div>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-check"></i>
                                            <span> Save New Customer </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-2"></div>
                    <hr>
                    <h5>Customers List</h5>
                    <hr>
                    <table id="example" data-order='[[ 2, "desc" ]]' class="table table-striped" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Customer Phone</th>
                                <th>Entry Date </th>
                                <th>Update Date </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->customer_name }}</td>
                                    <td>{{ $customer->customer_phone }}</td>
                                    <td>{{ $customer->created_at }}</td>
                                    <td>{{ $customer->updated_at }}</td>
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
