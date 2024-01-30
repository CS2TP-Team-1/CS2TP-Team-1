@extends('layouts.default')
@section('title', 'Profile')

@section('content')

    <h1>Your Profile</h1>

    @include('pages.account.accountPartials.editAccountInformation')
    @include('pages.account.accountPartials.changePassword')
    @include('pages.account.accountPartials.deleteAccount')
@endsection
