@extends('layouts.admin.app')

@section('content')
    <div class="py-4">
        <div class="card shadow-lg mx-auto" style="max-width: 500px;">
            <div class="card-body text-center">

                <h2 class="mb-4">User Profile</h2>

                @if ($user->profile_picture)
                    <img src="{{ Storage::url($user->profile_picture) }}" alt="Profile Picture" class="rounded-circle mb-3"
                        width="150" height="150" style="object-fit: cover;">
                @else
                    <div class="mb-3 text-muted">No profile picture uploaded.</div>
                @endif

                <h4 class="mb-1">{{ $user->name }}</h4>
                <p class="text-muted">{{ $user->email }}</p>

                <hr>

                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary w-100 mt-3">
                    Edit Profile
                </a>
            </div>
        </div>
    </div>
@endsection
