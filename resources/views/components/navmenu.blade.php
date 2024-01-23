<nav class="flex gap-4 items-center">
    <ul class="hidden lg:flex gap-2">
        <li class="nav-menu active"><a href="{{route('home')}}">Home</a></li>
        @auth
            <li class="nav-menu"><a href="{{route('vehicles.view')}}">Vehicles Management</a></li>
            <li class="nav-menu"><a href="#">Parts Management</a></li>
            <li class="nav-menu"><a href="#">Accounts Management</a></li>
        @else
            <li class="nav-menu"><a href="{{route('login')}}">Login</a></li>
        @endauth
    </ul>
    @auth
        <div class="hidden lg:block dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                <img alt="Avatar" src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                </div>
            </div>
            <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                <li>
                    <a class="justify-between">
                        Profile
                        <span class="max-w-28 truncate bg-gray-50 px-3 rounded-lg">{{Auth::user()->name}}</span>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="w-42 border border-solid border-gray-600">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    @endauth
    <button class="btn btn-circle btn-ghost lg:hidden text-dark">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
    </button>
</nav>