<h2>Delete Account</h2>
<p>Use this button if you wish to delete you account.</p>
<div class="form">
<form class="account-form" action="{{route('account.destroy')}}" method="post">
    @csrf
    @method('DELETE')

    <label>
        Confirm Password to Delete Account:
        <input type="password" required name="password" placeholder="Password">
    </label>
    <br>
    <button class="button" type="submit">Delete Account</button>

    @error('password')
    <p>{{ $message }}</p>
    @enderror
</form>
</div>

