<form method="POST" action="/">
    @csrf
    <div>
        <label>Enter your URL:</label>
        <input type="text" name="target" id="target">
    </div>
    
    <button type="submit">Shorten it!</button>
</form>