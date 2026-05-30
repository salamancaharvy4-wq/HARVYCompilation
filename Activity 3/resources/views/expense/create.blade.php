<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Finance Expense Report</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .card-header { background-color: #0d6efd; color: white; border-top-left-radius: 15px !important; border-top-right-radius: 15px !important; }
        .error-message { color: #dc3545; font-size: 0.875rem; margin-top: 0.25rem; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <!-- Success Message -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Validation Errors (All) -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header text-center py-3">
                        <h4 class="mb-0">💸 Personal Finance Expense Report</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('expense.store') }}" method="POST">
                            @csrf

                            <div class="row g-3">
                                <!-- Name (Text) -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="John Doe">
                                    @error('name')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email (Email) -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="john@example.com">
                                    @error('email')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Category (Dropdown) -->
                                <div class="col-md-6">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
                                        <option value="" disabled {{ old('category') ? '' : 'selected' }}>Select Category</option>
                                        <option value="Food" {{ old('category') == 'Food' ? 'selected' : '' }}>Food</option>
                                        <option value="Transport" {{ old('category') == 'Transport' ? 'selected' : '' }}>Transport</option>
                                        <option value="Bills" {{ old('category') == 'Bills' ? 'selected' : '' }}>Bills</option>
                                        <option value="Entertainment" {{ old('category') == 'Entertainment' ? 'selected' : '' }}>Entertainment</option>
                                        <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('category')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Amount (Number) -->
                                <div class="col-md-6">
                                    <label for="amount" class="form-label">Amount Spent (₱)</label>
                                    <input type="number" step="0.01" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}" placeholder="0.00">
                                    @error('amount')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Payment Method (Select) -->
                                <div class="col-md-6">
                                    <label for="payment_method" class="form-label">Payment Method</label>
                                    <select class="form-select @error('payment_method') is-invalid @enderror" id="payment_method" name="payment_method">
                                        <option value="" disabled {{ old('payment_method') ? '' : 'selected' }}>Select Method</option>
                                        <option value="Cash" {{ old('payment_method') == 'Cash' ? 'selected' : '' }}>Cash</option>
                                        <option value="GCash" {{ old('payment_method') == 'GCash' ? 'selected' : '' }}>GCash</option>
                                        <option value="Card" {{ old('payment_method') == 'Card' ? 'selected' : '' }}>Card</option>
                                    </select>
                                    @error('payment_method')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Date (Date) -->
                                <div class="col-md-6">
                                    <label for="expense_date" class="form-label">Expense Date</label>
                                    <input type="date" class="form-control @error('expense_date') is-invalid @enderror" id="expense_date" name="expense_date" value="{{ old('expense_date') }}">
                                    @error('expense_date')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Description (Textarea) -->
                                <div class="col-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="What was this expense for?">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary w-100 py-2">Submit Expense Report</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
