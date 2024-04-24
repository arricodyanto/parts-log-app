@extends('layouts.app')

@section('hero')
    <section id="hero" class="h-[6rem] bg-secondary rounded-b-[3rem]">
    </section>
@endsection

@section('content')
    <div class="container mt-8 mb-16">
        <section id="title" class="flex xs:flex-col md:flex-row justify-between mb-8">
            <h1 class="text-2xl font-semibold">Add New Account</h1>
            <div class="text-sm breadcrumbs">
                <ul>
                    <li>Accounts Management</li>
                    <li><a href="{{route('users.view')}}">List Data</a></li>
                    <li>Add New</li>
                </ul>
            </div>
        </section>
        <section id="form" class="max-w-[900px] mx-auto">
            <h2 class="text-lg font-semibold mt-4">Profile Photo</h2>
            <form id="specifications-form" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div id="user-profile">
                    <div class="label">
                        <span class="label-text">Profile Picture</span>
                    </div>
                    <img id="image-preview" src="{{ asset('/images/avatar/default-image.jpg') }}" alt="avatar-preview" class="mb-4 xs:w-full md:w-1/5 rounded-full aspect-square object-cover">
                    <input id="input-image-preview" type="file" name="avatar" class="file-input file-input-bordered file-input-ghost xs:w-full md:w-1/2" />

                    <h2 class="text-lg font-semibold mt-6">Account Details</h2>
                    <div class="flex gap-2 items-end w-full">
                        <div class="w-full">
                            <div class="label">
                                <span class="label-text">Name</span>
                            </div>
                            <input type="text" name="name" class="input input-bordered w-full" />
                        </div>
                        <div class="w-full">
                            <div class="label">
                                <span class="label-text">Email Address</span>
                            </div>
                            <input type="email" name="email" class="@error('email') is-invalid @enderror input input-bordered w-full" />
                        </div>
                    </div>
                    <div class="flex gap-2 items-end w-full">
                        <div class="w-full">
                            @error('name')
                                <div class="alert alert-error text-white text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full">
                            @error('email')
                                <div class="alert alert-error text-white text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex gap-2 items-end w-full">
                        <div class="w-full">
                            <div class="label">
                                <span class="label-text">Password</span>
                            </div>
                            <input id="password" type="password" name="password" class="@error('password') is-invalid @enderror input input-bordered w-full" />
                        </div>
                        <div class="w-full">
                            <div class="label">
                                <span class="label-text">Confirm Password</span>
                            </div>
                            <input id="confirm-password" type="password" oninput="checkPassword()" class="input input-bordered w-full" />
                        </div>
                    </div>
                    <div class="flex gap-2 items-end w-full">
                        <div class="w-full">
                            @error('password')
                                <div class="alert alert-error text-white text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <div class="alert alert-error text-white text-sm mt-2 hidden" id="password-error">Password did not match!</div>
                        </div>
                    </div>
                    <div class="label">
                        <span class="label-text">Account Role</span>
                    </div>
                    <select class="select select-bordered xs:w-full md:w-1/2 capitalize" name="role">
                        <option disabled selected>Pick one</option>
                        @foreach($roles as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="mt-6 btn btn-primary text-white xs:w-1/2 md:w-[calc(50%-5rem)]">Save Changes</button>
            </form>
        </section>
    </div>

    <script>
        function checkPassword() {
            // var passwordValue = document.getElementById('password').value;
            let passwordValue = $('#password').val();
            let confirmPasswordValue = $('#confirm-password').val();
            var passwordError = document.getElementById('password-error');

            if (passwordValue !== confirmPasswordValue) {
                passwordError.classList.remove('hidden');
            } else {
                passwordError.classList.add('hidden');
            }
        }
    </script>
@endsection
