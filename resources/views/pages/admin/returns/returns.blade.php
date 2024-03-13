@extends('layouts.default')
@section('title', 'Returns Dashboard')

@section('content')
    <h1>Returns</h1>
    <table class="table">
        <thead>
        <th>Return ID</th>
        <th>User ID</th>
        <th>Return Status</th>
        <th>Return Value</th>
        <th>View Return</th>
        </thead>
        <tbody>
        @foreach($returns as $return)
            <tr>
                <td>{{$return->id}}</td>
                <td>{{$return->user_id}}</td>
                <td>{{$return->status}}</td>
                <td>£{{$return->returnValue}}</td>
                <td class="table-button-section">
                    <button class="button table-button" onclick="location.href='/admin/returns/{{$return->id}}'">View Return</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
