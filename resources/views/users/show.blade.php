@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">User Details</h2>

    <div class="space-y-4">
        <div>
            <strong class="text-gray-700">Name:</strong>
            <p class="text-gray-900">{{ $user->name }}</p>
        </div>
        <div>
            <strong class="text-gray-700">Email:</strong>
            <p class="text-gray-900">{{ $user->email }}</p>
        </div>
        <div>
            <strong class="text-gray-700">Role:</strong>
            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                {{ ucfirst($user->role) }}
            </span>
        </div>
        <div>
            <strong class="text-gray-700">Created At:</strong>
            <p class="text-gray-900">{{ $user->created_at->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>

    <a href="{{ route('users.index') }}" 
       class="mt-6 inline-block bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition">
        Back
    </a>
</div>
@endsection



