@extends('layouts.default')
@section('title', 'Your Account')

@section('content')

    <h1>Your Account</h1>

    @include('pages.account.accountPartials.editAccountInformation')
    @include('pages.account.accountPartials.changePassword')
    @include('pages.account.accountPartials.deleteAccount')
    @include('pages.account.accountPartials.previousOrders')
@endsection
