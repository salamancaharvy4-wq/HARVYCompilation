@extends('layouts.app')
@section('title', 'Employee Management')
@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h6 mb-0">Employee List</h2>
        <a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle me-1"></i>Add Employee</a>
    </div>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Name</th><th>Email</th><th>Department</th><th>Position</th><th>Contact</th><th></th></tr></thead>
            <tbody>
            @forelse($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td><td>{{ $employee->email }}</td><td>{{ $employee->department }}</td><td>{{ $employee->position }}</td><td>{{ $employee->contact_number ?? 'None' }}</td>
                    <td class="text-end">
                        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('employees.destroy', $employee) }}" class="d-inline" onsubmit="return confirm('Delete this employee?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center text-muted py-4">No employees found.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $employees->links() }}
</div>
@endsection
