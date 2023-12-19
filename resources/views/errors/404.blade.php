@extends('layout.app')

@section('content')
    {{-- Navbar --}}
    @include('components.Sidebar')
    {{-- Contents --}}
    <div class="adminContentBar" id="adminContentBar">
        @include('components.Topbar')
        {{-- Cards --}}

        <div class="adminContents">
            <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh; width:100%">
                <div class="text-center">
                    <h2> 404 ! Not found</h2>
                    <h5>Go back </h5>
                    <a class=" btn btn-danger" href="{{ url('/') }}">Home page</a>
                </div>
            </div>
        </div>
    </div>
@endsection
