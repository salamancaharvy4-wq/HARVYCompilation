@csrf
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Assigned Employee</label>
        <select name="assigned_to" class="form-select" required>
            <option value="">Select employee</option>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}" @selected(old('assigned_to', $task->assigned_to ?? '') == $employee->id)>{{ $employee->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6"><label class="form-label">Deadline</label><input type="date" name="deadline" value="{{ old('deadline', isset($task) ? $task->deadline->format('Y-m-d') : '') }}" class="form-control" required></div>
    <div class="col-12"><label class="form-label">Task Title</label><input name="title" value="{{ old('title', $task->title ?? '') }}" class="form-control" required></div>
    <div class="col-12"><label class="form-label">Description</label><textarea name="description" rows="4" class="form-control">{{ old('description', $task->description ?? '') }}</textarea></div>
    <div class="col-md-6">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
            @foreach(\App\Models\Task::STATUSES as $status)<option value="{{ $status }}" @selected(old('status', $task->status ?? 'pending') === $status)>{{ ucfirst($status) }}</option>@endforeach
        </select>
    </div>
</div>
<div class="mt-4 d-flex gap-2"><button class="btn btn-primary">Save Task</button><a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Cancel</a></div>
