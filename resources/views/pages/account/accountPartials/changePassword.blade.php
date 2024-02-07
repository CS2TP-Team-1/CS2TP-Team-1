<h2>Change Your Password</h2>
<p>Change you password here.</p>

<form method="post" action="{{ route('password.update') }}">
    @csrf
    @method('PUT')

    <label>
        Current Password
        <input type="password" required name="old_password" placeholder="Current Password">
    </label>
    <br>
    <label>
        New Password
    <input type="password" required name="new_password" placeholder="New Password">
    </label>
    <br>
    <label>
        Confirm New Password
        <input type="password" required name="new_password_confirmation" placeholder="Confirm New Password">
    </label>
    <br>
    <button type="submit">Update</button>
</form>

@if(session('status') === 'password-updated')
    <p>Password Updated</p>
@endif

@error('old_password')
<p> {{ $message }} </p>
@enderror
@error('new_password')
<p> {{ $message }} </p>
@enderror
@error('new_password_confirmation')
<p> {{ $message }} </p>
@enderror

