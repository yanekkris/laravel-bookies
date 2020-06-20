


<form action=" {{ action('UploadController$upload') }} "  method="post" enctype="multipart/form-data">
    @csrf
    
    <input type="file" name="foo">
    <input type="submit" value="Update">

</form>