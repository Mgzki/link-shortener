<form method="POST" action="/">
    @csrf
    <div>
        <label>Enter your URL:</label>
        <input type="text" name="target" id="target" value="{{ isset($url) ? $url->target : '' }}">
    </div>
    
    <button type="submit">Shorten it!</button>
    <div>
        <p>{{ isset($url) ?  \URL::current() . "/" . $url->short : '' }}</p>
    </div>
</form>