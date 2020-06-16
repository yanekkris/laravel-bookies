<h1>Edit</h1>
<form method="post" action="/books/{{$book->id}}">
    @csrf
    <div>
        <label>Title</label>
        <input type="text" name="title" value="{{$book->title}}">
    </div>
    <div>
        <label>Authors</label>
        <input type="text" name="authors" value="{{$book->authors}}">
    </div>
    <div>
        <label>Image</label>
        <input type="text" name="image" value="{{$book->image}}">

    </div>
  

    <button type="submit">Save my new book!</button>

</form>