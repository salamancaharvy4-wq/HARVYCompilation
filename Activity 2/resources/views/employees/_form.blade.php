@csrf
<div class="row g-3">
    <div class="col-md-6"><label class="form-label">Full Name</label><input name="name" value="{{ old('name', $employee->name ?? '') }}" class="form-control" required></div>
    <div class="col-md-6"><label class="form-label">Email</label><input type="email" name="email" value="{{ old('email', $employee->email ?? '') }}" class="form-control" required></div>
    <div class="col-md-6"><label class="form-label">Department</label><input name="department" value="{{ old('department', $employee->department ?? '') }}" class="form-control" required></div>
    <div class="col-md-6"><label class="form-label">Position</label><input name="position" value="{{ old('position', $employee->position ?? '') }}" class="form-control" required></div>
    <div class="col-md-6"><label class="form-label">Contact Number</label><input name="contact_number" value="{{ old('contact_number', $employee->contact_number ?? '') }}" class="form-control"></div>
    <div class="col-md-6"><label class="form-label">Password</label><input type="password" name="password" class="form-control" {{ isset($employee) ? '' : 'required' }}></div>
    <div class="col-md-6"><label class="form-label">Confirm Password</label><input type="password" name="password_confirmation" class="form-control" {{ isset($employee) ? '' : 'required' }}></div>
</div>
<div class="mt-4 d-flex gap-2">
    <button class="btn btn-primary">Save Employee</button>
    <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
