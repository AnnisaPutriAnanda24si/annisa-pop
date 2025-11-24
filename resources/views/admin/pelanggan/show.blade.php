@extends('layouts.admin.app')

@section('content')
    <div class="py-4">
        <h2 class="mb-4 text-center">Files Uploaded by {{ $pelanggan->first_name }} {{ $pelanggan->last_name }}</h2>

        @if ($files && $files->count() > 0)
            <div class="row g-3">
                @foreach ($files as $file)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card shadow-sm">
                            <a href="{{ Storage::url($file->filename) }}" target="_blank">
                                @php
                                    $ext = pathinfo($file->filename, PATHINFO_EXTENSION);
                                @endphp

                                @if (in_array($ext, ['png', 'jpg', 'jpeg', 'gif', 'webp']))
                                    <img src="{{ Storage::url($file->filename) }}" class="card-img-top"
                                        style="object-fit: cover; height: 150px;">
                                @else
                                    <div class="d-flex align-items-center justify-content-center bg-light"
                                        style="height: 150px;">
                                        <i class="bi bi-file-earmark-text" style="font-size: 3rem;"></i>
                                    </div>
                                @endif
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-muted mt-4">
                No files uploaded yet.
            </div>
        @endif

        <div class="text-center mt-4">
            <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-primary">Back to List</a>
        </div>
    </div>
@endsection
