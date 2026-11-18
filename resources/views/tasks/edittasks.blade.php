@extends('layouts.fo')

@section('content')
    <h6>Detalhes das Tarefas {{ $taskInfo->id }}</h6>
    <p>{{$taskInfo->status}}</p>
    <p>{{$taskInfo->due_at}}</p>
    <p>{{$taskInfo->name}}</p>
    <p>{{$taskInfo->user_name}}</p>
@endsection
