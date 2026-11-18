@extends('layouts.fo')

@section('content')
    <h1>Aqui vamos carregar os utilizadores</h1>

        <h6>Users sem estarem carregados da base de dados</h6>
    <ul>
        @foreach ($usersWDB as $user)
        <li>{{$user['name']}}-->{{$user['email']}}</li>
        @endforeach
    </ul>


    <form action="">
        <input type="text" name="search">
        <button class="btn btn-secondary" type="submit">Procurar</button>
    </form>


    <h6>Utilizadores de base de dados</h6>
    <table class="table">
<thead>



<tr>
    <th scope="col">#</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Address</th>
    <th scope="col">Nif</th>
    <th></th>
</tr>

</thead>
<tbody>
    @foreach ($usersFromDB as $user )


<tr>
    <th scope="row">{{$user->id}}</th>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->address}}</td>
    <td>{{$user->nif}}</td>
    <td><a href="{{route('users.delete', $user->id )}}" class="btn btn-danger">Apagar</a></td>

    {{-- <td><a href="{{route('tasks.addtask', $user->id)}}" class="btn btn-success">Adicionar Tarefa</a></td> --}}

    @auth
        <td><a href="{{route('users.edit', $user->id)}}" class="btn btn-info">Ver /  Editar</a></td>
    @endauth

</tr>
    @endforeach

</tbody>
</table>

@endsection

