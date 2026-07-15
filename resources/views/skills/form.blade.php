<div class="mb-3">
    <label class="form-label">
        Skill Name <span class="text-danger">*</span>
    </label>

    <input
        type="text"
        name="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $skill->name ?? '') }}"
        placeholder="Example: Laravel"
    >

    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Description</label>

    <textarea
        name="description"
        class="form-control @error('description') is-invalid @enderror"
        rows="4"
        placeholder="Skill description..."
    >{{ old('description', $skill->description ?? '') }}</textarea>

    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
