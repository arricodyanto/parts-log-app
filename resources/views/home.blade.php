@extends('layouts.app')

@section('hero')

    <section id="hero" class="xs:h-[18rem] md:h-[27rem] lg:h-[36rem] bg-secondary xs:rounded-b-[3rem] lg:rounded-b-[6rem]">
        <div class="container mx-auto text-center pt-24">
            {{--  carousel --}}
            <div class="carousel w-full xs:rounded-xl md:rounded-2xl">
                <div id="item1" class="carousel-item w-full">
                  <img src="{{asset('images/hero-1.jpg')}}" class="w-full" />
                </div> 
                <div id="item2" class="carousel-item w-full">
                  <img src="{{asset('images/hero-2.jpg')}}" class="w-full" />
                </div> 
                <div id="item3" class="carousel-item w-full">
                  <img src="{{asset('images/hero-3.jpg')}}" class="w-full" />
                </div> 
                <div id="item4" class="carousel-item w-full">
                  <img src="{{asset('images/hero-4.jpg')}}" class="w-full" />
                </div>
              </div> 
              <div class="xs:hidden lg:flex justify-end w-full py-2 gap-2">
                <a href="#item1" class="btn btn-xs btn-primary btn-circle"></a>
                <a href="#item2" class="btn btn-xs btn-primary btn-circle"></a>
                <a href="#item3" class="btn btn-xs btn-primary btn-circle"></a>
                <a href="#item4" class="btn btn-xs btn-primary btn-circle"></a>
              </div>
        </div>
    </section>
    
@endsection

@section('content')

    <section id="content">
        <h1 class="text-blue-700">hello this is home page</h1>
    </section>

@endsection