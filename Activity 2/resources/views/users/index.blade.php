@extends('layouts.app')
@section('title', 'Users Management')
@section('content')
<div class="card p-4"><h2 class="h6 mb-3">System Users</h2><table class="table align-middle"><thead><tr><th>Name</th><th>Email</th><th>Role</th><th>Joined</th></tr></thead><tbody>@foreach($users as $user)<tr><td>{{ $user->name }}</td><td>{{ $user->email }}</td><td><span class="badge bg-secondary">{{ ucfirst($user->role) }}</span></td><td>{{ $user->created_at->format('M d, Y') }}</td></tr>@endforeach</tbody></table>{{ $users->links() }}</div>
@endsection
