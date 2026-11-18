@extends('layouts.fo')

@section('content')
    <h1>Gestão de Prendas de Natal</h1>

    <!-- Mensagem de sucesso -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botão para adicionar uma prenda -->
    <a href="{{ route('gifts.add') }}" class="btn btn-primary mb-3">
        Adicionar prenda
    </a>

    <table class="table">
        <thead>
            <tr>
                <th>Acções</th>
                <th>ID</th>
                <th>Prenda</th>
                <th>Valor previsto</th>
                <th>Pessoa</th>
                <th>Valor gasto</th>
                <th>Diferença</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($gifts as $gift)
                <tr>


                    <td>
                        <!-- Botão Editar -->
                        <a href="{{ route('gifts.edit', $gift->id) }}" class="btn btn-info">
                            Editar
                        </a>

                        <!-- Formulário para eliminar -->
                        <form action="{{ route('gifts.destroy', $gift->id) }}" method="POST" style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Tens a certeza de que pretendes eliminar esta prenda?')">
                                Eliminar
                            </button>

                        </form>
                    </td>


                    <td>{{ $gift->id }}</td>

                    <td>{{ $gift->name }}</td>

                    <td>
                        {{ number_format($gift->expected_value, 2, ',', '.') }} €
                    </td>

                    <td>{{ $gift->user->name }}</td>

                    <td>
                        @if ($gift->spent_value !== null)
                            {{ number_format($gift->spent_value, 2, ',', '.') }} €
                        @else
                            Por definir
                        @endif
                    </td>

                    <td>
                        @if ($gift->spent_value !== null)
                            @php
                                $difference = $gift->expected_value - $gift->spent_value;
                            @endphp

                            <span
                                class="{{ $difference > 0 ? 'text-success' : ($difference < 0 ? 'text-danger' : 'text-secondary') }}">

                                {{ $difference > 0 ? '+' : '' }}{{ number_format($difference, 2, ',', '.') }} €

                            </span>
                        @else
                            Por definir
                        @endif
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        Ainda não existem prendas registadas.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
