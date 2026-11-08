<div class="mb-3">
    <label for="name" class="form-label">Название блюда</label>
    <input type="text" id="name" name="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $dish->name ?? '') }}" required>
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="category_id" class="form-label">Категория</label>
    <select id="category_id" name="category_id"
            class="form-select @error('category_id') is-invalid @enderror" required>
        <option value="">Выберите категорию</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                @selected(old('category_id', $dish->category_id ?? '') == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="cooking_method" class="form-label">Способ приготовления</label>
    <textarea id="cooking_method" name="cooking_method" rows="4"
              class="form-control @error('cooking_method') is-invalid @enderror"
              required>{{ old('cooking_method', $dish->cooking_method ?? '') }}</textarea>
    @error('cooking_method')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="cooking_time" class="form-label">Время приготовления, мин.</label>
    <input type="number" id="cooking_time" name="cooking_time" min="1"
           class="form-control @error('cooking_time') is-invalid @enderror"
           value="{{ old('cooking_time', $dish->cooking_time ?? '') }}" required>
    @error('cooking_time')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
    <a href="{{ url('/dishes') }}" class="btn btn-outline-secondary">Отмена</a>
</div>
