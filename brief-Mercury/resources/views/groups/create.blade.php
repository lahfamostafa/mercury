@extends('layout')

@section('content')
<h1>Create Group</h1>


<form action="{{ route('groups.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Group name">
    <button type="submit">Save</button>
</form>
@endsection
