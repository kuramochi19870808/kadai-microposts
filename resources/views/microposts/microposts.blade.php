@if (count($microposts) > 0)
    <ul class="list-unstyled">
        @foreach ($microposts as $micropost)
            <li class="media mb-3">
                {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                @if($micropost->user->image)
                <img class="mr-2 rounded image-icon50" src="{{ $micropost->user->image }}" alt="">
                @else
                <img class="mr-2 rounded image-icon50" src="{{ asset('images/0.jpg') }}" alt="">
                @endif
                <div class="media-body">
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $micropost->user->name, ['user' => $micropost->user->id]) !!}
                        <span class="text-muted">posted at {{ $micropost->created_at }}</span>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                    </div>
                    <div class="post-btns">
                        <div class="mr-2">
                            @if (Auth::user()->is_favorite($micropost->id))
                                {{-- アンファボボタンのフォーム --}}
                                {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Unfavorie', ['class' => "btn btn-sm btn-warning"]) !!}
                                {!! Form::close() !!}
                            @else
                                {{-- ファボボタンのフォーム --}}
                                {!! Form::open(['route' => ['favorites.favorite', $micropost->id]]) !!}
                                    {!! Form::submit('Favorite', ['class' => "btn btn-sm btn-success"]) !!}
                                {!! Form::close() !!}
                            @endif
                        </div>
                        <div>
                            @if (Auth::id() == $micropost->user_id)
                                {{-- 投稿削除ボタンのフォーム --}}
                                {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $microposts->links() }}
@endif