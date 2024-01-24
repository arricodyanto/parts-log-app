@extends('layouts.app')

@section('hero')

    <section id="hero" class="xs:h-[18rem] md:h-[27rem] lg:h-[36rem] bg-secondary xs:rounded-b-[3rem] lg:rounded-b-[6rem]">
        <div class="container text-center pt-24">
            {{--  carousel --}}
            <div class="carousel w-full xs:rounded-xl md:rounded-2xl">
                <div id="item1" class="carousel-item w-full">
                  <a href="#">
                    <img src="{{asset('images/hero-1.jpg')}}" class="w-full" />
                  </a>
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
        <div class="container mt-4 flex xs:gap-4">
            <div class="bg-white rounded-3xl shadow-lg xs:h-44 md:h-36 w-full border xs:p-2 md:p-4 flex xs:flex-col md:flex-row items-center xs:gap-x-2 lg:gap-x-6 justify-center text-center">
              <img src="{{asset('images/monitoring-icon.svg')}}" alt="Monitoring" class="xs:w-20 md:w-24">
              <p class="xs:text-base md:text-lg font-semibold">Vehicles Monitoring</p>
            </div>
            <div class="bg-white rounded-3xl shadow-lg xs:h-44 md:h-36 w-full border xs:p-2 md:p-4 flex xs:flex-col md:flex-row items-center xs:gap-x-2 lg:gap-x-6 justify-center text-center">
              <img src="{{asset('images/parts-maintenance.svg')}}" alt="Monitoring" class="xs:w-20 md:w-24">
              <p class="xs:text-base md:text-lg font-semibold">Parts Maintenance</p>
            </div>
            <div class="bg-white rounded-3xl shadow-lg xs:h-44 md:h-36 w-full border xs:p-2 md:p-4 flex xs:flex-col md:flex-row items-center xs:gap-x-2 lg:gap-x-6 justify-center text-center">
              <img src="{{asset('images/charting-icon.svg')}}" alt="Monitoring" class="xs:w-20 md:w-24">
              <p class="xs:text-base md:text-lg font-semibold">Charts Reporting</p>
            </div>
        </div>
    </section>
    
@endsection

@section('content')

    <section id="content" class="mt-32">
        <div class="container">
          <h1 class="text-center font-semibold text-xl">Vehicles Monitoring</h1>
          <section id="vehicles">
            <div class="flex justify-between items-end">
              {{-- title vehicles --}}
              <h2 class="text-2xl font-semibold">IVECO TRAKKER AD 410T44 H</h2>
  
              {{-- select vehicles --}}
              <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">Pick the Available Vehicles</span>
                </div>
                <select class="select select-bordered">
                  {{-- <option disabled selected>Pick one</option> --}}
                  <option selected>IVECO TRAKKER AD 410T44 H</option>
                  <option>IVECO TRAKKER AD 410T77 A</option>
                </select>
              </label>
            </div>

          </section>
        </div>
    </section>

@endsection