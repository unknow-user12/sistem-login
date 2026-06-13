<h1>Dashboard</h1>

<p>
    Selamat datang,
    {{ session('username') }}
</p>

<form action="/logout" method="POST">
    @csrf

    <button type="submit">
        Logout
    </button>
</form>