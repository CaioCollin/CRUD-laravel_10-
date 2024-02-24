@extends('master')

@section('content')


<h1>Create </h1>


@if(session()->has('message'))
{{ session()->get('message') }}

@endif


<form action="{{ route('users.store') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Your Name" value="mesquta" >

    <input type="text" name="email" placeholder="Your email" value="mesquta@gmail.com">

    <input type="text" name="password" placeholder="Your password" value="123">

    <button type="submit">Create</button>
</form>




@endsection