<footer id="footer">
    <div class="mt-8 border-t">
        <div class="container pt-8 pb-6">
            <div id="brand-logo">
                <a class="brand-text text-2xl mb-2" href="{{route('home')}}">
                    {{env('APP_NAME')}}
                </a>
                <p class="text-sm text-grey">Vehicles Monitoring System</p>
            </div>
            <div class="grid xs:grid-cols-1 md:grid-cols-2 gap-4 mt-8">
                @auth
                    <div>
                        <p class="text-sm mb-4">Welcome, </p>
                        <div class="btn btn-ghost btn-circle avatar">
                            <div class="w-10 rounded-full">
                                <img alt="Avatar" src="{{asset('images/avatar/'.Auth::user()->avatar)}}" />
                            </div>
                        </div>
                        <p class="text-lg">{{Auth::user()->name}}</p>
                    </div>
                @else
                    <div class="">
                        <p class="text-sm">You are an admin?</p>
                        <a href="{{route('login')}}">
                            <button class="btn btn-primary text-white w-44 mt-2 mb-8">Login</button>
                        </a>
                    </div>
                @endauth
                <div>
                    <h3 class="text-lg font-semibold">Navigation</h3>
                    <ul class="flex flex-col gap-2 mt-4">
                        <a href="{{route('home')}}" class="hover:text-gray-500 transition">Home</a>
                        @auth
                            <a href="{{route('vehicles.view')}}" class="hover:brightness-125 transition">Vehicles Management</a>
                            <a href="#" class="hover:brightness-125 transition">Parts Management</a>
                            <a href="#" class="hover:brightness-125 transition">Accounts Management</a>
                        @else
                            <a href="{{route('login')}}">Login</a>
                        @endauth
                    </ul>
                </div>
            </div>
            <div class="mt-12">
                <p class="text-grey text-xs">©{{now()->year}} - All rights reserved</p>
            </div>
        </div>
    </div>
</footer>
