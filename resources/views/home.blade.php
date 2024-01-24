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

    <section id="content" class="xs:mt-32 md:mt-24 lg:mt-32">
        <div class="container">
          <h1 class="text-center font-semibold text-xl xs:pt-6 md:pt-0">Vehicles Monitoring</h1>
          <section id="vehicles">
            <div class="flex xs:flex-col-reverse md:flex-row md:justify-between md:items-end mt-4">
              {{-- title vehicles --}}
              <h2 class="text-2xl font-semibold mt-4">IVECO TRAKKER AD 410T44 H</h2>
  
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
            <div class="xs:mt-4 md:mt-8 xs:flex xs:flex-col-reverse md:grid md:grid-cols-2 xs:gap-4 md:gap-8">
              {{-- specs table --}}
              <div class="w-full">
                <div class="overflow-x-auto rounded-lg">
                  <table class="table border">
                    <!-- head -->
                    <thead>
                      <tr class="bg-primary text-center text-white">
                        <th colspan="2">{truck-name} Specifications</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- row 1 -->
                      <tr>
                        <td class="bg-secondary">Cy Ganderton</td>
                        <td>Quality Control Specialist</td>
                      </tr>
                      <!-- row 2 -->
                      <tr>
                        <td class="bg-secondary">Hart Hagerty</td>
                        <td>Desktop Support Technician</td>
                      </tr>
                      <!-- row 3 -->
                      <tr>
                        <td class="bg-secondary">Brice Swyre</td>
                        <td>Tax Accountant</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <img src="{{asset('images/truck-iveco.jpg')}}" alt="vehicles" class="w-full rounded-lg">
            </div>
          </section>
          <section id="parts" class="mt-8">
            {{-- search --}}
            {{-- <input type="text" placeholder="Search here..." class="input input-bordered w-full max-w-xs" /> --}}
            <label class="form-control max-w-36">
              <div class="label">
                <span class="label-text">Pick HM</span>
              </div>
              <select class="select select-bordered">
                {{-- <option disabled selected>Pick one</option> --}}
                <option selected>250</option>
                <option>500</option>
                <option>1000</option>
              </select>
            </label>
            <div class="overflow-x-auto xs:mt-3 md:mt-6 rounded-lg border">
              <table class="table">
                <!-- head -->
                <thead>
                  <tr class="bg-primary text-center text-white">
                    <th></th>
                    <th>HM (hours meter)</th>
                    <th>Description</th>
                    <th>Group Description</th>
                    <th>Part No</th>
                    <th>Part Description</th>
                    <th>Quantity</th>
                    <th>% Repl</th>
                    <th>Unit</th>
                    <th>Price</th>
                    <th>Total Price</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- row 1 -->
                  <tr class="hover">
                    <td>1</td>
                    <td>Cy Ganderton</td>
                    <td>Quality Control Specialist</td>
                    <td>Quality Control Specialist</td>
                    <td>Quality Control Specialist</td>
                    <td>Quality Control Specialist</td>
                    <td>Quality Control Specialist</td>
                    <td>Quality Control Specialist</td>
                    <td>Quality Control Specialist</td>
                    <td>Quality Control Specialist</td>
                    <td>Blue</td>
                  </tr>
                  <!-- row 2 -->
                  <tr class="hover">
                    <td>2</td>
                    <td>Hart Hagerty</td>
                    <td>Desktop Support Technician</td>
                    <td>Desktop Support Technician</td>
                    <td>Desktop Support Technician</td>
                    <td>Desktop Support Technician</td>
                    <td>Desktop Support Technician</td>
                    <td>Desktop Support Technician</td>
                    <td>Desktop Support Technician</td>
                    <td>Desktop Support Technician</td>
                    <td>Purple</td>
                  </tr>
                  <!-- row 3 -->
                  <tr class="hover">
                    <td>3</td>
                    <td>Brice Swyre</td>
                    <td>Tax Accountant</td>
                    <td>Tax Accountant</td>
                    <td>Tax Accountant</td>
                    <td>Tax Accountant</td>
                    <td>Tax Accountant</td>
                    <td>Tax Accountant</td>
                    <td>Tax Accountant</td>
                    <td>Tax Accountant</td>
                    <td>Red</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section>
        </div>
    </section>

@endsection