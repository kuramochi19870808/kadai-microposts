<div class="pt-3">
<form method="POST" action="{{ route('image.store') }}" enctype="multipart/form-data">
@csrf
    <input id="image" type="file" name="image">
    <button type="submit">
       アイコンを変更する
    </button>
</form>    
</div>