<div class="pt-5 pb-3">
@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media mb-2">
                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                @if($user->image)
                   <!--画像が存在する場合-->
                    <img class="mr-2 rounded image-icon50" src="{{ $user->image }}" alt="">
                @else
                   <!--画像が存在しない場合-->
                    <img class="mr-2 rounded image-icon50" src="/storage/profile_images/0.jpg" alt="">
                @endif
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p>{!! link_to_route('users.show', 'View profile', ['user' => $user->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $users->links() }}
@endif
</div>