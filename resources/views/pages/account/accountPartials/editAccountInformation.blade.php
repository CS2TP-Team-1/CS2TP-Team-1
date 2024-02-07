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
    @if(session('status') === 'account-updated')
        <p>Account Details Updated</p>
    @endif

    @error('name')
    <p> {{ $message }} </p>
    @enderror
    @error('email')
    <p> {{ $message }} </p>
    @enderror
</form>


