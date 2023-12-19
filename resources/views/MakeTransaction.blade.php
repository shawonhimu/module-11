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
                    <div class="my-3">
                        <form action="/add-customer" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text">Name</span>
                                <input type="text" class="form-control" name="customerName" placeholder="Enter Name"
                                    required />
                                <span class="input-group-text">Phone</span>
                                <input type="text" class="form-control" name="customerPhone" placeholder="Enter Phone"
                                    required />
                                <div>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-check"></i>
                                        <span> Save New Customer </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <form action="/sell" method="POST" class="mb-4">
                        @csrf
                        <div class="mt-3 newCard p-4">
                            <div class=" d-flex justify-content-between ">
                                <div>
                                    <h2>Sell A Product</h2>
                                </div>
                                <div>
                                    <a class=" btn btn-info text-light" href="{{ url('transactions') }}">All
                                        Transactions</a>
                                </div>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label for="productID" class="form-label">Select Product </label>
                                <select class="form-select" name="productID" id="productID" onchange="calculateTotal()"
                                    required>
                                    <option selected disabled>--- Select Product ----</option>
                                    @foreach ($products as $product)
                                        <option data-selectprice="{{ $product->price }}" data-unit="{{ $product->unit }}"
                                            value="{{ $product->id }}">
                                            {{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="customerID" class="form-label">Select Customer </label>
                                <select class="form-select" name="customerID" id="customerID" required>
                                    <option selected disabled>--- Select Customer ----</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="QuantityID" class="form-label">Product Quantity
                                    <span id="unitProduct">(kg)</span>
                                </label>
                                <input type="number" step="any" name="sellQuantity" class="form-control"
                                    id="QuantityID" placeholder="Enter product quantity" onkeyup="calculateTotal()"
                                    required />
                            </div>

                            <div class="mb-3">
                                <label for="priceID" class="form-label">Total Price ( Tk )</label>
                                <input type="number" readonly name="totalPrice" class="form-control" id="priceID"
                                    placeholder="Product price in tk" value="" required />
                            </div>
                            <button class=" btn btn-success" type="submit">Confirm Transaction</button>
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
                // timer: 3000,
            })
        </script>
    @else
        <div></div>
    @endif
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script>
        function calculateTotal() {
            // Get the values from the input fields
            var quantity = document.getElementById('QuantityID').value;
            // var price = document.getElementById('productID');
            // var selectedPrice = price.dataset.selectPrice;

            var selectElement = document.getElementById('productID');
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var selectedPrice = selectedOption.dataset.selectprice;
            var selectedUnit = " (" + selectedOption.dataset.unit + ")";

            // Calculate the total
            var total = quantity * selectedPrice;
            console.log(total)
            console.log(selectedPrice)
            console.log(selectedUnit)

            // Display the total in the 'total' input field
            document.getElementById('priceID').value = total.toFixed(2); //toFixed(2) is used to display two decimal places
            document.getElementById('unitProduct').innerHTML = selectedUnit;
        }
    </script>
@endsection
