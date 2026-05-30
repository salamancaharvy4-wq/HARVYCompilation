<div class="table-responsive">
    <table class="table align-middle">
        <thead><tr><th>Task</th><th>Employee</th><th>Deadline</th><th>Status</th><th></th></tr></thead>
        <tbody>
        @forelse($tasks as $task)
            <tr>
                <td><strong>{{ $task->title }}</strong><div class="text-muted small">{{ $task->description }}</div></td>
                <td>{{ $task->employee->name }}</td>
                <td>{{ $task->deadline->format('M d, Y') }}</td>
                <td><x-badge :value="$task->status" /></td>
                <td class="text-end">
                    @if(auth()->user()->role === 'employee')
                        <form method="POST" action="{{ route('tasks.status', $task) }}" class="d-flex gap-2 justify-content-end">@csrf @method('PATCH')
                            <select name="status" class="form-select form-select-sm" style="max-width: 140px">
                                @foreach(\App\Models\Task::STATUSES as $status)<option value="{{ $status }}" @selected($task->status === $status)>{{ ucfirst($status) }}</option>@endforeach
                            </select>
                            <button class="btn btn-sm btn-primary">Update</button>
                        </form>
                    @elseif(empty($compact))
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="d-inline" onsubmit="return confirm('Delete this task?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></form>
                    @endif
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="text-center text-muted py-4">No tasks found.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
