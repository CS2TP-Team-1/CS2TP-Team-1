<h2>Account Information</h2>
<p>Update your account information here.</p>

<form method="post" action="{{route('account.update')}}">
    @csrf
    @method('PATCH')

    <label>
        Name
        <input type="text" required name="name" value="{{$user->name}}">
    </label>
    <br>
    <label>
        Email
        <input type="email" required name="email" value="{{$user->email}}">
    </label>

    <br>
    <button type="submit">Save</button>
</form>

@if(session('status') === 'account-updated')
    <p>Account Details Updated</p>
@endif

@foreach($errors->all() as $message)
    <p>{{$message}}</p>
@endforeach
