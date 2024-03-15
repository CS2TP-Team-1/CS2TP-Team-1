@extends('layouts.default')
@section('title', 'Edit User')

@section('content')
    <div class="EditUders">
        <h1>Edit User #{{$user->id}}</h1>
        <form class = "edit-form" action="{{route('admin.amend-users')}}" method="post"><br>
            @csrf
            @method('PATCH')
            @foreach ($errors->all() as $message)
                <p>{{ $message }}</p>
            @endforeach
            <input type="number" hidden name="id" value="{{$user->id}}">
            <label for="name">Name:</label> <br>
            <input type="text" name="name" value="{{$user->name}}" required><br>
            <label for="email">Email:</label><br>
            <input type="email" name="email" value="{{$user->email}}" required><br>
            <label>
                Account Type
                <label for="1">Admin
                    <input type="radio" value="1" name="accountType" @if ($user->accountType === 1) checked @endif>
                </label>
                <label for="0">User
                    <input type="radio" value="0" name="accountType" @if ($user->accountType === 0) checked @endif>
                </label>
            </label>

            <button type="submit" class="btn btn-AE">Submit</button><br>

        </form>
    </div>


@endsection
