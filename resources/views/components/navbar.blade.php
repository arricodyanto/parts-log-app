<aside class="w-full grid items-center">
    <div class="block">
        <div class="relative h-auto">
            {{-- navbar  --}}
            <div class="absolute h-[5.2rem] bg-secondary">
                <div id="navbar" class="fixed w-full z-10 bg-opacity-50 transition ease-in-out">
                    <div class="container mx-auto">
                        <div class="flex h-20 mx-3 space-x-3 justify-between items-center">
                            {{--  Logo  --}}
                            <a href="{{route('home')}}">
                                <span class="brand-text text-2xl">PartsLog</span>
                            </a>
                            {{--  menu  --}}
                            <nav class="flex-none gap-2">
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
                                            <span class="badge">New</span>
                                        </a>
                                        </li>
                                        <li><a>Settings</a></li>
                                        <li><a>Logout</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-circle btn-ghost lg:hidden text-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                                </button>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>