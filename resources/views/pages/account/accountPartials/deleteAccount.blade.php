<h2>Delete Account</h2>
<p>Use this button if you wish to delete you account</p>

<form action="{{route('account.destroy')}}" method="post">
    @csrf
    @method('DELETE')

    <label>
        Confirm Password to Delete Account
        <input type="password" required name="password" placeholder="Password">
    </label>
    <br>
    <button type="submit">Delete Account</button>

</form>

@foreach($errors->all() as $message)
    <p>{{$message}}</p>
@endforeach
