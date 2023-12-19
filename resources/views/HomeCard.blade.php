@extends('layout.app')

@section('content')
    {{-- Navbar --}}
    @include('components.Sidebar')
    {{-- Contents --}}
    <div class="adminContentBar" id="adminContentBar">
        @include('components.Topbar')
        {{-- Cards --}}

        <div class="adminContents">
            <div class="row">
                <div class="col-md-4">
                    <div class="newCard text-center m-2">
                        <div class="bg-success py-2 text-white ">
                            <h4>Today, {{ $todayName }}</h4>
                        </div>
                        <div class="adminBDMSHomeCard d-flex">
                            <div class="adminBDMSHomeCardIcon">
                                <i class="fas fa-money-check-alt"></i>
                            </div>
                            <div class="adminBDMSHomeCardTxt">
                                <div>
                                    <h5>Total Sales</h5>
                                </div>
                                <div>
                                    <h6>{{ $todayData }} Tk</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="newCard text-center m-2">
                        <div class="bg-danger py-2 text-white ">
                            <h4>Yesterday, {{ $yesterdayName }}</h4>
                        </div>
                        <div class="adminBDMSHomeCard d-flex">
                            <div class="adminBDMSHomeCardIcon">
                                <i class="fas fa-money-check-alt"></i>
                            </div>
                            <div class="adminBDMSHomeCardTxt">
                                <div>
                                    <h5>Total Sales</h5>
                                </div>
                                <div>
                                    <h6>{{ $yesterdayData }} Tk</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="newCard text-center m-2">
                        <div class="bg-primary py-2 text-white ">
                            <h4>This Month, {{ $currentMonthName }}</h4>
                        </div>
                        <div class="adminBDMSHomeCard d-flex">
                            <div class="adminBDMSHomeCardIcon">
                                <i class="fas fa-money-check-alt"></i>
                            </div>
                            <div class="adminBDMSHomeCardTxt">
                                <div>
                                    <h5>Total Sales</h5>
                                </div>
                                <div>
                                    <h6>{{ $currentMonthData }} Tk</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="newCard text-center m-2">
                        <div class="bg-info py-2 text-white ">
                            <h4>Last Month, {{ $lastMonthName }}</h4>
                        </div>
                        <div class="adminBDMSHomeCard d-flex">
                            <div class="adminBDMSHomeCardIcon">
                                <i class="fas fa-money-check-alt"></i>
                            </div>
                            <div class="adminBDMSHomeCardTxt">
                                <div>
                                    <h5>Total Sales</h5>
                                </div>
                                <div>
                                    <h6>{{ $lastMonthData }} Tk</h6>
                                </div>
                            </div>
                        </div>
                    </div>
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
    @endif
@endsection
