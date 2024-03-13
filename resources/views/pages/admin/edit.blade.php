@extends('layouts.default')
@section('title', 'edit-users')

@section('content')
    <div class="EditUders">
        <h4>Edit user</h4>
        <form class = "edit-form" action="{{route('admin.users.edit', ['id' => '$user->id'])}}" method="post"><br>
            @csrf
            <label for="name">Name:</label> <br>
            <input type="text" name="name" value="{{$user->name}}" required><br>
            <label for="email">Email:</label><br>
            <input type="email" name="email" value="{{$user->email}}" required><br>

            <button type="submit" class="btn btn-AE"">Submit</button><br>

        </form>
    </div>


@endsection