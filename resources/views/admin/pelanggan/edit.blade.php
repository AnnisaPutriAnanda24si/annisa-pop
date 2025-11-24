@extends('layouts.admin.app')
@section('content')
    {{-- start main content --}}
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">Volt</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pelanggan / Tambah Pelanggan</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Tambah Pelanggan</h1>
                <p class="mb-0">Form untuk menambahkan pelanggan baru</p>
            </div>
            <div>
                <a href="pelanggan.index" class="btn btn-primary"><i class="far fa-question-circle me-1"></i>
                    Kembali </a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-12 mb-4">
            <form action="{{ route('pelanggan.update', $pelanggan->pelanggan_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        @if (session('success'))
                            <div class='alert alert-info'>
                                {!! session('success') !!}
                            </div>
                        @endif

                        <div class="row mb-4">
                            <!-- First Name -->
                            <div class="col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label for="firstName">First name</label>
                                    <input type="text" class="form-control" id="firstName" name="first_name"
                                        placeholder="Enter first name"
                                        value="{{ old('first_name', $pelanggan->first_name) }}" required>
                                </div>
                            </div>

                            <!-- Last Name -->
                            <div class="col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label for="lastName">Last name</label>
                                    <input type="text" class="form-control" id="lastName" name="last_name"
                                        placeholder="Enter last name" value="{{ old('last_name', $pelanggan->last_name) }}"
                                        required>
                                </div>
                            </div>

                            <!-- Birthday -->
                            <div class="col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label for="birthday">Birthday</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday"
                                        value="{{ old('birthday', $pelanggan->birthday) }}" required>
                                </div>
                            </div>

                            <!-- Gender -->
                            <div class="col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label for="gender">Gender</label>
                                    <select class="form-select" id="gender" name="gender" required>
                                        <option disabled>-- Pilih --</option>
                                        <option value="Male" {{ $pelanggan->gender == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ $pelanggan->gender == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                        <option value="Other" {{ $pelanggan->gender == 'Other' ? 'selected' : '' }}>Other
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter email" value="{{ old('email', $pelanggan->email) }}" required>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        placeholder="Enter phone number" value="{{ old('phone', $pelanggan->phone) }}"
                                        required>
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-dark me-2">Update</button>
                            <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-warning">Batal</a>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>


    <div class="card theme-settings bg-gray-800 theme-settings-expand" id="theme-settings-expand">
        <div class="card-body bg-gray-800 text-white rounded-top p-3 py-2">
            <span class="fw-bold d-inline-flex align-items-center h6">
                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                        clip-rule="evenodd"></path>
                </svg>
                Settings
            </span>
        </div>
    </div>

    {{-- end main content --}}
@endsection
