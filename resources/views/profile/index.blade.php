@if (Auth::id() == $user->id)
<form method="POST" action="/profile" enctype="multipart/form-data" >
    {{ csrf_field() }}
    <div class="mt-3 mb-3">
    <input type="file" name="photo">
    <input type="submit" value="アイコンを変更する">
    </div>
</form>
@endif