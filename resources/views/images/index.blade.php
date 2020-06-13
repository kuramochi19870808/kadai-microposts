@if (Auth::id() == $user->id)
<div class="pt-3 pb-3">
<form method="POST" action="{{ route('image.store') }}" enctype="multipart/form-data">
@csrf
    <input id="image" type="file" name="image">
    <input type="submit" value="アイコンを変更する">
</form>    
</div>
@endif