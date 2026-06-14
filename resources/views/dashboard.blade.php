<@if(session('role') == 'admin')

    <h2>Dashboard Admin</h2>

@else

    <h2>Dashboard User</h2>

@endif
<form action="/logout" method="POST">
    @csrf

    <button type="submit">
        Logout
    </button>
</form>