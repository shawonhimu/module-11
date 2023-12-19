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

                    <hr>
                    <h5>All Product List</h5>
                    <hr>
                    <table id="example" data-order='[[ 0, "desc" ]]' class="table table-striped" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Details</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Quantity (Stock) </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allProducts as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->details }}</td>
                                    <td>{{ $product->image }}</td>
                                    <td>{{ $product->price }} Tk</td>
                                    <td>{{ $product->quantity }}
                                        ({{ $product->unit == 'liter' ? 'Liters' : $product->unit }})
                                    </td>
                                    <td>
                                        <a class=" btn btn-success"
                                            href="{{ url('edit-product/' . $product->id) }}">Edit</a>
                                        <a class=" btn btn-danger"
                                            href="{{ url('delete-product/' . $product->id) }}">Delete</a>
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
