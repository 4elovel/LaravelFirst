<form method="POST" action="{{ route('login.request') }}">
    @csrf
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
    </div>
    <button type="submit">Request</button>
        <div>
            <label for="code">Code:</label>
            <input type="text" id="code" name="code">
        </div>
        <button type="submit">Log in</button>
    </form>
