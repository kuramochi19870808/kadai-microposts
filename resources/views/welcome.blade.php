@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                {{-- ユーザ情報 --}}
                @include('users.card')
            </aside>
            <div class="col-sm-8">
                {{-- 投稿フォーム --}}
                @include('microposts.form')
                {{-- 投稿一覧 --}}
                @include('microposts.microposts')
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Microposts</h1>
                <p>これはメッセージを投稿、共有するツールです。</p>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up', [], ['class' => 'btn btn-lg btn-primary']) !!}
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('login', 'Login', [], ['class' => 'btn btn-lg btn-success']) !!}
            </div>
        </div>
    @endif
@endsection