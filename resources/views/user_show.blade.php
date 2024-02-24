@extends('master')

@section('content')

<h2>user - {{  $User->name  }} </h2>


<form action="{{ route('users.destroy',['user' => $User->id ]) }} " method="post" >
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" >Delete</button>

</form>

@endsection