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
                    <form action="/add-product" method="POST" class="mb-4">
                        @csrf
                        <div class="mt-3 newCard p-4">
                            <div class=" d-flex justify-content-between ">
                                <div>
                                    <h2>Add New Product</h2>
                                </div>
                                <div>
                                    <a class=" btn btn-info text-light" href="{{ url('product') }}">Go to Product</a>
                                </div>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label for="nameID" class="form-label">Product Name </label>
                                <input type="text" name="name" class="form-control" id="nameID"
                                    placeholder="Enter product name">
                            </div>
                            <div class="mb-3">
                                <label for="detailsID" class="form-label">Product Details </label>
                                <textarea name="details" class="form-control" id="detailsID" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="imgID" class="form-label">Product Image URL </label>
                                <input type="text" name="image" class="form-control" id="imgID"
                                    placeholder="Product image url">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text">Product Price</span>
                                <input type="number" step="any" name="price" class="form-control"
                                    placeholder="Enter price">
                                <span class="input-group-text">Discount</span>
                                <input type="number" name="discount" class="form-control"
                                    placeholder="Discount % (Optional)">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Product Quantity</span>
                                <input type="number" name="quantity" class="form-control" placeholder="Enter quantity" />
                                <span class="input-group-text">Unit</span>
                                <select class="form-select" name="unit" required>
                                    <option selected disabled>--- Select Unit ----</option>
                                    <option value="kg">kg</option>
                                    <option value="liter">Liter</option>
                                    <option value="pieces">Pieces</option>
                                    <option value="packets">Packets</option>
                                </select>
                            </div>
                            <button class=" btn btn-success" type="submit">Add Product Now</button>
                        </div>
                    </form>
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
    @elseif (session('error'))
        <script>
            swal("Error !", "{{ session('error') }}", "error", {
                button: false,
                button: "OK",
                // timer: 6000,
            })
        </script>
    @else
        <div></div>
    @endif
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
@endsection
