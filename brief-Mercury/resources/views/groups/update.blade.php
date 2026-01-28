@extends('layout')

@section('content')
<h1>Edit Group</h1>


<form action="{{ route('groups.update', $group->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $group->name }}">
    <button type="submit">Update</button>
</form>
@endsection
