@extends('master')

@section('content')


<h1>user edit </h1>


@if(session()->has('message'))
{{ session()->get('message') }}

@endif


<form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="id" value="{{ $user->id }}">
    <input type="text" name="name" value="{{ $user->name }}">
    <input type="text" name="email" value="{{ $user->email }}">
    <button type="submit">Update</button>
</form>




@endsection