@extends('layouts.fo')

@section('content')
    <h6>Detalhes do user {{ $userInfo->name }}</h6>
    {{-- <p>{{ $userInfo->email }}</p>
    <p>{{ $userInfo->address }}</p>
    <p>{{ $userInfo->nif }}</p> --}}


  <form method="POST" action="{{ route('users.update') }}">
    @method('PUT')
        @csrf

        <input type="hidden" name="id" value="{{$userInfo->id}}">
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input value= "{{$userInfo->name}}" required type="text" name="name" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        @error('name')
            <p>Nome inválido</p>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input disabled value= "{{$userInfo->email}}" required type="email" name="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        @error('email')
            <p>email inválido</p>
        @enderror

                <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Morada</label>
            <input value="{{ $userInfo->address }}" type="text" name="address" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nif</label>
            <input value="{{ $userInfo->nif }}" type="text" name="nif" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>


        {{-- <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input required type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        @error('password')
            <p>password inválida</p>
        @enderror --}}

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>

@endsection



