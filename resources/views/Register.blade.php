<!DOCTYPE html>
<html lang="en">

<head>

    <title>Dashboard || Store Management Sytem App</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>

<body class="bodyStyle">

    <div class="loginPage">
        <div class="overlay"></div>
        <div class="container">
            <div class="loginForm">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="loginCard">
                            <h3 class="text-light text-uppercase bg-success p-2 rounded">Store Management System</h3>
                            {{-- Registration Form --}}
                            <div id="adminForm">
                                <h5 class="text-warning my-4">Create Account</h5>
                                <form action="{{ url('/registration') }}" class="loginForm" method="POST">
                                    @csrf
                                    <input type="text" name="keeperName" class="form-control text-start"
                                        placeholder="Enter name" required />
                                    <input type="text" name="username" class="form-control text-start"
                                        placeholder="Enter username (unique)" required />
                                    <select name="designation" class="form-select mb-2">
                                        <option selected disabled> <---- Select Designation ----></option>
                                        <option value="Owner">Owner</option>
                                        <option value="Seller">Seller</option>
                                    </select>
                                    <input type="number" name="keeperPhone" class="form-control text-start"
                                        placeholder="Enter phone" required />
                                    <input type="email" name="email" class="form-control text-start"
                                        placeholder="Enter email" required />
                                    <input type="text" name="address" class="form-control text-start"
                                        placeholder="Enter your address" required />
                                    <input type="password" name="password" class="form-control text-start"
                                        id="" placeholder="Enter your password" required>
                                    <input type="password" name="conFirmPassword" class="form-control text-start"
                                        id="" placeholder="Confirm password" required>

                                    <input class="btn btn-login" name="submit" type="submit" value="Register Now">
                                </form>
                            </div>
                            {{-- End login form --}}
                            <div>
                                <p class=" text-light">Already have account ?</p>
                                <a class=" btn btn-success" href="{{ url('login') }}">Login</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>
    @if (session('error'))
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

    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.7.0.js') }}"></script>

</body>

</html>
