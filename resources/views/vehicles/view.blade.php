@extends('layouts.app')

@section('hero')
    <section id="hero" class="h-[6rem] bg-secondary rounded-b-[3rem]">

    </section>
@endsection

@section('content')
    <div class="container mt-8">
        <section id="title" class="flex justify-between">
            <h1 class="text-2xl font-semibold">Vehicles Management</h1>
            <div class="text-sm breadcrumbs">
                <ul>
                  <li><a href="{{route('vehicles.view')}}">Vehicles Management</a></li>
                  <li>List Data</li>
                </ul>
              </div>
        </section>
        <section id="vehicles-data">
            <div class="overflow-x-auto xs:mt-3 md:mt-6 rounded-lg border">
                <table class="table">
                    <!-- head -->
                    <thead>
                      <tr class="bg-primary text-center text-white">
                        <th></th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Specifications</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{-- sort by hours_meter --}}
                      @if (count($vehicles) > 0) 
                        @foreach ($vehicles as $index => $vehicle)
                          <tr class="hover">
                              <td class="text-center">{{$index + 1}}</td>
                              <td class="text-center">{{$vehicle->name}}</td>
                              <td class="flex justify-center">
                                  <img src="/images/{{$vehicle->vehicle_photo}}" alt="{{$vehicle->name}}'s Image" class="max-w-64 aspect-[5/3] object-cover rounded-lg">
                              </td>
                              <td>
                                specs
                              </td>
                              <td class="">
                                <div class="flex gap-2 justify-center">
                                    <a href="{{route('vehicles.edit', $vehicle->id)}}">
                                        <button class="btn btn-sm btn-warning text-white">
                                            <img src="/images/pencil.svg" alt="Edit Button" class="w-3">
                                            Edit  
                                        </button>
                                    </a>
                                    <button class="btn btn-sm btn-error text-white">
                                        <img src="/images/trash.svg" alt="Edit Button" class="w-3">
                                        Delete
                                    </button>
                                </div>
                              </td>
                          </tr>
                        @endforeach
                      @else
                        <tr>
                          <td colspan="11" class="text-center">no data</td>
                        </tr>
                      @endif
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $vehicles->links('components.pagination') }}
            </div>
        </section>
    </div>
@endsection