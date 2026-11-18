
@extends('layouts.fo')

@section('content')

<h1>Editar prenda</h1>

<form method="POST" action="{{ route('gifts.update', $gift->id) }}">
    @csrf
    @method('PUT')

    <!-- Nome da gift -->
    <div class="mb-3">
        <label class="form-label">Nome da prenda</label>
        <input type="text" name="name" class="form-control"
            value="{{ old('name', $gift->name) }}" required>
        @error('name')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <!-- Valor previsto -->
    <div class="mb-3">
        <label class="form-label">Valor previsto (€)</label>
        <input type="number" name="expected_value" class="form-control"
            step="0.01" min="0"
            value="{{ old('expected_value', $gift->expected_value) }}" required>
        @error('expected_value')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <!-- Pessoa associada -->
    <div class="mb-3">
        <label class="form-label">Pessoa</label>
        <select name="user_id" class="form-select" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}"
                    {{ old('user_id', $gift->user_id) == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        @error('user_id')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <!-- Valor gasto -->
    <div class="mb-3">
        <label class="form-label">Valor gasto (€)</label>
        <input type="number" name="spent_value" class="form-control"
            step="0.01" min="0"
            value="{{ old('spent_value', $gift->spent_value) }}">
        @error('spent_value')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">
        Actualizar prenda
    </button>

    <a href="{{ route('gifts.all') }}" class="btn btn-secondary">
        Cancelar
    </a>

</form>

@endsection
