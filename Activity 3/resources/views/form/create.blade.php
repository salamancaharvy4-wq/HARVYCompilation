<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Skills Workshop Enrollment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f7f5;
            color: #1f2933;
        }

        .page-shell {
            max-width: 900px;
        }

        .form-panel {
            border: 1px solid #d8e2dc;
            border-radius: 8px;
            box-shadow: 0 12px 30px rgba(31, 41, 51, 0.08);
        }

        .panel-header {
            background: #146c43;
            border-radius: 8px 8px 0 0;
            color: #ffffff;
        }

        .field-error {
            color: #b42318;
            display: block;
            font-size: 0.875rem;
            margin-top: 0.35rem;
        }
    </style>
</head>
<body>
    <main class="container page-shell py-5">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <strong>Please correct the following:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="form-panel bg-white">
            <div class="panel-header p-4">
                <h1 class="h3 mb-1">Community Skills Workshop Enrollment</h1>
                <p class="mb-0">Reserve a learning slot for a practical community workshop.</p>
            </div>

            <form method="POST" action="{{ route('form.store') }}" class="p-4">
                @csrf

                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="participant_name" class="form-label">Participant Name</label>
                        <input
                            type="text"
                            id="participant_name"
                            name="participant_name"
                            class="form-control @error('participant_name') is-invalid @enderror"
                            value="{{ old('participant_name') }}"
                            placeholder="Maria Santos"
                        >
                        @error('participant_name')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email Address</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            placeholder="maria@example.com"
                        >
                        @error('email')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="age" class="form-label">Age</label>
                        <input
                            type="number"
                            id="age"
                            name="age"
                            class="form-control @error('age') is-invalid @enderror"
                            value="{{ old('age') }}"
                            placeholder="21"
                        >
                        @error('age')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="workshop_track" class="form-label">Workshop Track</label>
                        <select
                            id="workshop_track"
                            name="workshop_track"
                            class="form-select @error('workshop_track') is-invalid @enderror"
                        >
                            <option value="">Choose a track</option>
                            <option value="Digital Art" @selected(old('workshop_track') === 'Digital Art')>Digital Art</option>
                            <option value="Basic Coding" @selected(old('workshop_track') === 'Basic Coding')>Basic Coding</option>
                            <option value="Video Editing" @selected(old('workshop_track') === 'Video Editing')>Video Editing</option>
                            <option value="Public Speaking" @selected(old('workshop_track') === 'Public Speaking')>Public Speaking</option>
                        </select>
                        @error('workshop_track')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="session_count" class="form-label">Number of Sessions</label>
                        <input
                            type="number"
                            id="session_count"
                            name="session_count"
                            class="form-control @error('session_count') is-invalid @enderror"
                            value="{{ old('session_count') }}"
                            placeholder="3"
                        >
                        @error('session_count')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="learning_goal" class="form-label">Learning Goal</label>
                        <textarea
                            id="learning_goal"
                            name="learning_goal"
                            rows="5"
                            class="form-control @error('learning_goal') is-invalid @enderror"
                            placeholder="Describe what skill you want to improve."
                        >{{ old('learning_goal') }}</textarea>
                        @error('learning_goal')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-success px-4">Submit Enrollment</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
