@extends('layouts.fo')

@section('content')

<h1>Todas as Terefas:</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Estado</th>
      <th scope="col">Data de conclusão</th>
      <th scope="col">Utilizador</th>
    </tr>
  </thead>
  <tbody>
    <tr>
 @foreach ($tasks as $task)
     <tr>
        <th scope="row">{{ $task->id}}</th>
        <td>{{$task->name}}</td>
        <td>{{$task->status}}</td>
        <td>{{$task->due_at}}</td>
        <td>{{$task->user_name}}</td>
        <td><a href="{{route('tasks.delete', $task->id )}}" class="btn btn-danger">Apagar</a></td>
    <td><a href="{{route('tasks.edit', $task->id)}}" class="btn btn-info">Ver /  Editar</a></td>
     </tr>
 @endforeach

  </tbody>
</table>

@endsection

