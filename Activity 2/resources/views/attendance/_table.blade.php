<div class="table-responsive">
    <table class="table align-middle">
        <thead>
            <tr><th>Employee</th><th>Date</th><th>Time In</th><th>Time Out</th><th>Status</th></tr>
        </thead>
        <tbody>
        @forelse($attendances as $attendance)
            <tr>
                <td>{{ $attendance->user->name }}</td>
                <td>{{ $attendance->date->format('M d, Y') }}</td>
                <td>{{ $attendance->time_in?->format('h:i A') ?? 'None' }}</td>
                <td>{{ $attendance->time_out?->format('h:i A') ?? 'None' }}</td>
                <td><x-badge :value="$attendance->time_out ? $attendance->status : 'incomplete'" /></td>
            </tr>
        @empty
            <tr><td colspan="5" class="text-center text-muted py-4">No attendance records found.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
