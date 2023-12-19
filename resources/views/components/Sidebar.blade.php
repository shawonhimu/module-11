<div class="adminSidebar" id="adminSidebar">
    <div class="adminSidebarOptions">
        <div class="adminLogo">
            <div class="text-center text-white my-3">
                <a class="logoLink" href="#"><img src="{{ asset('img/user.png') }}" alt="" /></a>
                <div class="sideTitle">
                    <h6>Shawon Himu</h6>
                    <h6>Owner</h6>
                    <h6>M.S. Trading</h6>
                    <hr />
                </div>
            </div>
        </div>
        <ul class="navSidebar">
            <li class="navSbarItem">
                <a class="navSbarLink  {{ '/' == request()->path() ? 'active' : '' }}" href="{{ url('/') }}">
                    <i class="fas fa-th-large"></i>
                    <span class="sideTitle">Home</span>
                </a>
            </li>
            <li class="navSbarItem">
                @php
                    use Illuminate\Support\Str;
                    $isProduct = Str::startsWith(request()->path(), 'edit-product/');
                    $isTransaction = Str::startsWith(request()->path(), 'transaction-details/');

                @endphp
                <a class="navSbarLink  {{ 'product' == request()->path() || 'new-product' == request()->path() || $isProduct ? 'active' : '' }}"
                    href="{{ url('product') }}">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="sideTitle">Product</span>
                </a>
            </li>
            <li class="navSbarItem">
                <a class="navSbarLink {{ 'transactions' == request()->path() || 'make-transaction' == request()->path() || $isTransaction ? 'active' : '' }}"
                    href="{{ url('transactions') }}">
                    <i class="fas fa-chart-bar"></i>
                    <span class="sideTitle">Transactions</span>
                </a>
            </li>
            <li class="navSbarItem">
                <a class="navSbarLink {{ 'customer' == request()->path() ? 'active' : '' }}"
                    href="{{ url('customer') }}">
                    <i class="fas fa-house-user"></i>
                    <span class="sideTitle">Customers</span>
                </a>
            </li>

            <li class="navSbarItem">
                <a class="navSbarLink" href="#">
                    <i class="fas fa-cog"></i>
                    <span class="sideTitle">Settings</span>
                </a>
            </li>
        </ul>
    </div>
</div>
