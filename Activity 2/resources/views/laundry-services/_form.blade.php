@csrf

<div class="row g-3">
    <div class="col-md-6">
        <label for="name" class="form-label">Service Name</label>
        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $laundryService->name ?? '') }}" required>
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="category" class="form-label">Category</label>
        <input id="category" name="category" type="text" class="form-control @error('category') is-invalid @enderror" value="{{ old('category', $laundryService->category ?? '') }}" required>
        @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label for="price" class="form-label">Price</label>
        <input id="price" name="price" type="number" step="0.01" min="0" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $laundryService->price ?? '') }}" required>
        @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label for="duration_minutes" class="form-label">Duration Minutes</label>
        <input id="duration_minutes" name="duration_minutes" type="number" min="1" class="form-control @error('duration_minutes') is-invalid @enderror" value="{{ old('duration_minutes', $laundryService->duration_minutes ?? '') }}" required>
        @error('duration_minutes') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label for="detergent_type" class="form-label">Detergent Type</label>
        <input id="detergent_type" name="detergent_type" type="text" class="form-control @error('detergent_type') is-invalid @enderror" value="{{ old('detergent_type', $laundryService->detergent_type ?? '') }}" required>
        @error('detergent_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label for="description" class="form-label">Description</label>
        <textarea id="description" name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $laundryService->description ?? '') }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <div class="form-check">
            <input id="is_available" name="is_available" type="checkbox" value="1" class="form-check-input" @checked(old('is_available', $laundryService->is_available ?? true))>
            <label for="is_available" class="form-check-label">Available</label>
        </div>
    </div>
</div>

<div class="d-flex gap-2 mt-4">
    <button type="submit" class="btn btn-success">{{ $submitLabel }}</button>
    <a href="{{ route('laundry-services.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
