
@extends('layouts.fo')

@section('content')

<h1>Adicionar prenda de Natal</h1>

<form method="POST" action="{{ route('gifts.store') }}">
    @csrf

    <!-- Nome da prenda -->
    <div class="mb-3">
        <label class="form-label">Nome da prenda</label>
        <input type="text" name="name" class="form-control"
            value="{{ old('name') }}" required>
        @error('name')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <!-- Valor previsto -->
    <div class="mb-3">
        <label class="form-label">Valor previsto (€)</label>
        <input type="number" name="expected_value" class="form-control"
            step="0.01" min="0" value="{{ old('expected_value') }}" required>
        @error('expected_value')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <!-- Escolher pessoa -->
    <div class="mb-3">
        <label class="form-label">Pessoa</label>
        <select name="user_id" class="form-select" required>
            <option value="">Selecionar pessoa</option>

            @foreach ($users as $user)
                <option value="{{ $user->id }}"
                    {{ old('user_id') == $user->id ? 'selected' : '' }}>
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
            step="0.01" min="0" value="{{ old('spent_value') }}">
        @error('spent_value')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">
        Guardar prenda
    </button>

</form>

@endsection
