@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('掲示板') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($posts as $post)
                    <div class="card m-2">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <h6 class="card-title">
                                投稿者:{{ $post->user->name }}</h5>
                            <h6 class="card-text">{{ $post->content }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" >詳細</a>
                            @if(Auth::user())
                                @if(Auth::user()->is_super)
                                <form action="{{route('posts.destroy', $post)}}" method="post" class="float-right">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="削除" class="btn btn-danger float-left float-right" onclick='return confirm("削除しますか？");'>
                                </form>
                                @endif
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
