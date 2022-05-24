<div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">

    <nav class="navbar d-flex fixed px-4 py-4 flex justify-between items-center">

        <div class="search flex justify-center">
            <div class="mb-3 xl:w-96 cari">
                <div class="input-group relative flex flex-wrap align-middle items-stretch w-full mb-4">
                   @csrf
                    <input type="search" class="  form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-full transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search by author,tittle" aria-label="Search" aria-describedby="button-addon2" name="search"  id="search">  
                </div>
                <div id="display-pencarian">
                </div>
            </div>
        </div>
        

        <div class="lg:hidden">
            <button class="navbar-burger flex items-center text-primary-black dark:text-primary-white p-3">
                <svg class="block h-7 w-7 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Mobile menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>



        <div class="btn auth profile">

            @if(!Auth::check())
            <a href="/register" class="register px-6 py-2 rounded-full text-component hover:bg-opacity-10 dark:hover:bg-opacity-10 hover:bg-background-component-light dark:hover:bg-primary-white">
                DAFTAR
            </a>
            <a href="/login" class="login px-6 py-2 rounded-full text-primary-white bg-component hover:bg-hover-component">
                MASUK
            </a>
            @endif
            @if(Auth::check())
            <div class="profile">
                <a href="/edit" class="profile text-primary-black dark:text-primary-white">
                    <p>{{auth()->user()->name}}</p>
                    @if(auth()->user()->avatar)
                    <img src="{{asset('storage/'. auth()->user()->avatar)}}" class="w-10 h-10 rounded-full" alt="Profile Picture">
                    @else
                    <img src="https://ui-avatars.com/api/?background=random&name={{auth()->user()->name}}" class="w-10 h-10 rounded-full" alt="Profile Picture">
                    @endif

                </a>
            </div>

            @endif
        </div>
    </nav>
    <div class="navbar-menu relative z-50 hidden">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-3/6 max-w-sm px-4 py-6 bg-background overflow-y-auto">
            <div class="flex justify-between items-center mb-14">
                <a class="mr-10 text-3xl font-bold leading-none" href="./index.html">
                    <img src="./images/Logo Aulabaca.svg" alt="logo" class="max-h-10">
                </a>
                <button class="navbar-close">
                    <svg class="h-7 w-7 text-primary-black dark:text-primary-white cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div>

                <div class="sidebar-menu">
                    <a href="/" class="btn {{(Request::is('/'))?'active':''}} px-4 py-2 mb-1">
                        <span class="material-icons material-icons-round md-24">
                            home
                        </span>
                        <span>Home</span>
                    </a>

                    <a href="/library" class="btn {{(Request::is('library'))?'active':''}} px-4 py-2 mb-1">
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
            <!-- login/signup/book-info here -->
            <div class="btn auth profile flex flex-col mt-auto">
                @if(!Auth::check())
                <a href="/register" class="register flex justify-center w-full px-6 py-2 rounded-full text-component hover:bg-opacity-10 dark:hover:bg-opacity-10 hover:bg-background-component-light dark:hover:bg-primary-white">
                    DAFTAR
                </a>
                <a href="/login" class="login flex justify-center w-full px-6 py-2 rounded-full text-primary-white bg-component hover:bg-hover-component">
                    MASUK
                </a>
                @endif
                @if(Auth::check())

                <div class="btn auth profile flex flex-col mt-auto mb-6">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')" class="register flex items-center gap-4 w-full px-6 py-2 rounded-md hover:bg-opacity-10 hover:bg-red-500 dark:hover:bg-opacity-10 dark:hover:bg-primary-white text-red-500 dark:text-red-500" onclick="event.preventDefault();
                                                this.closest('form').submit();"> <span class="material-icons material-icons-round">
                                logout
                            </span>
                            {{ __('LOGOUT') }}</a>
                    </form>



                </div>


                @endif
            </div>
        </nav>
    </div>
</div>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $("#search").keyup(function(){
            var strcari=$("#search").val();
            if(strcari != ""){
                
                $.ajax({
                    type: "get",
                    url : "{{url('/search')}}",
                    data: "keyword=" + strcari,
                    success:function(data){
                        $("#display-pencarian").html(data);
                    }
                })
            }else{
                $("#display-pencarian").html("");

            }
        });
    });
</script>