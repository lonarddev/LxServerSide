@extends('layouts.fo')


@section('content')
    <h1>Adicionar tarefa</h1>
    <form method="POST" action="{{route('tasks.store')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input required type="text" name="name" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        @error('name')
            <p>Nome inválido</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descrição
            </label>
            <input required type="text" name="description" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <select name="user_id" class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach


        </select>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
