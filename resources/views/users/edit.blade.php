@extends('layouts.app')

@section('hero')
    <section id="hero" class="h-[6rem] bg-secondary rounded-b-[3rem]">
    </section>
@endsection

@section('content')
    <div class="container mt-8 mb-16">
        <section id="title" class="flex xs:flex-col md:flex-row justify-between mb-8">
            <h1 class="text-2xl font-semibold">Edit {{ $user->name }} Profile</h1>
            <div class="text-sm breadcrumbs">
                <ul>
                    <li>Accounts Management</li>
                    <li><a href="{{route('users.view')}}">List Data</a></li>
                    <li>Edit</li>
                </ul>
            </div>
        </section>
        <section id="form" class="max-w-[900px] mx-auto">
            <h2 class="text-lg font-semibold mt-4">Profile Photo</h2>
{{--            <form id="specifications-form" method="POST" action="{{ route('vehicles.update', ['vehicle' => $vehicle->id]) }}" enctype="multipart/form-data">--}}
            <form id="specifications-form" method="POST" action="{{ route('users.update', ['user' => $user->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div id="user-profile">
                    <div class="label">
                        <span class="label-text">Profile Picture</span>
                    </div>
                    <img id="image-preview" src="{{ asset('/images/avatar/' . ($user->avatar ?? 'default-image.jpg')) }}" alt="avatar-preview" class="mb-4 xs:w-full md:w-1/5 rounded-full aspect-square object-cover">
                    <input id="input-image-preview" type="file" name="avatar" class="file-input file-input-bordered file-input-ghost xs:w-full md:w-1/2" />

                    <h2 class="text-lg font-semibold mt-6">Account Details</h2>
                    <div class="flex gap-2 items-end w-full">
                        <div class="w-full">
                            <div class="label">
                                <span class="label-text">Name</span>
                            </div>
                            <input type="text" name="name" value="{{ $user->name }}" class="input input-bordered w-full" />
                        </div>
                        <div class="w-full">
                            <div class="label">
                                <span class="label-text">Email Address</span>
                            </div>
                            <input type="email" name="email" value="{{ $user->email }}" class="input input-bordered w-full" />
                        </div>
                    </div>
                    <div class="label">
                        <span class="label-text">Account Role</span>
                    </div>
                    <select class="select select-bordered xs:w-full md:w-1/2 capitalize" name="role">
                        <option disabled selected>Pick one</option>
                        @foreach($roles as $item)
                            @if($item == $user->role)
                                <option value="{{ $item }}" selected>{{ $item }}</option>
                            @else
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="mt-6 btn btn-primary text-white xs:w-1/2 md:w-[calc(50%-5rem)]">Save Changes</button>
            </form>
        </section>
    </div>
@endsection
