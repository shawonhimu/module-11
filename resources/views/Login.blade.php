<!DOCTYPE html>
<html lang="en">

<head>

    <title>Dashboard || Store Management Sytem App</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>

<body class="bodyStyle">

    <div class="loginPage">
        <div class="overlay"></div>
        <div class="container-fluid">
            <div class="loginForm">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="loginCard">
                            <h3 class="text-light text-uppercase bg-success p-2 rounded">Store Management System</h3>
                            <div class="mobileLogo">
                                <img src="{{ asset('') }}" alt="" srcset="">
                            </div>
                            <div class="loginLogo">
                                <img src="{{ asset('img/user.png') }}" alt="" srcset="">
                                <h5 class="text-white text-uppercase">Login to manage</h5>
                            </div>
                            {{-- Login Form --}}
                            <div id="adminForm">
                                <form action="{{ url('/login') }}" class="loginForm" id="" method="POST">
                                    @csrf
                                    <input type="text" name="username" class="form-control text-center"
                                        id="" placeholder="Enter admin username" required>
                                    <input type="password" name="password" class="form-control text-center"
                                        id="" placeholder="Enter your password" required>

                                    <input class="btn btn-login" name="submit" type="submit" value="Login">
                                </form>
                            </div>
                            {{-- End login form --}}
                            <div>
                                <p class=" text-light">Don't have account ?</p>
                                <a class=" btn btn-success" href="{{ url('registration') }}">Create New Account</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <script>
            swal("Success !", "{{ session('success') }}", "success", {
                button: false,
                // button: "OK",
                timer: 3000,
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

    <script type="text/javascript" src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
