<aside class="w-full grid items-center">
    <div class="block">
        <div class="relative h-auto">
            {{-- navbar  --}}
            <div class="absolute h-[5.2rem] bg-secondary">
                <div id="navbar" class="fixed w-full z-10 bg-opacity-70 transition ease-in-out">
                    <div class="container mx-auto">
                        <div class="flex xs:h-16 md:h-20 mx-3 space-x-3 justify-between items-center">
                            {{--  Logo  --}}
                            <a href="{{route('home')}}">
                                <span class="brand-text text-2xl">PartsLog</span>
                            </a>
                            {{--  menu  --}}
                            @include('components.navmenu')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>