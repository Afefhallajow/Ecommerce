<form method="post" action="/upload" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <button type="submit">Upload and Convert</button>
</form>
