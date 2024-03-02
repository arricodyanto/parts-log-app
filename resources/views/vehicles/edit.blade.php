@extends('layouts.app')

@section('hero')
    <section id="hero" class="h-[6rem] bg-secondary rounded-b-[3rem]">
    </section>
@endsection

@section('content')
    <div class="container mt-8 mb-16">
        <section id="title" class="flex xs:flex-col md:flex-row justify-between mb-8">
            <h1 class="text-2xl font-semibold">{{ $vehicle->name }}</h1>
            <div class="text-sm breadcrumbs">
                <ul>
                    <li>Vehicles Management</li>
                    <li><a href="{{route('vehicles.view')}}">List Data</a></li>
                    <li>Edit</li>
                </ul>
            </div>
        </section>
        <section id="form" class="max-w-[900px] mx-auto">
            <h2 class="text-lg font-semibold mt-4">Vehicle Identifications</h2>
            <form id="specifications-form" method="POST" action="{{ route('vehicles.update', ['vehicle' => $vehicle->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div id="vehicle-identification">
                    <div class="label">
                        <span class="label-text">Name</span>
                    </div>
                    <input type="text" name="name" value="{{ $vehicle->name }}" class="input input-bordered xs:w-full md:w-1/2" />
                    <div class="label">
                        <span class="label-text">Vehicle Photo</span>
                    </div>
                    <img id="image-preview" src="{{ asset('/images/' . ($vehicle->vehicle_photo ?? 'default-image.jpg')) }}" alt="vehicle-preview" class="mb-4 xs:w-full md:w-1/2 rounded">
                    <input id="input-image-preview" type="file" name="vehicle_photo" class="file-input file-input-bordered file-input-ghost xs:w-full md:w-1/2" />
                </div>

                <h2 class="text-lg font-semibold mt-8">Vehicle Specifications</h2>

                <div id="specifications-container">
                    @foreach ($specifications->sortBy('created_at') as $index => $item)
                        <div class="flex justify-center mb-2 specification-row">
                            <div class="flex gap-2 items-end w-full">
                                <input type="hidden" name="specifications[{{ $index }}][id]" value="{{ $item->id }}">
                                <div class="xs:w-full md:w-3/4">
                                    <div class="label">
                                        <span class="label-text">Specifications Name</span>
                                    </div>
                                    <input type="text" name="specifications[{{ $index }}][specs]" value="{{ $item->specs }}" class="input input-bordered w-full" required/>
                                </div>
                                <div class="div w-full">
                                    <div class="label">
                                        <span class="label-text">Specifications Value</span>
                                    </div>
                                    <input type="text" name="specifications[{{ $index }}][specs_value]" value="{{ $item->specs_value }}" class="input input-bordered w-full" required/>
                                </div>
                                <button class="btn btn-circle btn-sm mb-2" onclick="removeRow(this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary text-white translate-y-20 xs:w-1/2 md:w-[calc(50%-5rem)]">Save Changes</button>
            </form>
            <button class="btn btn-outline btn-primary hover:text-white -translate-y-8 w-[calc(100%-2.5rem)]" onclick="addRow()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>     
                Add another             
            </button>
        </section>
    </div>

    <script>
        var specificationsArray = @json($specifications);
    
        function addRow() {
            var container = document.getElementById('specifications-container');
            var index = container.children.length;
    
            var specData = specificationsArray.length > index ? specificationsArray[index] : {};
    
            var newRow = document.createElement('div');
            newRow.classList.add('flex', 'justify-center', 'mb-2', 'specification-row');
            newRow.innerHTML = `
                <div class="flex gap-2 items-end w-full">
                    <input type="hidden" name="specifications[${index}][id]" value="${specData.id || ''}">
                    <div class="w-3/4">
                        <div class="label">
                            <span class="label-text">Specifications Name</span>
                        </div>
                        <input type="text" name="specifications[${index}][specs]" value="${specData.specs || ''}" class="input input-bordered w-full" required/>
                    </div>
                    <div class="div w-full">
                        <div class="label">
                            <span class="label-text">Specifications Value</span>
                        </div>
                        <input type="text" name="specifications[${index}][specs_value]" value="${specData.specs_value || ''}" class="input input-bordered w-full" required/>
                    </div>
                    <button class="btn btn-circle btn-sm mb-2" onclick="removeRow(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>`;
    
            container.appendChild(newRow);
        }
    
        function removeRow(button) {
            var row = button.closest('.specification-row');
            row.remove();
        }
    </script>
@endsection