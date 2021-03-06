<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('assets/images/user.png') }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ $user->name }}
            </div>
            <div class="email">{{ $user->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <form class="" action="{{ route('logout') }}"
                        method="post" style="display: none;"
                        id="logout">
                        @csrf

                    </form>
                    <li>
                        <a href="{{ route('logout') }}" 
                            onclick="event.preventDefault();
                                document.getElementById('logout').submit();">
                            <i class="material-icons">input</i>
                            Sign Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">DASHBOARD</li>
            <li class="active">
                <a href="index.html">
                    <i class="material-icons">home</i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="header">MAIN NAVIGATION</li>

            <li>
                <a href="{{ route('admin.coins') }}">
                    <i class="material-icons">text_fields</i>
                    <span>Coins</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)" class="menu-toggle">
                    <i class="material-icons">layers</i>
                    <span>Transactions</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('admin.transactions.pending') }}">Pending Transactions</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.transactions.confirmed') }}">Confirmed Transactions</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.transactions.completed') }}">Completed Transactions</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.transactions') }}">All Transactions</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">settings</i>
                    <span>Settings</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('admin.wallets') }}">Setup Wallets</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.rates') }}">Setup Rates</a>
                    </li>
                </ul>
            </li>
            
            
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; {{ date("Y") }} <a href="javascript:void(0);">Dice Empire</a>.
        </div>
        <div class="version">
            <b>Version: </b>{{ config('app.version', '') }}
        </div>
    </div>
    <!-- #Footer -->
</aside>