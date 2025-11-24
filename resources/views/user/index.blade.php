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
                <li class="breadcrumb-item active" aria-current="page">User / Tabel User</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Data User</h1>
                <p class="mb-0">Tabel dari list user</p>
            </div>
            <div>
                <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="far fa-question-circle me-1"></i>
                    Tambah User </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">

                        <form method="GET" action="{{ route('user.index') }}" class="mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="verified" class="form-select" onchange="this.form.submit()">
                                        <option value="">All</option>
                                        <option value="verified" {{ request('verified') == 'verified' ? 'selected' : '' }}>
                                            Unverified
                                        </option>
                                        <option value="unverified"
                                            {{ request('verified') == 'unverified' ? 'selected' : '' }}>
                                            Verified
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" id="exampleInputIconRight"
                                            value="{{ request('search') }}" placeholder="Search" aria-label="Search">
                                        <button type="submit" class="input-group-text" id="basic-addon2">
                                            <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                        @if (request('search'))
                                            <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                                class="btn btn-outline-secondary ml-3" id="clear-search"> Clear</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>

                        <table id="table-user" class="table table-centered table-nowrap mb-0 rounded">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-0">Detail</th>
                                    <th class="border-0">Name</th>
                                    <th class="border-0">Email</th>
                                    <th class="border-0">Password</th>
                                    <th class="border-0 rounded-end">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <td>

                                            <a href="{{ route('user.show', $item->id) }}" title="Lihat Profil">
                                                @if ($item->profile_picture)
                                                    <img src="{{ Storage::url($item->profile_picture) }}" alt="Profile"
                                                        class="rounded-circle" width="40" height="40"
                                                        style="object-fit: cover; border: 1px solid #ddd;">
                                                @else
                                                    <img src="https://www.shutterstock.com/image-vector/avatar-gender-neutral-silhouette-vector-600nw-2470054311.jpg"
                                                        alt="No Profile" class="rounded-circle" width="40"
                                                        height="40" style="object-fit: cover; border: 1px solid #ddd;">
                                                @endif
                                            </a>

                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->password }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary me-2" title="Edit">
                                                <a href="{{ route('user.edit', $item->id) }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                    Edit
                                                </a>
                                            </button>

                                            <!-- Delete Button -->
                                            <button type="button" class="btn btn-sm btn-danger" title="Hapus">
                                                <i class="bi bi-trash-fill"></i>Hapus
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <div class="mt-3">
                            {{ $user->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- end main content --}}
@endsection
