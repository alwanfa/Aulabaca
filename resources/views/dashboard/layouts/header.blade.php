<header class="navbar fixed-top  flex-md-nowrap p-0 shadow bg-light">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route("dashboard") }}">
        <x-logo/>
    </a>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="log"><a href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">{{ __('Logout') }} </a>
                    
                </button>
            </form>
        </div>
    </div>
</header>