<h2>Account Information</h2>
<p>Update your account information here.</p>

<form method="post" action="{{route('account.update')}}">
    @csrf
    @method('PATCH')

    <label for="name">Name</label>
    <input type="text" required name="name" value="{{$user->name}}">
    <br>
    <label for="email">Email</label>
    <input type="email" required name="email" value="{{$user->email}}">
    <button type="submit">Save</button>
</form>
