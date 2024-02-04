@extends('layouts.app')

@section('hero')
    <section id="hero" class="h-[6rem] bg-secondary rounded-b-[3rem]">
    </section>
@endsection

@section('content')
    <div class="container mt-8">
        <section id="title" class="flex justify-between">
            <h1 class="text-2xl font-semibold">{{ $vehicle->name }}</h1>
            <div class="text-sm breadcrumbs">
                <ul>
                  <li><a href="{{route('vehicles.view')}}">Vehicles Management</a></li>
                  <li><a href="{{route('vehicles.view')}}">List Data</a></li>
                  <li>Edit</li>
                </ul>
              </div>
        </section>
        <section id="form">
            <h2 class="text-lg font-semibold mt-4">Vehicle Identifications</h2>
            <div class="label">
                <span class="label-text">Name</span>
            </div>
            <input type="text" value="{{ $vehicle->name }}" class="input input-bordered w-full max-w-xs" />

            <h2 class="text-lg font-semibold mt-8">Vehicle Specifications</h2>
            @foreach ($specifications as $item)
                <div class="flex justify-center">
                    <div class="flex gap-2 items-end w-3/4">
                        <div class="w-full">
                            <div class="label">
                                <span class="label-text">Specifications Name</span>
                            </div>
                            <input type="text" value="{{ $item->specs }}" class="input input-bordered w-full" />
                        </div>
                        <div class="div w-full">
                            <div class="label">
                                <span class="label-text">Specifications Value</span>
                            </div>
                            <input type="text" value="{{ $item->specs_value }}" class="input input-bordered w-full" />
                        </div>
                        <button class="btn btn-circle btn-sm mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>

                </div>
            @endforeach
        </section>
    </div>
@endsection