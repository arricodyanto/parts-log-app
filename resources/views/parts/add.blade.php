@extends('layouts.app')

@section('hero')
    <section id="hero" class="h-[6rem] bg-secondary rounded-b-[3rem]">
    </section>
@endsection

@section('content')
    <div class="container mt-8 mb-16">
        <section id="title" class="flex xs:flex-col md:flex-row justify-between mb-8">
            <h1 class="text-2xl font-semibold">Add New Parts</h1>
            <div class="text-sm breadcrumbs">
                <ul>
                    <li>Parts Management</li>
                    <li><a href="{{route('parts.view')}}">List Data</a></li>
                    <li>Add New</li>
                </ul>
            </div>
        </section>
        <section id="form" class="mx-auto">
            <h2 class="text-lg font-semibold mt-4">Vehicle UID</h2>
            <div id="vehicle-uid">
                <div class="label">
                    <span class="label-text">Vehicle UID</span>
                </div>
                <select name="unit" id="vehicle-uid" class="select select-bordered xs:w-full md:w-1/2" required>
                    <option disabled selected>Select the vehicle you want to add parts to</option>
                    @foreach($vehicles as $index => $v)
                        <option value="{{ $v->id }}">{{ $v->name }}</option>
                    @endforeach
                </select>
            </div>

            <h2 class="text-lg font-semibold mt-4">Parts Identifications</h2>
            <div role="tablist" class="tabs tabs-bordered">
                <input type="radio" name="parts_tab" role="tab" class="tab bg-transparent border-t-0 border-x-0 focus:ring-0 focus:border-b-black hover:border-b-black focus:ring-transparent xs:w-44 md:w-64 h-12" aria-label="Add Manual" checked />
                <div role="tabpanel" class="tab-content py-5">
                    <form id="add-parts" method="POST" action="{{ route('parts.store') }}">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="vehicle_id" id="vehicle-id" />
                        <div id="parts-identification">
                            <div class="parts-row">
                                <div class="divider divider-start flex items-center">
                                    <a>
                                        Part No. 1
                                    </a>
                                    <button type="button" class="btn btn-circle btn-sm mb-2" onclick="removeRow(this)">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                    </button>
                                </div>
                                <div class="flex xs:flex-col md:flex-row gap-2 w-full">
                                    <div class="flex flex-col gap-2 w-full">
                                        <div>
                                            <div class="label">
                                                <span class="label-text">Hours Meter</span>
                                            </div>
                                            <input type="number" name="parts[0][hours_meter]" placeholder="Input part hours meter" class="input input-bordered w-full" />
                                        </div>
                                        <div>
                                            <div class="label">
                                                <span class="label-text">Description</span>
                                            </div>
                                            <textarea class="textarea textarea-bordered w-full" name="parts[0][desc]" placeholder="Descriptions"></textarea>
                                        </div>
                                        <div>
                                            <div class="label">
                                                <span class="label-text">Group Description</span>
                                            </div>
                                            <textarea class="textarea textarea-bordered w-full" name="parts[0][group_desc]" placeholder="Group Descriptions"></textarea>
                                        </div>
                                        <div>
                                            <div class="label">
                                                <span class="label-text">Part Description</span>
                                            </div>
                                            <textarea class="textarea textarea-bordered w-full" name="parts[0][part_desc]" placeholder="Part Descriptions"></textarea>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-2 w-full">
                                        <div>
                                            <div class="label">
                                                <span class="label-text">Part No</span>
                                            </div>
                                            <input type="text" name="parts[0][part_no]" placeholder="Input part no" class="input input-bordered w-full" />
                                        </div>
                                        <div class="xs:block md:flex md:gap-2 w-full">
                                            <div class="w-full">
                                                <div class="label">
                                                    <span class="label-text">Quantity</span>
                                                </div>
                                                <input type="number" name="parts[0][qty]" placeholder="Input part quantity" class="input input-bordered w-full" />
                                            </div>
                                            <div class="w-full">
                                                <div class="label">
                                                    <span class="label-text">Unit</span>
                                                </div>
                                                <select name="parts[0][unit]" class="select select-bordered w-full" required>
                                                    <option disabled selected>Select quantity unit</option>
                                                    <option value="PC">PC</option>
                                                    <option value="L">L</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="xs:block md:flex md:gap-2 w-full">
                                            <div class="w-full">
                                                <div class="label">
                                                    <span class="label-text">% Repl</span>
                                                </div>
                                                <label class="input input-bordered flex items-center gap-2">
                                                    <input type="number" name="parts[0][repl]" placeholder="Input part repl" class="grow border-none active:ring-0 focus:ring-0" />
                                                    %
                                                </label>
                                            </div>
                                            <div class="w-full">
                                                <div class="label">
                                                    <span class="label-text">Price</span>
                                                </div>
                                                <label class="input input-bordered flex items-center gap-2">
                                                    <svg viewBox="0 0 320 512" class="w-4 h-4 opacity-60" xmlns="http://www.w3.org/2000/svg"><path d="M302.1 358.1C293.2 407.8 251.4 439.4 192 446.4V480c0 17.67-14.28 32-31.96 32S128 497.7 128 480v-34.96c-.4434-.0645-.8359-.0313-1.281-.0977c-26.19-3.766-53.69-13.2-77.94-21.53l-11.03-3.766C21.03 414 12.03 395.8 17.69 379.1s23.88-25.73 40.56-20.08l11.31 3.859c21.59 7.406 46.03 15.81 66.41 18.73c47.09 6.953 97.06-.8438 103.1-34.09c5.188-28.55-11.16-39.89-87.53-60.7L136.5 282.7C92.59 270.4 1.25 244.9 17.97 153C26.82 104.1 68.44 72.48 128 65.51V32c0-17.67 14.33-32 32.02-32S192 14.33 192 32v34.95c.4414 .0625 .8398 .0449 1.281 .1113c16.91 2.531 36.22 7.469 60.72 15.55c16.81 5.531 25.94 23.61 20.41 40.41c-5.531 16.77-23.69 25.86-40.41 20.38c-20.72-6.812-37.12-11.08-50.16-13.02C137 123.4 86.97 131.2 80.91 164.5C76.5 188.8 85.66 202 153.8 221l14.59 4.016C228.3 241.4 318.9 266.1 302.1 358.1z"/></svg>
                                                    <input type="number" name="parts[0][price]" placeholder="Input part price" class="grow border-none active:ring-0 focus:ring-0" />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="flex gap-2 w-full mt-8">
                        <button type="button" class="btn btn-circle" onclick="addRow()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                        <button type="button" id="submit-parts" onclick="submitForm()" class="btn btn-primary text-white xs:w-fit md:w-1/5">Save Changes</button>
                        <a href="{{ route('parts.view') }}" class="w-full">
                            <button type="button" class="btn btn-outline btn-primary hover:text-white xs:w-1/2 md:w-1/4">Cancel</button>
                        </a>
                    </div>
                </div>

                <input type="radio" name="parts_tab" role="tab" class="tab bg-transparent border-t-0 border-x-0 focus:ring-0 focus:border-b-black hover:border-b-black focus:ring-transparent xs:w-44 md:w-64 h-12" aria-label="Upload From a File" />
                <div role="tabpanel" class="tab-content py-5">
                    <div class="w-full">
                        <form id="upload-parts" method="POST" action="{{ route('parts.storeExcel') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="vehicle_id" id="id_vehicle" />
                            <div class="label">
                                <span class="label-text">Parts Log</span>
                            </div>
                            <input id="input-image-preview" type="file" name="parts_log" class="file-input file-input-bordered file-input-ghost xs:w-full md:w-1/2" accept=".xls, .xlsx" />
                        </form>
                        <div class="flex gap-2 w-full mt-8">
                            <button type="button" id="submit-parts" onclick="submitUploadForm()" class="btn btn-primary text-white xs:w-fit md:w-1/5">Save Changes</button>
                            <a href="{{ route('parts.view') }}" class="w-full">
                                <button type="button" class="btn btn-outline btn-primary hover:text-white xs:w-1/2 md:w-1/4">Cancel</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>

    <script>
        function addRow() {
            var container = document.getElementById('parts-identification');
            var index = container.children.length + 1;
            var partIndex = container.children.length;

            var newRow = document.createElement('div');
            newRow.classList.add('xs:my-8', 'md:my-2', 'parts-row');
            newRow.innerHTML = `
                <div class="parts-row">
                    <div class="divider divider-start flex items-center">
                        <a>
                            Part No. ${index}
                        </a>
                        <button type="button" class="btn btn-circle btn-sm mb-2" onclick="removeRow(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>
                    <div class="flex xs:flex-col md:flex-row gap-2 w-full">
                        <div class="flex flex-col gap-2 w-full">
                            <div>
                                <div class="label">
                                    <span class="label-text">Hours Meter</span>
                                </div>
                                <input type="number" name="parts[${partIndex}][hours_meter]" placeholder="Input part hours meter" class="input input-bordered w-full" />
                            </div>
                            <div>
                                <div class="label">
                                    <span class="label-text">Description</span>
                                </div>
                                <textarea class="textarea textarea-bordered w-full" name="parts[${partIndex}][desc]" placeholder="Descriptions"></textarea>
                            </div>
                            <div>
                                <div class="label">
                                    <span class="label-text">Group Description</span>
                                </div>
                                <textarea class="textarea textarea-bordered w-full" name="parts[${partIndex}][group_desc]" placeholder="Group Descriptions"></textarea>
                            </div>
                            <div>
                                <div class="label">
                                    <span class="label-text">Part Description</span>
                                </div>
                                <textarea class="textarea textarea-bordered w-full" name="parts[${partIndex}][part_desc]" placeholder="Part Descriptions"></textarea>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 w-full">
                            <div>
                                <div class="label">
                                    <span class="label-text">Part No</span>
                                </div>
                                <input type="text" name="parts[${partIndex}][part_no]" placeholder="Input part no" class="input input-bordered w-full" />
                            </div>
                            <div class="xs:block md:flex md:gap-2 w-full">
                                <div class="w-full">
                                    <div class="label">
                                        <span class="label-text">Quantity</span>
                                    </div>
                                    <input type="number" name="parts[${partIndex}][qty]" placeholder="Input part quantity" class="input input-bordered w-full" />
                                </div>
                                <div class="w-full">
                                    <div class="label">
                                        <span class="label-text">Unit</span>
                                    </div>
                                    <select name="parts[${partIndex}][unit]" class="select select-bordered w-full" required>
                                        <option disabled selected>Select quantity unit</option>
                                        <option value="PC">PC</option>
                                        <option value="L">L</option>
                                    </select>
                                </div>
                            </div>
                            <div class="xs:block md:flex md:gap-2 w-full">
                                <div class="w-full">
                                    <div class="label">
                                        <span class="label-text">% Repl</span>
                                    </div>
                                    <label class="input input-bordered flex items-center gap-2">
                                        <input type="number" name="parts[${partIndex}][repl]" placeholder="Input part repl" class="grow border-none active:ring-0 focus:ring-0" />
                                        %
                                    </label>
                                </div>
                                <div class="w-full">
                                    <div class="label">
                                        <span class="label-text">Price</span>
                                    </div>
                                    <label class="input input-bordered flex items-center gap-2">
                                        <svg viewBox="0 0 320 512" class="w-4 h-4 opacity-60" xmlns="http://www.w3.org/2000/svg"><path d="M302.1 358.1C293.2 407.8 251.4 439.4 192 446.4V480c0 17.67-14.28 32-31.96 32S128 497.7 128 480v-34.96c-.4434-.0645-.8359-.0313-1.281-.0977c-26.19-3.766-53.69-13.2-77.94-21.53l-11.03-3.766C21.03 414 12.03 395.8 17.69 379.1s23.88-25.73 40.56-20.08l11.31 3.859c21.59 7.406 46.03 15.81 66.41 18.73c47.09 6.953 97.06-.8438 103.1-34.09c5.188-28.55-11.16-39.89-87.53-60.7L136.5 282.7C92.59 270.4 1.25 244.9 17.97 153C26.82 104.1 68.44 72.48 128 65.51V32c0-17.67 14.33-32 32.02-32S192 14.33 192 32v34.95c.4414 .0625 .8398 .0449 1.281 .1113c16.91 2.531 36.22 7.469 60.72 15.55c16.81 5.531 25.94 23.61 20.41 40.41c-5.531 16.77-23.69 25.86-40.41 20.38c-20.72-6.812-37.12-11.08-50.16-13.02C137 123.4 86.97 131.2 80.91 164.5C76.5 188.8 85.66 202 153.8 221l14.59 4.016C228.3 241.4 318.9 266.1 302.1 358.1z"/></svg>
                                        <input type="number" name="parts[${partIndex}][price]" placeholder="Input part price" class="grow border-none active:ring-0 focus:ring-0" />
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(newRow);
        }

        function removeRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
            // Update part numbers
            var rows = document.querySelectorAll('.parts-row');
            rows.forEach((row, index) => {
                row.querySelector('a').innerText = `Part No. ${index + 1}`;
            });
        }

        document.getElementById('vehicle-uid').addEventListener('change', function(event) {
            document.getElementById('vehicle-id').value = event.target.value;
            document.getElementById('id_vehicle').value = event.target.value;
        });

        function submitForm() {
            var form = document.getElementById('add-parts');

            // Melakukan submit form
            form.submit();
        }

        function submitUploadForm() {
            var form = document.getElementById('upload-parts');
            // Melakukan submit form
            form.submit();
        }

    </script>
@endsection
