<div data-aos="fade-right" data-aos-offset="300" data-aos-duration="1000" data-aos-easing="ease-in-sine">
    <div class="sidebar">
        <div class="container">
            <a href="/" class="logo-container">
                <img src="{{ asset('images/Logo Aulabaca.svg') }}" alt="Aulabaca" class="logo">
            </a>
            <div class="sidebar-menu">
                <a href="/" class=" nav-link {{(Request::is('/*'))?'active':''}} btn ">
                    <span class="material-icons material-icons-round md-24">
                        home
                    </span>
                    <span>Home</span>
                </a>
                <a href="/library" class=" nav-link {{(Request::is('library'))?'active':''}} btn">
                    <span class="material-icons material-icons-round md-24">
                        local_library
                    </span>
                    <span>Library</span>
                </a>
            </div>
        </div>
        <!-- toggle switch dark/light mode -->
        <div class="flex self-start items-center justify-center px-4 py-2 mt-12 text-primary-white">
            <div class="flex justify-end items-center space-x-2 mx-auto relative">
                <span class="text-sm font-medium text-primary-black dark:text-primary-white">Light </span>
                <div>
                    <input type="checkbox" name="" id="checkbox" class="hidden" />
                    <label for="checkbox" class="cursor-pointer">
                        <div class="w-16 h-8 flex items-center bg-gray-300 rounded-full p2">
                            <div class="switch-ball w-7 h-7 bg-white rounded-full shadow ml-0.5 flex justify-center items-center">
                            </div>
                        </div>
                    </label>
                </div>
                <span class="text-sm font-semibold text-primary-black dark:text-primary-white">Dark</span>
            </div>
        </div>
        <div class="btn auth profile flex flex-col mt-auto mb-6">
            @if(Auth::check())
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="route('logout')" class="register flex items-center gap-4 w-full px-6 py-2 rounded-md hover:bg-opacity-10 hover:bg-red-500 dark:hover:bg-opacity-10 dark:hover:bg-primary-white text-red-500 dark:text-red-500" onclick="event.preventDefault();
                                                this.closest('form').submit();"> <span class="material-icons material-icons-round">
                        logout
                    </span>
                    {{ __('LOGOUT') }}</a>
            </form>
            @endif


        </div>
    </div>
</div>