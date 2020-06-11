<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $user->name }}</h3>
    </div>
    <div class="card-body text-center">
        @if($user->image)
           <!--画像が存在する場合-->
            <img class="rounded img-fluid image-icon300" src="{{ $user->image }}" alt="">
        @else
           <!--画像が存在しない場合-->
            <img class="rounded img-fluid image-icon300" src="/storage/profile_images/0.jpg" alt="">
        @endif
        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
    </div>
</div>
{{-- 画像変更 --}}
@include('images.index')
{{-- フォロー／アンフォローボタン --}}
@include('user_follow.follow_button')