<form action="{{ url('image') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="photo">
    <input type="submit" value="envoyer">
</form>