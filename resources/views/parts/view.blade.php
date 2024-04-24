@extends('layouts.app')

@section('hero')
    <section id="hero" class="h-[6rem] bg-secondary rounded-b-[3rem]">

    </section>
@endsection

@section('content')
    <div class="container mt-8 mb-16">
        <section id="title" class="flex xs:flex-col md:flex-row justify-between xs:mb-4 md:mb-0">
            <h1 class="text-2xl font-semibold">Parts Management</h1>
            <div class="text-sm breadcrumbs">
                <ul>
                  <li><a href="{{route('parts.view')}}">Parts Management</a></li>
                  <li>List Data</li>
                </ul>
              </div>
        </section>
        <section id="vehicles-data">
          <div class="flex xs:justify-start md:justify-end">
            <a href="{{ route('parts.add') }}">
              <button class="btn btn-primary text-white mt-6 px-6">Tambah Data</button>
            </a>
          </div>
          <div class="overflow-x-auto xs:mt-3 md:mt-4 rounded-lg border">
              <table class="table">
                  <!-- head -->
                  <thead>
                     <tr class="bg-primary text-center text-white">
                        <th></th>
                        <th>Image</th>
                        <th>Vehicle Name</th>
                        <th>Parts Log Count</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- sort by hours_meter --}}
                    @if(count($vehicles) > 0)
                        @foreach($vehicles as $index => $vehicle)
                            <tr class="hover">
                                <td class="text-center">{{ $vehicles->firstItem() + $index }}</td>
                                <td class="flex justify-center">
                                  <img src="{{ asset('/images/' . ($vehicle->vehicle_photo ?? 'default-image.jpg')) }}" alt="{{ $vehicle->name }}'s Image" class="max-w-64 aspect-[5/3] object-cover rounded-lg">
                                </td>
                                <td class="text-center">{{ $vehicle->name }}</td>
                                <td class="text-center italic">{{ count($vehicle->parts) }} parts log registered.</td>
                                <td class="text-center">
                                    <div class="flex xs:flex-col md:flex-row gap-2 justify-center">
                                        <a href="{{route('parts.edit', ['vehicle' => $vehicle->id])}}">
                                            <button class="btn btn-sm btn-warning text-white w-max">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                                <p class="xs:hidden lg:flex">Edit</p>
                                            </button>
                                        </a>
                                        <button class="btn btn-sm btn-error text-white w-max" onclick="showDeleteDialog('{{ $vehicle->id }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                            <p class="xs:hidden lg:flex">Delete</p>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="14" class="text-center">no data</td>
                        </tr>
                    @endif
                  </tbody>
              </table>
            </div>
            <div class="mt-4">
                {{ $vehicles->links('components.pagination') }}
            </div>
            <dialog id="delete_dialog" class="modal">
              <div class="modal-box">
                  <h3 class="font-bold text-lg">Confirmation Dialog</h3>
                  <p class="py-4">Are you sure want to delete all this parts log data from this vehicle?</p>
                  <div class="modal-action">
                      <form action="" method="post" id="delete-form">
                      @csrf
                      @method('delete')
                      <input type="hidden" name="vehicle_id" id="delete-vehicle-id" value="">
                      <button type="button" class="btn btn-error btn-outline hover:text-white" onclick="submitDeleteForm()">Delete</button>
                    </form>
                    <form method="dialog">
                      <button class="btn btn-primary text-white">Cancel</button>
                    </form>
                  </div>
              </div>
            </dialog>
        </section>
    </div>
    <script>
        function showDeleteDialog(vehicleId) {
            // Set nilai pada input tersembunyi di dalam modal
            document.getElementById('delete-vehicle-id').value = vehicleId;
            // Tampilkan modal
            // delete_dialog.showModal();
            document.getElementById('delete_dialog').showModal();
        }

        function submitDeleteForm() {
            // Ambil nilai vehicleId dari input tersembunyi
            var vehicleId = document.getElementById('delete-vehicle-id').value;

            // Deklarasikan route url dari form delete
            var urlAction = "{{ route('parts.delete', ['vehicle' => ':vehicle']) }}"
            var finalUrl = urlAction.replace(':vehicle', vehicleId);

            // Ganti nilai 'vehicleId' pada action formulir
            var form = document.getElementById('delete-form');
            form.action = finalUrl;

            // Submit formulir
            form.submit();
        }
    </script>
@endsection
